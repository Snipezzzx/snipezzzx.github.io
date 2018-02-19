<?PHP
    function filterfilename($filename)
    {
        $filename = strtolower($filename);
        $filename = preg_replace("[^a-z0-9-]","",$filename);
        
        if($filename[0] == "/")
        {
            $filename = substr($filename,1);
        }

        $filename .= ".php";

        if(!file_exists($filename))
        {
            $filename = "content/articles/errors/404.php";
        }

        return $filename;
    }
?>