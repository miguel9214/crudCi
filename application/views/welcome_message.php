<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">CRUD CODEIGNITER</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<div class="container mt-4">
		<?php echo form_open('welcome/store'); ?>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputName">Name</label>
					<input type="text" class="form-control" id="exampleInputName" aria-describedby="name" name="name">
				</div>
				<div class="form-group">
					<label for="exampleInputLstName">Last name</label>
					<input type="text" class="form-control" id="exampleInputLstName" name="last_name">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputBirthday">Birthday</label>
					<input type="date" class="form-control" id="exampleInputBirthday" name="birthday">
				</div>
				<div class="form-group">
					<label for="exampleInputSex">Sex</label>
					<select class="custom-select" id="exampleInputSex" name="sex">
						<option selected>Sexo</option>
						<option value="masculino">Masculino</option>
						<option value="femenino">Femenino</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mt-3 form-group">
			<div class="col-12 col-sm-6 col-md-3">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>


	<div class="container mt-4">
		<div class="container text-center">
			<h2>Personas registradas</h2>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Last name</th>
					<th scope="col">Birthday</th>
					<th scope="col">Sex</th>
					<th scope="col">Action</th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
			</tbody>
		</table>
	</div>

</body>

</html>