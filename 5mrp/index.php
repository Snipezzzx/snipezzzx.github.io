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

      .nav {
        align-items: center;
        background: #28BCBB;
        display: flex;
        font-family: "Helvetica";
        font-size: 15px;
        height: 60px;
      }

      .nav #brand {
        margin-left: 20%;
        color: white;
        font-size: 20px;
        text-decoration: none;
        text-shadow: -.5px -.5px 0 #FFF, .5px -.5px 0 #FFF, -.5px .5px 0 #FFF, .5px .5px 0 #FFF;
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

      .nav li a.active::after {
        background: white;
        content: '';
        display: block;
        height: 2px;
        margin: 2px 0;
        width: 100%;
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

      .even {
        background: #28BCBB;
        color: white;
        padding: 20px 20%;
      }

      .odd {
        background: #4B5B69;
        color: white;
        padding: 20px 20%;
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
      }
    </style>
  </head>
  <body>
    <?php
      include("navbar.php");
    ?>

    <div class="content">
      <div class="even">
        <h1>Informationen</h1>

        <p>Hier stehen in Zukunft wichtige Informationen</p>
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
  </body>
</html>
