<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="http://localhost:9080/schoolmaya/front/custom.css">		
	
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet"> 
	<link rel="icon" type="image/ico" href="http://i63.tinypic.com/21lo7qe.png"/>


	<style>

      body{
        font-family: 'Open Sans';
      }

	  h1{
        font-family: 'Raleway';
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
					<a class="nav-link" href="<?php echo (base_url('index.php/score/')) ?>">Score</a>
				</li>
					<div class="dropdown">
						<a class="btn btn-outline-danger" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Profile
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="<?php echo (base_url('index.php/profile/')) ?>">Edit Profile</a>
							<a class="dropdown-item" href="<?php echo (base_url('index.php/login/logout/')) ?>">Logout</a>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav>

	<title>SekolahQu | Home</title>
</head>
<body>
	<div class="container mt-5">
	  	<div class="row">
	  		<div class="col-2">
				<img src="<?php echo (base_url('asset/img/default.png')) ?>" class="rounded-circle img-fluid">
			</div>
			<div class="col-10">
				<h1>Hello</h1>
				<h3>Welcome back! <?php echo $user_account['Name'] ?> </h2>
			</div>
		</div>
		<div class="row mt-5 ml-0 pl-0"></div>
			<div class="col-6">		
				<h3>Tomorrow Schedule</h3>
				<table class="table table-hover">
					<thead class="thead-light">
						<tr>
						<th scope="col">Day</th>
						<th scope="col">Subject</th>
						<th scope="col">Time</th>
						<th scope="col">Duration</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($schedule as $data): ?>
							<tr>
							<th scope="row"><?php echo $data['Day']; ?></th>
							<td><?php echo $data['SubjectName'] ;?></td>
							<td><?php echo $data['Start'] ;?></td>
							<td><?php echo $data['Duration'] ;?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>