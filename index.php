<?php
  session_start();
  ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="dist/css/lightbox.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="row">
        <header class="col-12">
        <?php
      //запускаем сессию, которая проверяет есть ли пользователь
        require_once('pages/function.php') ?>

        </header>
    </div>
    <div class="row">

        <nav class="col-12">
            <?php include_once('pages/menu.php'); ?>
        </nav>
    </div>
    <div class="row">
        <section class="col-12 mt-5">
        <?php
        if (isset($_GET['page'])){
            $page=$_GET['page'];
            if ($page==1) include_once ('pages/Home.php');
            if ($page==2) include_once ('pages/Upload.php');
            if ($page==3) include_once ('pages/Gallery.php');
            if ($page==4) include_once ('pages/Registration.php');
            if ($page==5) include_once ('pages/Login.php');
        }
        ?>
        </section>
    </div>
</div>



<!-- scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="dist/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>