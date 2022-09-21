<?php

include "upload-handler.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDC10 - File Uploader OOP and PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container bg-dark text-white">

        <!-- Display whether registration is successful or failed -->
        <?php
        if ($message == true) {
            echo "<div class=" . "'alert alert-success mt-5'" . ">
                Successfully saved your registration.
            </div>";
        } else if ($message != true) {
            echo "<div class=" . "'alert alert-danger mt-5'" . ">
                Unable to save your registration.
            </div>";
        }
        ?>

        <div class="row">

            <div class="col">
                <h2 style="margin-top: 50px; margin-bottom: 50px;">Registrations</h2>
            </div>

            <div class="col">
                <a href="register.php"><button type="button" class="btn btn-light" style="margin-top: 50px; margin-bottom: 50px;">Add New Registration</button></a>
            </div>

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Complete Name</th>
                        <th>Email</th>
                        <th>Picture</th>
                        <th>Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $registrations = Registration::retrieveRegistration();
                    foreach ($registrations as $attempt) {

                    ?>

                        <tr>
                            <td><?php echo $attempt['id']; ?></td>
                            <td><?php echo $attempt['complete_name']; ?></td>
                            <td><?php echo $attempt['email']; ?></td>
                            <td><?php $filename = $attempt['picture_path'];
                                echo "<img width=100px; height=100; src=" .  $filename . ">"; ?></td>
                            <td><?php echo $attempt['registered_at']; ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>