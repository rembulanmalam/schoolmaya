<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url('front/custom.css') ?>">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
	<link rel="icon" type="image/ico" href="http://i63.tinypic.com/21lo7qe.png"/>

	<style>
	body{
		font-family: 'Open Sans';
		font-size: 14px;
		background-image:url("https://c1.staticflickr.com/9/8711/17095171331_4ec22e0407_b.jpg");
		background-repeat: no-repeat;
		background-size:cover;
		background-position:fixed;
	}

	h1#titles{
		font-family: 'Raleway';
	}
</style>

<title>SekolahQu | Login</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row horizontal-align" style="margin:150px 200px 100px 250px;border:1px solid white;border-radius:15px;background-color:white">
			<div class="col" style="margin-left:50px;margin-top:100px">
				<h1 id = 'titles'><img src="http://i66.tinypic.com/33dz3tk.png" style="width:300px"></h1>
				<?php if ($this->session->flashdata('Failed')): ?>
				<p class='flash_msg flash_fail'>  </p>
				<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:300px;font-size:12px">
					<strong>Login Failed!</strong> <?php echo $this->session->flashdata('Failed') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif?>

				<form action = "index.php/login/process/" method = "POST" >
					<div class="form-group">
						<label for="username">Email</label>
						<input type="text" class="form-control" placeholder="Enter username" name = "username" style="width:250px;font-size:14px">
					</div>
					<div class="form-group">
						<label for="username">Password</label>
						<input type="password" class="form-control" placeholder="Password" name = "password" style="width:250px;font-size:14px">
					</div>
					<button type="submit" class="btn btn-primary" style="font-size:14px">Submit</button>
				</form>
			</div>
			<div id="carouselExampleSlidesOnly" class="carousel slide mx-auto" data-ride="carousel" style="margin-right:50px;margin-top:50px;margin-bottom:50px">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block" src="https://image.freepik.com/free-photo/smiling-students-with-backpacks_1098-1220.jpg" alt="First slide" style="width:600px;height:400px">
					</div>
					<div class="carousel-item">
						<img class="d-block" src="https://image.freepik.com/free-photo/students-spending-free-time-in-class_1098-1282.jpg" alt="Second slide" style="width:600px;height:400px">
					</div>
					<div class="carousel-item">
						<img class="d-block" src="http://www.npcc.us/wp-content/uploads/2013/02/1030-School-Image-of-smart-schoolboy-looking-at-camera-with-smile-on-background-of-classmates.jpg" alt="Third slide" style="width:600px;height:400px">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

