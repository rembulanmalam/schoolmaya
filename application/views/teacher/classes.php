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
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo (base_url('index.php/classes/')) ?>">Class</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Account
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a id="teacher" class="dropdown-item" href="<?php echo (base_url('index.php/profile/')) ?>">Edit Profile</a>
							<a id="teacher" class="dropdown-item" href="<?php echo (base_url('index.php/login/logout/')) ?>">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	
    <title>SekolahQu | Your Class</title>
</head>
<body>
	<!-- Modal Change Score -->
	<div class="modal fade" id="changeScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="failed" class="alert alert-danger" style='display:none'>
						<button type="button" class="close" aria-hidden="true">&times;</button>
							<strong>Update Failed!</strong> The value you entered does not meet requirement.
					</div>
					<h3>Score : </h3>
					<input id='new-score' type="text" class="form-control" placeholder="Input Score" name = "score"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id='save' type="Submit" class="btn btn-danger" onclick="save()">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal Change Exam Schedule -->
	<div class="modal fade" id="changeExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Pick Date</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="failed" class="alert alert-danger" style='display:none'>
						<button type="button" class="close" aria-hidden="true">&times;</button>
							<strong>Update Failed!</strong> The value you entered does not meet requirement.
					</div>
					<select class="form-control w-100" id="sel3" name="select_class">
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id='save' type="Submit" class="btn btn-danger" onclick="save_exam()">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="d-flex justify-content-start align-items-center align-self-center header-auto teacher">
		<div class="container mt-5">
			<select class="form-control w-100" id="sel1" name="select_class">
				<option id="class" value="" disabled selected hidden>--Select Class--</option>
				<?php foreach ($class_list as $data): ?>
					<option value="<?php echo $data['ClassID'] ?>"><?php echo $data['ClassID'] ?></option>
				<?php endforeach;?>
			</select>

			<br>
			<div id="chapter-container"> 
				<select class="form-control w-100" id="sel2" name="select_chapter">
					<option id="chapter" value="" disabled selected hidden>--Select Chapter--</option>
				</select>
			</div>

			<br>
			<div id="detail" class="mb-5"></div>
		</div>
	</div>

	<div class="container mt-5">
		<div id="exam-alert" style="display:none">
			<div class="alert alert-warning d-flex justify-content-between align-items-center" role="alert">
				<span id="exam-alert-text">Exam schedule for this chapter has not been selected</span>
				<button id="change-exam" type="button" class="btn btn-outline-danger" data-toggle='modal' data-target='#changeExam'>Select Date</button>
			</div>
		</div>

		<div class="container-fluid mt-4">
			<div id="student_container" class="row justify-content-center">
			</div>
		</div>
	</div>
	



<!-- javascript buat page ini -->
<script src="<?php echo base_url('front/js/classes.js') ?>"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script type='text/javascript'>
	var baseURL = '<?php echo base_url(); ?>';
	var student_list, clicked_id, chapterid, classid;
    var chapter, selected, date_list = [], iso_date = [];
 </script>
    
</body>
</html>