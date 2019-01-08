<!DOCTYPE html>
<html lang="en">
<head>
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
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo (base_url('index.php/schedule/')) ?>">Schedule</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo (base_url('index.php/score/')) ?>">Score</a>
					</li>
					<li class="nav-item dropdown">
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


	<title>SekolahQu | Schedule</title>
</head>
<body>
	<!-- Header -->
	<div class="d-flex justify-content-start align-items-center align-self-center header-small student">
        <div class="container">
            <h1 class="display-3">Your Schedule</h1>
        </div>
	</div>

    <div class="container container-body">	
			<table class="table table-hover table-light">
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
						<td><?php echo $data['Duration'] ;?> hour(s)</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
    </div>
</body>
</html>