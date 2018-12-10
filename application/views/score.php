<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>