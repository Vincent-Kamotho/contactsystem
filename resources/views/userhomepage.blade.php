<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User HomePage</title>
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar">
			<h2>Sidebar</h2>
			@csrf
			<ul>
				
				<li><a href="{{asset('viewRecords')}}"><i class="fas fa-check-square"></i>List Contacts</a></li>
				<li><a href="{{asset('addcontact')}}"><i class="fas fa-plus"></i>Add Contacts</a></li>



                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="nav-icon far fa-circle text-danger"></i>
                                            {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>



			</ul>
		</div>

		
		<div class="main-content">
			@yield('content')

			
            

			<div class = "row"><br/>
				<div class="col-md-10">

				    <h3 align = "left">My Contacts</h3> <br/>

				    @if(session()->has('success'))
                       <div class="alert alert-success">
                           {{ session()->get('success') }}
                       </div>
                   @endif

				    <div class="line" style="text-align:right;">
				    	<a href="addcontact" class = "btn btn-primary">Add Contacts</a>
				    </div><br/>

					<div class = "container" id = "app">
					<all-contacts></all-contacts>
				    <!-- <table class = "table table-bordered">
					    <tr >
						    <th>ID</th>
						    <th>Full Names</th>
						    <th>Phone</th>
						    <th>Email</th>
						    <th>Image</th>
						    <th>Action</th>
					    </tr>

					    @foreach($data as $row)
					    <tr>
					    	<td>{{$row['id']}}</td>
					    	<td>{{$row['fullname']}}</td>
					    	<td>{{$row['phone']}}</td>
					    	<td>{{$row['email']}}</td>
					    	<td><img src="{{asset('uploads/contacts/' . $row['image'])}}" width="100px;" height="100px;" alt = "Image"></td>
					    	<td>
					    		<a href="click_edit/{{$row['id']}}" class = "btn btn-success">EDIT</a>
					    		<a href="/click_delete/{{$row['id']}}" class = "btn btn-danger">DELETE</a>
					    	</td>
					    </tr>
					    @endforeach
				    </table> -->
					</div>
					<script src="{{ asset('/js/app.js') }}"></script>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>