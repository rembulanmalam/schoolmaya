<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schoolmaya | Login</title>
</head>
<body>
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
</body>
</html>