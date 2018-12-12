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

    <style>
      body{
        font-family: 'Open Sans';
      }

      h1#titles{
        font-family: 'Raleway';
      }
    </style>

    <title>Schoolmaya | Login</title>
</head>
<body>
  <div class="container mt-5 mb-5">
    <h1 id = 'titles'>Schoolmaya</h1>

    <?php if($this->session->flashdata('Failed')):?>
      <p class='flash_msg flash_fail'>  </p>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login Failed!</strong> <?php echo $this->session->flashdata('Failed')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif?>

    <form action = "index.php/login/process/" method = "POST" >
      <div class="form-group">
        <label for="username">Email  </label>
        <input type="text" class="form-control" placeholder="Enter username" name = "username">
      </div>
      <div class="form-group">
        <label for="username">Password</label>
        <input type="password" class="form-control" placeholder="Password" name = "password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>