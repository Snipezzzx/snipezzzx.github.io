<?PHP
    class Page
    {
        var $id = -1;
        var $alias = '';
        var $title = '';
        var $ownerid = -1;
        var $owner = false;
        var $menu = -1;

        function loadProperties($alias)
        {
            global $dbprefix, $pdo;

            $statement = $pdo->prepare("SELECT nKey, szTitle, nOwner, nMenuLink
                                FROM ".$dbprefix."pages
                                WHERE szAlias = '".$alias."'");
            $statement->execute();

            if($row = $statement->fetch())
            {
                $this->id = $row['nKey'];
                $this->title = $row['szTitle'];
                $this->ownerid = $row['nOwner'];
                $this->menu = $row['nMenuLink'];
                $this->alias = $alias;
            }
        }

        function getContent()
        {
            include(filterfilename("../content/articles/".$this->alias));
        }

        function getOwner()
        {
            global $dbprefix, $pdo;

            if(!$this->owner)
            {
                $statement = $pdo->prepare("SELECT szAlias
                                    FROM ".$dbprefix."pages 
                                    WHERE nKey = '".$this->ownerid."'");
                $statement->execute();

                if($row = $statement->fetch())
                {
                    $this->owner = new Page();
                    $this->owner->loadProperties($row['szAlias']);
                }
            }

            return $this->owner;
        }

        function getBreadcrump()
        {
            if(!$this->owner) $this->getOwner();

            if($this->owner)
            {
                $breadcrump = $this->owner->getBreadcrump();
            }

            $breadcrump[] = array($this->alias, $this->title);

            return $breadcrump;
        }
    }
?>