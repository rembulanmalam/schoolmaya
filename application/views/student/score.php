<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet"> 

    <!-- Navbar -->	
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo (base_url('index.php/home/')) ?>">Schoolmaya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo (base_url('index.php/home/')) ?>">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo (base_url('index.php/schedule/')) ?>">Schedule</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo (base_url('index.php/score/')) ?>">Score<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-danger" href="<?php echo (base_url('index.php/login/logout/')) ?>">Logout</a>
          </li>
          </ul>
        </div>
      </div>
    </nav>

    <title>Schoolmaya | View Score</title>
</head>
<body>
  <div class="container mt-5">
    <h1>Your Score</h1>
  </div>

  <div class="container mt-5">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Chapter</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($scores as $score): ?>
            <tr>
            <th scope="row"><?php echo $score['ChapterID']; ?></th>
            <td><?php echo $score['Score'] ;?></td>
            </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</body>
</html>