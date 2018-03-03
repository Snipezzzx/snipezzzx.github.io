<!DOCTYPE html>
<html>
  <head>
    <title>5mrp - Streamer</title>

    <meta charset="utf-8"/>

    <style>
      body {
        margin: 0;
      }
    </style>
  </head>
  <body>
    <?php
      include("navbar.php");
    ?>

    Diese Leute streamen gerade auf unserem Server:
    <div>
      <?php 
        $channels = array("snipezzzx", "ralfingertv") ;
        $callAPI = implode(",",$channels);
        $clientID = 'kz8ttf5lr24kdsmavpgk3uyit3uflp';
        $arrContextOptions=array(
            "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
          ),
        );
        $dataArray = json_decode(file_get_contents('https://api.twitch.tv/kraken/streams?channel=' . $callAPI . '&client_id=' . $clientID, false, stream_context_create($arrContextOptions)), true);

        foreach($dataArray['streams'] as $mydata){
          if($mydata['_id'] != null){
            $name = $mydata['channel']['display_name'];
            $game = $mydata['channel']['game'];
            $url = $mydata['channel']['url'];
            $logo = $mydata['channel']['logo'];
            $preview = $mydata['preview']['medium'];
            $status = $mydata['channel']['status'];

            if(strpos($status, '#5mrp'))
            {
              echo "<a href='" . $url . "'><div style='position:relative;'>";
              echo "<img src='" . $preview . "'/>";
              echo "<img style='position:absolute;top:5px;left:5px;height:50px;border:2px solid black; border-radius:50%;' src='" . $logo . "'/>";
              echo "</div></a><br>";
              echo "<a href='" . $url . "'>" . $name . "</a><br>";
            }
          }
        }
        if($dataArray['streams'] == null or $dataArray['streams'] == "")
        {
          echo	"OFFLINE";
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