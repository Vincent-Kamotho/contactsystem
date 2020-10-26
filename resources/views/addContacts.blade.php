<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
  <title>User HomePage</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
/*body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}*/

body{
	font-family: sans-serif, Helvetica, Arial;
	width:50%;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=file], select, textarea {
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

{{--<h3>Add Contacts Form</h3>--}}

@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif

<div class="container" id="app">
  <add-contact></add-contact>
  <!-- <form action="submit" method="post" enctype="multipart/form-data">
  	@csrf
    <label for="fname">Full Names</label>
    <input type="text" id="fname" name="fullnames" required="required" placeholder="Full Names">

    <label for="phone">Phone No</label>
    <input type="text" id="phone" name="phone" required="required" placeholder="Phone number">

    <label for="mail">Email</label>
    <input type="email" id="email" name="email" required="required" placeholder="Enter email">

    <label for="custom-file-input">Choose Image</label>
    <input type="file" name="image" id="image" >

    <input type="submit" value="Submit">
  </form> -->
</div>

</body>
</html>

<script src="{{ asset('/js/app.js') }}"></script>
