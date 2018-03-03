<!DOCTYPE html>
<html>
  <head>
    <title>5mrp.de - Startseite</title>

    <meta charset="utf-8" />

    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

    <style>
      @font-face {
        font-family: "Amaranth";
        src: url("fonts/Amaranth-Regular.otf");
      }

      html {
        height: 100%;
      }

      body {
        font-family: "Amaranth";
        height: 100%;
        margin: 0;
      }

      .content {
        height: 94%;
      }

      .even {
        background: #28BCBB;
        color: white;
        padding: 20px 25%;
      }

      .odd {
        background: #4B5B69;
        color: white;
        padding: 20px 25%;
      }

      .changelog {
        margin-bottom: 21px;
      }

      .changelog h3 {
        margin: 5px 30px;
      }

      .changelog ul {
        margin: 5px 10px;
      }

      .changelog li {
        list-style-type: none;
        margin: 5px;
      }
    </style>
  </head>
  <body>
    <?php
      include("navbar.php");
    ?>

    <div class="content">
      <div class="even">
        <h1>Guten Tag,</h1>

        <!--<h3>Guten Tag,</h3>-->
        <p>
          willkommen auf der Website des 5MRP-Servers. Dieses Projekt besteht seit
        </p>
      </div>
      <div class="odd">
        <h1>Updates</h1>

        <p>Hier stehen in Zukunft Changelogs</p>
        <p>Beispiel:</p>
        <div class="changelog">
          <h2>Changelog vom 27.02.2018</h2>

          <h3>Neu</h3>
          <ul>
            <li><i class="fas fa-caret-right"></i> Wir haben das langersehnte Fahrzeuginventar eingefügt!</li>
            <li><i class="fas fa-caret-right"></i> Join- und Leavenachrichten wurden deaktiviert (Ja, die haben auch uns genervt)</li>
            <li><i class="fas fa-caret-right"></i> Transparenz vom Chatfenster erhöht</li>
          </ul>
        </div>
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $('a[href^="index"]').addClass('active');
      });
    </script>
  </body>
</html>
