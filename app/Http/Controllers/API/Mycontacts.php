<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contacts;

class Mycontacts extends Controller
{
    public function save(Request $req)
    {
    	$contact = new Contacts;
    	$contact->fullname = $req->fullname;
    	$contact->phone = $req->phone;
    	$contact->email = $req->email;
    	echo $contact->save();
    }

    public function update(Request $request, $id)
    {
    	$contact = Contacts::find($id);
    	$contact->fullname = $request->fullname;
    	$contact->phone = $request->phone;
    	$contact->email = $request->email;

    	$contact->save();
    	return response()->json($contact);

    }

    public function remove(Request $request, $id)
    {
    	$contact = Contacts::where('id', $id)->delete();
    	return response()->json(['data' => 'Deleted Successfully'], 200);
    }
}
