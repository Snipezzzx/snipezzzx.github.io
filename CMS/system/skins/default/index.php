<!DOCTYPE html>
<html>
    <head>
        <?PHP
            sys::includeHeader();
        ?>
        <style>
            body {
                background-color: #fff;
                color: <?PHP echo sys::getColor("forecolor"); ?>;
            }

            a {
                color: <?PHP echo sys::getColor("highlight1"); ?>;
            }

            a:visited {
                color: <?PHP echo sys::getColor("highlight2"); ?>;
            }

            #globalmenu {
                list-style-type: none;
            }

            #globalmenu li {
                display: inline;
            }

            #container {
                background-color: <?PHP echo sys::getColor("bgcolor"); ?>;
                width: 90%;
                border: 1px solid <?PHP echo sys::getColor("highlight1"); ?>;
                text-align:left;
                margin: 0 auto;
            }

            #localmenu {
                float: left;
            }

            #content {
                background-color: #fff;
                width: 78%;
                position: relative;
                margin-left: 20%;
                padding: 1%;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <?PHP
                sys::displayGlobalMenu("<ul id='globalmenu'>","</ul>","<li>","</li> | ","globalmenu");
                sys::displayLocalMenu("<ul id='localmenu'>","</ul>","<li>","</li>","localmenu")
            ?>
            <div id="content">
                <div id="breadcrump">
                    <?PHP
                        sys::displayBreadcrump(" &gt; ", "breadcrump", "bc");
                    ?>
                </div>
                <?PHP
                    sys::includeContent();
                ?>
            </div>
        </div>
    </body>
</html>