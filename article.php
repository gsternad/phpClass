<?php
    include "helpers/posts.php";
    include "inc/functions.php";
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
        $posts = allPosts();
        $postData = getPost($id);
        // if(!is_numeric($id) || !in_array($id, array_keys($posts));
        if(!getPost($id))
        {
            header("Location: page404.php");
            die();
        }
        else
        {
            echo "<h1>" . $postData["title"] . "</h1>";
            echo "<p>" . $postData["content"] . "</p>";
            if(!empty($postData["image"]["url"]))
            {
                echo "<img src='" . $postData["image"]["url"] . " alt='" . $postData["image"]["alt"] . "'/><br>";
            }
            echo "<p>" . date("d. m. Y", $postData["authored on"]) . "</p>";
            echo "<p>" . $postData["authored by"] . "</p>";
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