<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Suppport\Facades\DB;
use DB;
use App\contacts;
use App\Http\Resources\ContactResource;
use PHPUnit\Runner\Exception;


class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = DB::table('contacts')->get();
        //$data = DB::select('select * from contacts');
        $data = Contacts::all()->toArray();

        return response()->json([
            "data" => $data
        ]);


        //return view('userhomepage', ['data'=> $data]);
    }

    // public function index()
    // {
    //     $contacts = Contacts::all();
    //     return response()->json(["contacts" => contacts]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacts = new Contacts();

        $contacts->fullname = $request->input('fullnames');
        $contacts->phone = $request->input('phone');
        $contacts->email = $request->input('email');


        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . " . " . $extension;
            $file->move('uploads/contacts/', $filename);
            $contacts->image = $filename;
        }
        else
        {

            $contacts->image = "";
        }

        $contacts->save();
        return redirect('addcontact')->with('message', 'Contact Successfully saved!');
    }

    public function insert(Request $request)
    {
        $contacts = new Contacts();

        $contacts->fullname = $request->input('fullname');
        $contacts->phone = $request->input('phone');
        $contacts->email = $request->input('email');

        $contacts->save();
        return redirect('addcontact')->with('message', 'Contact Successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$data = DB::table('contacts')->get();
        //$data = DB::select('select * from contacts');
        $data = Contacts::all()->toArray();
        return view('userhomepage', ['data'=> $data]);

        // $data = Contacts::all();
        // return view('userhomepage')->with('data', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function editform($id)
    {
        //$contacts = DB::table('contacts')->get();
        //$contacts = DB::select('select * from contacts');
        $contacts = DB::select('select * from contacts where id = ?', [$id]);
        return view('contactsedit', ['contacts'=>$contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname'   =>   'required',
            'phone'   =>   'required',
            'email'  =>   'required'
        ]);
        $contacts = Contacts::find($id);
        $contacts->fullname = $request->get('fullname');
        $contacts->phone = $request->get('phone');
        $contacts->email = $request->get('email');
        $contacts->image = $request->get('image');

        DB::update('update contacts set fullname = ?, phone =?, email = ?, image = ? where id = ?', ['$fullname', '$phone', '$email', '$image']);
        return redirect('viewRecords')->with('Success', 'Data Updated');
    }

    public function update1($id, Request $request)
    {
        $contacts = Contacts::find($id);
        $contacts->update($request->all());

        return response()->json('The contacts successfully updated');
    }

    public function addingContacts(Request $request)
    {
        $data = $request->all();
        DB:table('contacts')->insert($data);
        return Response::json(true);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


//    public function deleteform($id)
//    {
//        DB::delete('delete from contacts where id = ?', [$id]);
//        return redirect('userhomepage')->with('success', 'Contact Deleted');
//    }

    public function getAPIContacts()
    {
         return ContactResource::collection(contacts::all());
    }

    public function remove(Request  $request)
    {
        //first identify the entry to delete
        if(!$contact = Contacts::find($request['id'])){
            throw new \Exception("Contact not found. Please try again.");
        }

        //delete the entry
        $contact->delete();

        //return response
        return response()->json(['Message'=>'Contact deleted successfully']);
    }

    public function changer(Request $request){
        //  1: Identify the entry to delete

        if(!$contact = Contacts::find($request['contactid'])){
            throw new \Exception("Contact not found. Please try again.");
        }
        $contact->id = $request['contactid'];
        $contact->fullname = $request['names'];
        $contact->phone = $request['phone'];
        $contact->email = $request['email'];

        $contact->save();

        return response()->json(['Message'=>'Contact updated successfully']);
    }
}
