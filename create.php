<?php

include_once("function.php");
include_once("database.php");

$message = null;

if (isset($_POST['add_sprinkle_submit'])) {
  $name = $_POST['name'];
  $remarks = $_POST['remarks'];
  $image = uniqid()."_".basename($_FILES['image']['name']);
  $image_tmp = $_FILES['image']['tmp_name'];

  $storage_path = "./storage/";
  $created_at = date('Y-m-d H:i:s');

  if (move_uploaded_file($image_tmp, $storage_path . $image)) {
    $sql = "INSERT INTO `sprinklers` (`name`, `remarks`, `image`, `created_at`) VALUES ('$name', '$remarks', '$image', '$created_at')";

    if (mysqli_query($Database, $sql)) {
      $message = "New sprinkler added";

      $last_inserted_sprinker_id = mysqli_insert_id($Database);
      $log = "New sprinker added";
      $sql = "INSERT INTO `sprinkler_logs` (`sprinkler_id`, `log`, `timestamp`) VALUES ('$last_inserted_sprinker_id', '$log', '$created_at')";
      mysqli_query($Database, $sql);
    } else {
      $message = "Failed to save new sprinkler: ".mysqli_error($Database);
    }
    
    mysqli_close($Database);
  } else {
    $message = "Failed to store new sprinkler";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokok Sprinkler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="container">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
          <a class="navbar-brand" href="./index.php">Sprinkler</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                  <a class="nav-link" href="./index.php">List Sprinkler</a>
                  <a class="nav-link active" href="./create.php">Add Sprinkler</a>
                  <a class="nav-link" href="./log.php">Log Activity</a>
                  <a class="nav-link" href="./about.php">About</a>
              </div>
          </div>
      </div>
    </nav>

    <section class="mt-3">
      <?php if (!is_null($message)): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <p class="m-0"><?=$message?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php endif; ?>

      <h2>Create Sprinkler</h2>
  
      <form method="post" enctype="multipart/form-data" class="d-grid gap-3">
        <div>
          <label for="name" class="form-label">Sprinkler Name</label>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>
  
        <div>
          <label for="remarks" class="form-label">Sprinkle Remarks</label>
          <input type="text" id="remarks" name="remarks" class="form-control" required>
        </div>
  
        <div>
          <label for="image" class="form-label">Sprinkle Image</label>
          <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" class="form-control" required>
        </div>
        
        <div>
          <button type="submit" name="add_sprinkle_submit" class="btn btn-primary w-25">Add</button>
        </div>
      </form>
    </section>

    <script>
      if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ) }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>