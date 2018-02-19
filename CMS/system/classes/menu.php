<?PHP
    class Menu
    {
        function display($id, $globalstart, $globalend, $elementstart, $elementend, $class)
        {
            global $dbprefix, $pdo;

            $statement = $pdo->prepare("SELECT szTitle, szHref
                                        FROM ".$dbprefix."menu 
                                        WHERE nMenuLink = '".$id."' ORDER BY nID");
            $statement->execute();
            
            echo $globalstart;
            $i = 1;
            while($row = $statement->fetch())
            {
                echo $elementstart.'<a href="'.$row['szHref'].'" title="'.$row['szTitle'].'" class="'.$class.' menue-'.$id.'-'.$i.'">'.$row['szTitle'].'</a>'.$elementend;
                $i++;
            }
            echo $globalend;
        }
    }
?>