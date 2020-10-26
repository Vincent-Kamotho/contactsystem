<!DOCTYPE html>
<html>
<head>
	<title>Edit Contact</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

	<div class = "container">
		
		<div class = "jumbotron" style="text-align:left";>
			<h2 style = "margin-bottom:50px;">Edit contacts here</h2>
			@csrf
			<form action = "/update/{{$contacts[0]->id}}" method = "post">
				<div class = "form-group">
					<label>Full Names</label>
					<input type="text" class="form-control" name="fullname" id="name" value="{{$contacts[0]->fullname}}" placeholder="">
				</div>

				<div class = "form-group">
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" id="phone" value="{{$contacts[0]->phone}}" placeholder="">
				</div>

				<div class = "form-group">
					<label>Email</label>
					<input type="" class="form-control" name="email" id="mail" value="{{$contacts[0]->email}}" placeholder="">
				</div>

				<div class = "form-group">
					<label>Image</label>
					<input type="file" class="form-control" name="image" id="image" value="{{$contacts[0]->image}}" placeholder="">
				</div>

				<div class = "form-group">
					<input type="submit" class = "btn btn-primary" value="Edit">
				</div>
			</form>
		</div>
	</div>
</body>
</html>