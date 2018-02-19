<?PHP
    include('dbsettings.php');
    $pdo = new PDO('mysql:host='.$dbhost.';dbname='.$db, $dbuser);
?>