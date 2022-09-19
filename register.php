<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>Registration Form</h1>
    <form method="POST" enctype="multipart/form-data" action="index.php">
  <div class="mb-3">
    <label for="exampleCompleteName" class="form-label">Complete Name</label>
    <input name="completeName" type="completeName" class="form-control" id="exampleCompleteName" aria-describedby="completeNameHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleEmailAddress" class="form-label">Email Address</label>
    <input name="emailAddress" type="emailAddress" class="form-control" id="exampleEmailAddress" aria-describedby="completeEmailAddress" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="pass" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <input name="conPass" type="password" class="form-control" id="exampleInputPassword2" required>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Picture</label>
  <input name="input_file" class="form-control" type="file" id="formFile" required>
</div>
  <button type="submit" class="btn btn-primary">Submit Registration</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>