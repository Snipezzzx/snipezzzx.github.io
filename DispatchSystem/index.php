<!DOCTYPE html>
<html>
  <head>
    <title>5mrp - DispatchSystem</title>

    <meta charset="utf-8"/>

    <style>
      body {
        color: white;
        font-family: "Helvetica";
      }

      .nav {
        background: #2969B0;
        font-weight: bold;
        left: 0;
        right: 0;
        position: absolute;
        top: 0;
      }

      .nav ul {
        display: flex;
        flex-direction: row;
        padding: 0 0 0 20px;
      }

      .nav li {
        list-style-type: none;
        margin-right: 20px;
      }

      .nav li a {
        color: white;
        text-decoration: none;
      }

      .nav li a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <?php
      if(!isset($_SESSION['user']))
      {
        header("login.php");
      }

      include('navbar.php');
    ?>

    <h2>Test</h2>
  </body>
</html>
