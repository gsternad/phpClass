<?php
    include "helpers/posts.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Proceduralni CMS - Agiledrop PHP-Masterclass</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Agiledrop PHP-Masterclass</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
        class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : FALSE;
        // if(!is_numeric($id) || !in_array($id, array_keys($posts));
        if($id < count($posts))
        {
            echo "<h1>" . $posts[$id]["title"] . "</h1>";
            echo "<p>" . $posts[$id]["content"] . "</p>";
            if(!empty($posts[$id]["image"]["url"]))
            {
                echo "<img src='" . $posts[$id]["image"]["url"] . " alt='" .$posts[$id]["image"]["alt"] . "'/><br>";
            }
            echo "<p>" . date("d. m. Y", $posts[$id]["authored on"]) . "</p>";
            echo "<p>" . $posts[$id]["authored by"] . "</p>";
        }
        else
        {
            header("Location: page404.php");
            die();
        }
        ?>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>