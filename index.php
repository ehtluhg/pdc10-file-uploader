<?php

include "upload-handler.php";

$dsn = "mysql:host=localhost;dbname=pdc10_db";
$user = "gabdy";
$passwd = "VW0@BRr6MgZQ_vM_";

$pdo = new PDO($dsn, $user, $passwd);


$result = Registration::handleUpload($_FILES['picture_path']);

if ($result !== FALSE) {

  // Save the uploaded file to DB. File name as the label
  $obj = new Registration($_POST['complete_name'], $_POST['email'], $pwd['password'], $result['path']);
  $result = $obj->save();

  header('Location: index.php?success=1');
} else {

  header('Location: index.php?error=' . $e->getMessage());
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>File Upload Handler in PHP</title>
</head>

<body>
  <h1>Registrations</h1>
  <button type="button" class="btn btn-outline-dark">Add New Registration</button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Complete Name</th>
        <th scope="col">Email</th>
        <th scope="col">Picture</th>
        <th scope="col">Registered Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $registrations = Registration::retrieveRegistration();
      foreach ($registrations as $registration) {
      ?>

        <tr>
          <td>
            <?php echo $registration['id']; ?>
          </td>
          <td>
            <?php echo $registration['complete_name']; ?>
          </td>
          <td>
            <?php echo $registration['email']; ?>
          </td>
          <td>
            <?php
            $filename = $registration['path'];
            echo "<img width=100px; height=100px; src=" . $registration['path'] . ">"; ?>
          </td>
          <td>
            <?php echo $registration['registered_at']; ?>
          </td>

        <?php
      }

        ?>

    </tbody>
</body>

</html>