<?PHP
    class SkinController
    {
        function getCurrentSkinId()
        {
            return getSetting("selectedSkin");
        }

        function getCurrentSkinName()
        {
            include('system/dbconnect.php');

            global $dbprefix;

            $statement = $pdo->prepare("SELECT szName FROM ".$dbprefix."skins WHERE nKey = '".SkinController::getCurrentSkinId()."'");
            $statement->execute();
            if($row = $statement->fetch())
            {
                return $row['szName'];
            }
            else
            {
                return "default";
            }
        }

        function getCurrentSkinPath()
        {
            return "system/skins/".SkinController::getCurrentSkinName();
        }
    }
?>