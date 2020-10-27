<!DOCTYPE html>
<html>
<head>
	<title>Edit data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<div class = "container" id = "app">
<edit-contact></edit-contact>
	<div class="row">
		<div class="col-md-6"><br/>
{{--		<h3>Edit Records</h3> <br/>--}}
		@if(count($errors) > 0)

		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>

{{--		<form method="post" action="">--}}
{{--			{{csrf_field()}}--}}

{{--			<div class = "form group">--}}
{{--				<input type="text" name="fullname" class="form-control" value="" placeholder="Enter fullname"/>--}}
{{--			</div>--}}

{{--			<div class = "form group">--}}
{{--				<input type="text" name="phone" class="form-control" value="" placeholder="Enter phone number"/>--}}
{{--			</div>--}}

{{--			<div class = "form group">--}}
{{--				<input type="email" name="email" class="form-control" value="" placeholder="Enter email"/>--}}
{{--			</div>--}}

{{--			<div class = "form-group">--}}
{{--				<input type="submit" class="btn btn-primary" value="Edit"/>--}}
{{--			</div>--}}
{{--		</form>--}}

		@endif

    </div>
</div>
	<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
