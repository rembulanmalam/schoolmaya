<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url('front/custom.css') ?>">	
	
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet"> 
	<link rel="icon" type="image/ico" href="http://i63.tinypic.com/21lo7qe.png"/>
	
	<script src="<?php echo base_url('front/js/all.js') ?>"></script>
	<script src="<?php echo base_url('front/js/profile.js') ?>"></script>
	<script type='text/javascript'>
		var baseURL = '<?php echo base_url(); ?>';
 	</script>

 	<!-- Navbar -->	
	<nav id="nav" class="navbar navbar-dark navbar-expand-md fixed-top">
		<div class="container">
			<a class="navbar-brand gilroy-bold" href="<?php echo (base_url('index.php/home/')) ?>">Schoolmaya</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo (base_url('index.php/home/')) ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo (base_url('index.php/schedule/')) ?>">Schedule</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo (base_url('index.php/score/')) ?>">Score</a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Account
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a id="student" class="dropdown-item" href="<?php echo (base_url('index.php/profile/')) ?>">Edit Profile</a>
							<a id="student" class="dropdown-item" href="<?php echo (base_url('index.php/login/logout/')) ?>">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    
    <title>SekolahQu | Profile</title>
</head>
<body>
    <!-- Header -->
	<div class="d-flex justify-content-start align-items-center align-self-center header-small student">
        <div class="container">
            <h1 class="display-3">Edit Profile</h1>
        </div>
	</div>

	<!-- Body -->
	<div class="container">
        <div class="row">
            <div class="col home-schedule-box">
				<h3>Change Password</h3>
				<br>
				<?php if ($this->session->flashdata('Failed')): ?>
					<p class='flash_msg flash_fail'>  </p>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%;font-size:14px">
						<strong>Update Failed!</strong> <?php echo $this->session->flashdata('Failed') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif?>

				<?php if ($this->session->flashdata('Success')): ?>
					<p class='flash_msg flash_fail'>  </p>
					<div class="alert alert-success alert-dismissible fade show" role="success" style="width:100%;font-size:14px">
						<strong>Update Success!</strong> <?php echo $this->session->flashdata('Success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif?>

				<form action="update/" method = "POST">
					<div class="form-group">
						<label>New Password</label>
						<input type="password" name="NPassword" placeholder="New Password" id="txtNewPassword" class="form-control" style="font-size:14px">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="RNPassword" placeholder="Retype New Password" id="txtConfirmPassword" class="form-control" style="font-size:14px">
					</div>
					<button id="confirm" type="submit" class="btn btn-primary" style="font-size:14px">Submit</button>
				</form>
            </div>
            <div class="col home-schedule-box">
				<h3 class="mb-3">Change Profile Picture</h3>
					<div id="success-pp" class="alert alert-success alert-dismissible fade show" role="success" style="width:100%;font-size:14px; display:none">
						<strong>Update Success!</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				<div id="profile">
        			<div class="dashes"></div>
					   <label>Drag your image here</label>
				</div>
				<button id="confirm-pp" type="submit" class="btn btn-primary mt-3" style="font-size:14px">Change</button>
            </div>
        </div>
	</div>
</body>
</html>