<!DOCTYPE html>
<html>
  <head>
    <title>5mrp - Streamer</title>

    <meta charset="utf-8"/>

    <style>
      @font-face {
        font-family: "Amaranth";
        src: url("fonts/Amaranth-Regular.otf");
      }

      html {
        height: 100%;
      }

      body {
        font-family: "Amaranth", "Helvetica";
        height: 100%;
        margin: 0;
      }

      .content {
        margin-left: auto;
        margin-right: auto;
        width: 70%;
      }

      .content #offline {
        font-size: 45px;
        text-align: center;
        width: 50%;
      }

      .streamerpanel {
        align-content: flex-start;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
      }

      .streamer {
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
        padding: 20px;
        margin: 20px;
      }

      .streamer p {
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 300px;
      }

      .streamer .logo {
        box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
        border-radius:50%;
        height: 50px;
        left: 5px;
        position: absolute;
        top: 5px;
      }

      a {
        color: #28BCBB;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }

      p {
        font-size: 18px;
      }
    </style>
  </head>
  <body>
    <?php
      include("navbar.php");
    ?>

    <div class="content">
      <h2>Willkommen auf der Streamer-Seite von 5MRP,</h2>
      <p>hier werden Streamer angezeigt, die gerade auf unserem Server spielen.</p>
      <p>Du möchtest auch hier angezeigt werden, sobald du auf unserem Server streamst? Dann komm einfach auf uns zu und wir tragen dich in die Liste ein.</p>

      <?php 
        $channels = array("snipezzzx", "ralfingertv", "necr1te", "kahzeart", "maschinetv", "philmannlive", "killerno7") ;
        $callAPI = implode(",", $channels);
        $clientID = 'kz8ttf5lr24kdsmavpgk3uyit3uflp';
        $arrContextOptions=array(
            "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
          ),
        );
        $dataArray = json_decode(file_get_contents('https://api.twitch.tv/kraken/streams?channel=' . $callAPI . '&client_id=' . $clientID, false, stream_context_create($arrContextOptions)), true);

        $streamercount = 0;
        foreach($dataArray['streams'] as $mydata)
        {
          if($streamercount == 0)
          {
            echo "<div class='streamerpanel'>";
          }

          if($mydata['_id'] != null)
          {
            $name = $mydata['channel']['display_name'];
            $game = $mydata['channel']['game'];
            $url = $mydata['channel']['url'];
            $logo = $mydata['channel']['logo'];
            $preview = $mydata['preview']['medium'];
            $status = $mydata['channel']['status'];

            // if(strpos($status, '#5mrp'))
            // {
              echo "<div class='streamer'>";
              echo "<a href='" . $url . "'><div style='position:relative;'>";
              echo "<img src='" . $preview . "'/>";
              echo "<img class='logo' src='" . $logo . "'/>";
              echo "</div></a>";
              echo "<a href='" . $url . "'>" . $name . "</a>";
              echo "<p>" . $status . "</p>";
              echo "</div>";
            // }
          }

          $streamercount++;

          if($streamercount == $dataArray['_total'])
          {
            echo "</div>";
          }
        }

        if($dataArray['streams'] == null or $dataArray['streams'] == "" or $dataArray['_total'] == 0)
        {
          echo "<h1 id='offline'>Leider streamt gerade keiner der eingetragenen Streamer auf unserem Server</h1>";
        }
      ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $('a[href^="streamer"]').addClass('active');
      });
    </script>
  </body>
</html>