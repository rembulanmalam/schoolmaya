<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet"> 
	<link rel="icon" type="image/ico" href="http://i63.tinypic.com/21lo7qe.png"/>

	<!-- Navbar -->	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="<?php echo (base_url('index.php/home/')) ?>"><img src="http://i66.tinypic.com/33dz3tk.png" style="width:120px"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo (base_url('index.php/home/')) ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo (base_url('index.php/schedule/')) ?>">Schedule</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo (base_url('index.php/classes/')) ?>">Class</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo (base_url('index.php/score/')) ?>">Score</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-outline-danger" href="<?php echo (base_url('index.php/login/logout/')) ?>"style="font-size:14px">Logout</a>
				</li>
				</ul>
			</div>
		</div>
	</nav>

    <title>SekolahQu | Your Class</title>
</head>
<body>
	<!--POP UP untuk input nilai per chapter-->
	<!--tolong bikinin public funtion buat masukin nilai yang diinput ke database-->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle"><b>Input Students' Score</b></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<!--tolong masukin syntax php biar looping data siswa-->
			<form class="form-inline">
				<div class="form-group mb-2">
					<label for="studentName" class="sr-only">Name</label>
					<input type="text" readonly class="form-control-plaintext" id="studentName" value="Name">
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<label for="inputScore" class="sr-only">Score</label>
					<input type="text" class="form-control" id="inputScore" placeholder="Score">
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<!--tolong masukin syntax php biar ke save di database-->
			<button type="button" class="btn btn-primary">Save changes</button>
		</div>
		</div>
	</div>
	</div>

	<!-- LANJUTAN DARI FILE 'classes.php'SETELAH USER MEMLIH KELAS -->
	<!-- Menampilkan list kelas dimana sang guru mengajar -->
	<div class="container mt-5">
		<form class="form-inline" action = "index.php/classes/show-chapter/" method = "POST">
			<select class="form-control col-11" id="sel1" name="select_class">
				<option value="" disabled selected hidden>--Select Class--</option>
				<?php foreach ($class_list as $data): ?>
					<option value="<?php echo $data['ClassID'] ?>"><?php echo $data['ClassID'] ?></option>
				<?php endforeach;?>
			</select>
			<button type="submit" class="btn btn-primary ml-2">Submit</button>
		</form>
	</div>
	
	<div class="container mt-5">
		<center><h1><b><?php echo $subject[1]['ClassName']?></b></h1></center>
	</div>
	
	<!-- Menampilkan list chapter suatu pelajaran dalam suatu kelas -->
	<div class="container mt-3">
		<div class="list-group">
			<?php foreach ($subject as $subjects): ?>
				<a href="<?php echo $subjects['ChapterID'] ?>" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong">
				<?php echo $subjects['ChapterID'] ?> - <?php echo $subjects['ChapterName'] ?>
				</a>
			<?php endforeach;?>
		</div>
	</div>    
</body>
</html>