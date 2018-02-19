<?PHP
    function getSetting($property)
    {
        include('dbconnect.php');

        global $dbprefix;
 
        $statement = $pdo->prepare("SELECT szValue FROM ".$dbprefix."settings WHERE szProperty = '".$property."'");
        $statement->execute();
        $row = $statement->fetch();
        
        return $row['szValue'];
    }
?>