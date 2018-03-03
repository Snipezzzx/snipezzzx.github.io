<!DOCTYPE html>
<html>
  <head>
    <style>
      .nav {
        align-items: center;
        background: #28BCBB;
        display: flex;
        font-family: "Helvetica";
        font-size: 15px;
        height: 6%;
      }

      .nav #brand {
        margin-left: 25%;
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
    </style>
  </head>
  <body>
    <div class="nav">
      <a id="brand" href="#">5MRP</a>
      <ul>
        <li>
          <a href="index" id="index">Home</a>
        </li>
        <li>
          <a href="#">Forum</a>
        </li>
        <li>
          <a href="streamer" id="streamer">Streamer</a>
        </li>
        <li>
          <a href="#">Regeln</a>
        </li>
        <li>
          <a href="https://discord.me/ralfinger">Discord</a>
        </li>
        <li>
          <a href="#">Teamspeak</a>
        </li>
      </ul>
    </div>
  </body>
</html>