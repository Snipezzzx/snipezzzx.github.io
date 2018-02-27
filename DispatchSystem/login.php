<!DOCTYPE html>
<html>
  <head>
    <title>Login - DispatchSystem</title>

    <meta charset="utf-8" />

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <style>
      html {
        font-family: "Helvetica";
        color: white;
        height: 100%;
      }

      body {
        background: #2969B0;
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
      }

      h2 {
        margin: 0px;
      }

      hr {
        background-color: white;
        border: 0;
        color: white;
        height: 2px;
        width: 420px;
      }

      .header {
        align-items: center;
        display: flex;
        font-weight: bold;
        height: 50px;
        justify-content: space-between;
        left: 0;
        margin: 0;
        position: absolute;
        top: 0;
      }

      .header.success {
        background: #6FE869;
        width: 100%;
      }

      .header p {
        padding: 0 0 0 10px;
      }

      #close {
        cursor: pointer;
        padding: 0 15px 0 0;
      }

      .container {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
      }

      form {
        align-items: center;
        display: flex;
        flex-direction: column;
        font-size: 20px;
        width: 30%;
      }

      form input {
        background: #4E87C7;
        border: 1px solid white;
        color: white;
        font-size: 18px;
        font-weight: bold;
        height: 50px;
        margin: 7.5px;
        padding: 0 0 0 10px;
        width: 400px;
      }

      form input::placeholder {
        color: white;
      }

      form button {
        background: white;
        border: 0;
        color: #2969B0;
        font-weight: bold;
        font-size: 20px;
        height: 50px;
        margin: 7.5px;
        width: 410px;
      }

      form button:hover {
        background: #DDD;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <?php
      if(isset($_GET['user']) && isset($_GET['password']))
      {
        if(strlen($_GET['user']) > 0 && strlen($_GET['password']))
        {
          session_start();
          $_SESSION['user'] = $_GET['user'];
          echo "<div class='header success' id='info'><p>Login erfolgreich</p><i class='fas fa-times' id='close' onclick='closeHeader()'></i></i></div>";
          header("refresh:5;index.php");
        }
      }
    ?>
    <div class="container">
      <form>
        <h2>Dispatch-System</h2>
        <hr />
        <input name="user" placeholder="Benutzername"/>
        <input name="password" placeholder="Passwort" type="password"/>
        <button type="submit">Login</button>
      </form>
    </div>

    <script>
      function closeHeader()
      {
        document.getElementById('info').style.display = "none";
      }
    </script>
  </body>
</html>
