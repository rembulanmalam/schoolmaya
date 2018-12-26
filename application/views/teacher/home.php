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


	<style>

		body{
			font-family: 'Open Sans';
			font-size:14px;
			background-image:url("https://c1.staticflickr.com/9/8711/17095171331_4ec22e0407_b.jpg");
			background-repeat: no-repeat;
			background-size:cover;
			background-position:fixed;
		}

		h1{
			font-family: 'Open Sans';
		}

		.img-fluid {
			max-width: 100%;
			height: auto;
		}

	</style>

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
					<a class="btn btn-outline-danger" href="<?php echo (base_url('index.php/login/logout/')) ?>" style="font-size:14px">Logout</a>
				</li>
				</ul>
			</div>
		</div>
	</nav>

	<title>SekolahQu | Home</title>
</head>
<body>
	<div class="container mt-5">	
		<center>
			<h3>Welcome back! <b><?php echo $user_account['Name'] ?></b> </h2>	
			<div class="row mt-5 ml-0 pl-0"></div>
				<div class="col-6">		
					<h3>Tomorrow's Schedule</h3>
					<table class="table table-hover table-light">
						<thead class="thead-light">
							<tr>
							<th scope="col">Class</th>
							<th scope="col">Day</th>
							<th scope="col">Subject</th>
							<th scope="col">Time</th>						
							</tr>
						</thead>
						<tbody>
							<?php foreach ($schedule as $data): ?>
								<tr>
								<td><?php echo $data['ClassID'] ;?></td>
								<th scope="row"><?php echo $data['Day']; ?></th>
								<td><?php echo $data['SubjectName'] ;?></td>
								<td><?php echo $data['Start'] ;?></td>							
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</center>
	</div>
</body>
</html>