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

	<title>Schoolmaya | Schedule</title>
</head>
<body>
    <div class="container">
        <h1>Your Schedule</h1>
        <a class="btn btn-dark" href="<?php echo (base_url('index.php/login/logout/')) ?>">Logout</a>
        <a class="btn btn-dark" href="<?php echo (base_url('index.php/home/')) ?>">Home</a>
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
</body>
</html>