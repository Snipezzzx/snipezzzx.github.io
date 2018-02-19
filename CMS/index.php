<?PHP
    include("system/dbconnect.php");
    include("system/settings.php");
    include("system/classes/page.php");
    include("system/classes/skincontroller.php");
    include("system/classes/menu.php");
    include("system/filterfilename.php");
    include("system/sys.php");
    $currentpage = new Page();
    $currentpage->loadProperties($_GET['include']);
    include(SkinController::getCurrentSkinPath()."/index.php");
?>