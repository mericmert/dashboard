<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/homepage.css" />
  <link rel="stylesheet" href="css/table.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
   
  </script>
  <title>Dashboard</title>
</head>

<body>
  <?php include './database/connection.php' ?>
  <div class="wrapper">
    <div class="main-navbar">
      <a style="color:inherit" href="/"><span>Dashboard     <i class="chart line icon"></i></span></a>
      <div class="hamburger-menu">
        <i id="navbar" class="align justify icon"></i>
      </div>
    </div>
    <div class="homepage-container">
      <?php include './components/navbar.php'?>
      <div class="content">
        <?php include './router/router.php'?>
      </div>
    </div>
    <?php //include './components/employerForm.php' ?>
  </div>
</body>

</html>