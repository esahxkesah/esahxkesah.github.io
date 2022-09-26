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
                    <a class="nav-link" href="./log.php">Log Activity</a>
                    <a class="nav-link active" href="./about.php">About</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="mt-3">
        <div>
            <h1>About</h1>
            <p>
              This system is solely to help people to have a worryless day about their plants or mini agriculture when they away from home. Now you could water you plant from everywhere you are and also could record update about your plant.
            </p>
        </div>
    </section>
    
    <script>
        if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ) }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>