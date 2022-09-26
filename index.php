<?php

include_once('function.php');
include_once('database.php');

$message = null;

if (isset($_POST['sprinkler_switch_submit'])) {
    $id = $_POST['id'];
    $is_sprinkling = $_POST['is_sprinkling'];
    
    $sql = ($is_sprinkling) ? "UPDATE `sprinklers` SET `is_sprinkling` = 0 WHERE `id` = '$id'" : "UPDATE `sprinklers` SET `is_sprinkling` = 1 WHERE `id` = '$id'";
    if (mysqli_query($Database, $sql)) {
        $log = ($is_sprinkling) ? "Sprinker has been switched off" : "Sprinker has been switched on";
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `sprinkler_logs` (`sprinkler_id`, `log`, `timestamp`) VALUES ('$id', '$log', '$created_at')";
        mysqli_query($Database, $sql);

        $message = $log;
    }
}

if (isset($_POST['update_sprinkler_image_submit'])) {
    $id = $_POST['id'];
    $image = uniqid()."_".basename($_FILES['image']['name']);
    $image_tmp = $_FILES['image']['tmp_name'];
    $storage_path = "./storage/";

    move_uploaded_file($image_tmp, $storage_path . $image);
    $sql = "UPDATE `sprinklers` SET `image` = '$image' WHERE `id` = '$id'";
    mysqli_query($Database, $sql);

    $log = "Sprinker image has been updated";
    $created_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `sprinkler_logs` (`sprinkler_id`, `log`, `timestamp`) VALUES ('$id', '$log', '$created_at')";
    mysqli_query($Database, $sql);

    $message = $log;
}

if (isset($_POST['update_sprinkler_submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE `sprinklers` SET `name` = '$name', `remarks` = '$remarks' WHERE `id` = '$id'";
    mysqli_query($Database, $sql);

    $log = "Sprinker information has been updated";
    $created_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `sprinkler_logs` (`sprinkler_id`, `log`, `timestamp`) VALUES ('$id', '$log', '$created_at')";
    mysqli_query($Database, $sql);

    $message = $log;
}

$sql = "SELECT * FROM `sprinklers` ORDER BY created_at DESC";
$sprinklers = mysqli_query($Database, $sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokok Sprinkler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/test.css">
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
                    <a class="nav-link active" href="./index.php">List Sprinkler</a>
                    <a class="nav-link" href="./create.php">Add Sprinkler</a>
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

        <div>
            <h1>This is a system to automate watering your plant</h1>
            <p>Less worry, More Happy!</p>
        </div>

        <div class="row row-cols-4">
            <?php if (mysqli_num_rows($sprinklers) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($sprinklers)): ?>
                    <div class="p-1">
                        <div class="card p-0">
                            <img src="./storage/<?=$row['image']?>" class="card-img-top" style="height:20rem" alt="<?=strtolower($row['name'])?>">
                            <div class="card-body d-grid gap-4">
                                <div>
                                    <h5 class="card-title"><?=$row['name']?></h5>
                                    <p class="card-text"><?=$row['remarks']?></p>
                                </div>

                                <div>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?=$row['id']?>">
                                        <input type="hidden" name="is_sprinkling" value="<?=$row['is_sprinkling']?>">
                                        <div class="d-flex align-items-center gap-3">
                                            <button type="submit" name="sprinkler_switch_submit" class="btn p-0">
                                                <?php if ($row['is_sprinkling']):?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-toggle2-on text-primary" viewBox="0 0 16 16">
                                                        <path d="M7 5H3a3 3 0 0 0 0 6h4a4.995 4.995 0 0 1-.584-1H3a2 2 0 1 1 0-4h3.416c.156-.357.352-.692.584-1z"/>
                                                        <path d="M16 8A5 5 0 1 1 6 8a5 5 0 0 1 10 0z"/>
                                                    </svg>
                                                <?php else: ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-toggle2-off text-secondary" viewBox="0 0 16 16">
                                                        <path d="M9 11c.628-.836 1-1.874 1-3a4.978 4.978 0 0 0-1-3h4a3 3 0 1 1 0 6H9z"/>
                                                        <path d="M5 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1A5 5 0 1 0 5 3a5 5 0 0 0 0 10z"/>
                                                    </svg>
                                                <?php endif; ?>
                                            </button>

                                            <p class="m-0">Switch to water the plant</p>
                                        </div>
                                    </form>
                                </div>

                                <div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSprinkler<?=$row['id']?>">
                                        Update Sprinkler
                                    </button>
                                    <div class="modal fade" id="updateSprinkler<?=$row['id']?>" tabindex="-1" aria-labelledby="updateSprinkler<?=$row['id']?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateSprinkler<?=$row['id']?>Label"><?=$row['name']?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="d-grid gap-3">
                                                        <form method="post" enctype="multipart/form-data" class="d-grid gap-3">
                                                            <div>
                                                                <label for="image" class="form-label">Sprinkle Image</label>
                                                                <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" class="form-control" required>
                                                            </div>

                                                            <input type="hidden" name="id" value="<?=$row['id']?>">
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" name="update_sprinkler_image_submit" class="btn btn-primary w-50">Update Image</button>
                                                            </div>
                                                        </form>
                                                        
                                                        <form method="post" class="d-grid gap-3">
                                                            <div>
                                                                <label for="name" class="form-label">Sprinkler Name</label>
                                                                <input type="text" id="name" name="name" value="<?=$row['name']?>" class="form-control" required>
                                                            </div>
                                                    
                                                            <div>
                                                                <label for="remarks" class="form-label">Sprinkle Remarks</label>
                                                                <input type="text" id="remarks" name="remarks" value="<?=$row['remarks']?>" class="form-control" required>
                                                            </div>
                                                            
                                                            <input type="hidden" name="id" value="<?=$row['id']?>">
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" name="update_sprinkler_submit" class="btn btn-primary w-25">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No data</p>
            <?php endif; ?>
        </div>
    </section>
    
    <script>
        if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ) }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>