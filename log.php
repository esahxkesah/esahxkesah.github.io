<?php

include_once('function.php');
include_once('database.php');

$message = null;

$sql = "SELECT `a`.`id`, `a`.`sprinkler_id`, `a`.`log`, `a`.`timestamp`, `b`.`name` FROM `sprinkler_logs` AS `a` JOIN `sprinklers` AS `b` ON `a`.`sprinkler_id` = `b`.`id` ORDER BY `a`.`timestamp` DESC";
$logs = mysqli_query($Database, $sql);

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
                    <a class="nav-link" href="./index.php">List Sprinkler</a>
                    <a class="nav-link" href="./create.php">Add Sprinkler</a>
                    <a class="nav-link active" href="./log.php">Log Activity</a>
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
            <h1>Log Activity</h1>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th>Sprinker</th>
              <th>Activity</th>
              <th>Date</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($logs) > 0): ?>
              <?php while ($row = mysqli_fetch_assoc($logs)): ?>
                <tr>
                  <td><?=$row['name']?></td>
                  <td><?=$row['log']?></td>
                  <td><?=date('d F Y', strtotime($row['timestamp']))?></td>
                  <td><?=date('h:i:sA', strtotime($row['timestamp']))?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="m-0">No data.</p>
            <?php endif; ?>
          </tbody>
        </table>
    </section>
    
    <script>
        if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ) }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>