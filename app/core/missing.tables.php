<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php require 'app/core/head.html'; ?>
        <title>
            <?=ucfirst(getenv('WEB_TITLE'))?> | Missing Tables
        </title>
    </head>
    <body>
        <div class="addForm" style="text-align:center">
            <h1>Something went wrong</h1>
            <hr><br>
                <p>Sorry, but your database tables are incomplete.</p>
                <br>
                <p>Please contact an admin in order to solve this issue.</p>
                <br>
                <p><strong>Do not import an older database!</strong> </p>
                <h4>Current Version: <?=getenv('currentVersion')?></h4>
                <br>
                <p><u>Missing Tables:</u></p>
                <?php
                    require_once 'scripts/php/Database.php';
                    $DB = new Database();

                    echo '<ul style="text-align:left; margin-left:45%">';
                    foreach($DB->table as $table){
                        if(!$DB->SQLExist("SHOW TABLES LIKE '$table'")){
                            echo '<li>' . $table . '</li>';
                        }
                    }
                    echo '</ul>';
                 ?>

                <br>

            <br><hr><br>
            <h5>&copy;2018 made by</h5>
            <h5>Eric Heinzl | Henning Holthaus</h5>
        </div>
    </body>
</html>
