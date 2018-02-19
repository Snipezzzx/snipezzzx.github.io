<?PHP
    class sys
    {
        function includeContent()
        {
            include(filterfilename("content/articles/".$_GET['include']));
        }

        function includeHeader()
        {
            global $dbprefix, $pdo, $currentpage;

            echo "<title>Sys-Title</title>";

            $statement = $pdo->prepare("SELECT szName, szContent
                                FROM ".$dbprefix."meta_global
                                UNION SELECT szName, szContent
                                FROM ".$dbprefix."meta_local
                                WHERE ".$dbprefix."pages.szAlias = '".$_GET['include']."'");
            $statement->execute();

            while($row = $statement->fetch())
            {
                echo '<meta name="'.$row['szName'].'" content="'.$row['szContent'].'" />';
            }
        }

        function displayBreadcrump($separator, $class, $idprefix)
        {
            global $currentpage;
            $i = 1;
            $breadcrump = $currentpage->getBreadcrump();

            while($i <= count($breadcrump))
            {
                echo '<a href="'.$breadcrump[$i-1][0].'.htm" class="'.$class.'" id="'.$idprefix.$i.'">'.$breadcrump[$i-1][1]."</a>";

                if($i < count($breadcrump))
                {
                    echo $separator;
                }

                $i++;
            }
        }

        function displayMenu($id, $globalstart, $globalend, $elementstart, $elementend, $class)
        {
            Menu::display($id, $globalstart, $globalend, $elementstart, $elementend, $class);
        }

        function displayGlobalMenu($globalstart, $globalend, $elementstart, $elementend, $class)
        {
            global $dbprefix, $pdo;

            $statement = $pdo->prepare("SELECT szValue
                                        FROM ".$dbprefix."settings 
                                        WHERE szProperty = 'globalmenuid'");
            $statement->execute();

            if($row = $statement->fetch())
            {
                Menu::display($row['szValue'], $globalstart, $globalend, $elementstart, $elementend, $class);
            }
        }

        function displayLocalMenu($globalstart, $globalend, $elementstart, $elementend, $class)
        {
            global $currentpage;

            if($currentpage->menu > -1)
            {
                Menu::display($currentpage->menu, $globalstart, $globalend, $elementstart, $elementend, $class);
            }
        }

        function getColor($id)
        {
            return "#".getSetting("skin".$id);
        }
    }
?>