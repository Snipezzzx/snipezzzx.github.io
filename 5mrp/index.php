<!DOCTYPE html>
<html>
  <head>
    <title>5mrp.de - Startseite</title>

    <meta charset="utf-8" />

    <style>
      html {
        height: 100%;
      }

      body {
        font-family: "Helvetica";
        height: 100%;
        margin: 0;
      }

      .nav {
        align-items: center;
        background: #28BCBB;
        display: flex;
        font-size: 15px;
        height: 60px;
      }

      .nav #brand {
        margin-left: 100px;
        color: white;
        font-size: 20px;
        text-decoration: none;
        text-shadow: -.5px -.5px 0 #FFF, .5px -.5px 0 #FFF, -.5px .5px 0 #FFF, .5px .5px 0 #FFF;
      }

      .nav a {

      }

      .nav ul {

      }

      .nav li {
        display: inline;
        list-style-type: none;
        margin-right: 20px;
      }

      .nav li a {
        color: white;
        display: inline-block;
        text-decoration: none;
      }

      .nav li a::after, .nav li a::before {
          content: '';
          display: block;
          width: 0;
          height: 2px;
          background: white;
          margin: 2px 0;
          transition: width .3s;
      }

      .nav li a:hover::after, .nav li a:hover::before {
        width: 100%;
      }

      @keyframes hover {
        from {
          border-bottom: 0;
          border-top: 0;
        }
        to {
          border-bottom: 1px solid white;
          border-top: 1px solid white;
        }
      }
    </style>
  </head>
  <body>
    <?php
      include("navbar.php");
    ?>
  </body>
</html>
