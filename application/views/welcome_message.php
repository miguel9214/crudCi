<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
	<!-- Navegador -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">CRUD CODEIGNITER</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>

	<!-- Formulario para guardar -->
	<div class="container mt-4">
		<?php echo form_open('welcome/store', 'onsubmit="return validateForm()"'); ?>
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
				<button type="submit" class="btn btn-primary btn-block">Save</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	<!-- Tabla para mostrar datos -->
	<div class="container mt-4">
		<div class="container text-center">
			<h2>List persons</h2>
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
				<?php $id = 1;
				foreach ($persons as $person) : ?>
					<tr>
						<td><?php echo $id++ ?></td>
						<td><?php echo $person['name']; ?></td>
						<td><?php echo $person['last_name']; ?></td>
						<td><?php echo $person['birthday']; ?></td>
						<td><?php echo $person['sex']; ?></td>
						<td>
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo $person['id']; ?>">
								Editar
							</button>
							<a href="<?php echo base_url('welcome/delete/' . $person['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
						</td>
					</tr>
					<div class="modal fade" id="editModal<?php echo $person['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="editModalLabel">Edit person</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Formulario con los mismos campos -->
									<?php echo form_open('welcome/update/' . $person['id'], 'id="editForm"'); ?>
									<div class="form-group">
										<label for="editName">Name</label>
										<input type="text" class="form-control" id="editName" name="edit_name" value="<?php echo $person['name']; ?>">
									</div>
									<div class="form-group">
										<label for="editLastName">Last name</label>
										<input type="text" class="form-control" id="editLastName" name="edit_last_name" value="<?php echo $person['last_name']; ?>">
									</div>
									<div class="form-group">
										<label for="editBirthday">Birthday</label>
										<input type="date" class="form-control" id="editBirthday" name="edit_birthday" value="<?php echo $person['birthday']; ?>">
									</div>
									<div class="form-group">
										<label for="editSex">Sex</label>
										<select class="custom-select" id="editSex" name="edit_sex">
											<option value="masculino" <?php echo ($person['sex'] == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
											<option value="femenino" <?php echo ($person['sex'] == 'femenino') ? 'selected' : ''; ?>>Femenino</option>
										</select>
									</div>
									<button type="submit" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	<script>
		function validateForm() {
			var name = document.getElementById('exampleInputName').value;
			var lastName = document.getElementById('exampleInputLstName').value;
			var birthday = document.getElementById('exampleInputBirthday').value;
			var sex = document.getElementById('exampleInputSex').value;

			if (name === '' || lastName === '' || birthday === '' || sex === 'Sexo') {
				alert('Todos los campos son obligatorios. Por favor, complete todos los campos.');
				return false;
			}

			return true;
		}


		function validateFormModal() {
			var name = document.getElementById('editName').value;
			var lastName = document.getElementById('editLastName').value;
			var birthday = document.getElementById('editBirthday').value;
			var sex = document.getElementById('editSex').value;

			if (name === '' || lastName === '' || birthday === '' || sex === 'Sexo') {
				alert('Todos los campos son obligatorios. Por favor, complete todos los campos.');
				return false;
			}

			return true;
		}

		document.getElementById('saveChangesBtn').addEventListener('click', function (event) {
            if (!validateFormModal()) {
                event.preventDefault(); // Evitar que el formulario se envíe si no es válido
            }
        });
		
	</script>
</body>

</html>