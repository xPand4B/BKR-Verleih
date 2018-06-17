<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php require 'app/core/head.html'; ?>
        <title>
            <?=ucfirst(getenv('WEB_TITLE'))?> | Select Database
        </title>
    </head>
    <body>
        <div class="addForm" style="text-align:center">
            <h1>Welcome to the <i>"<?=strtoupper(getenv('WEB_TITLE'))?>"</i></h1>
            <h1>Web-Application</h1>
            <hr><br>
                <p>Please select one of the following Database Types to continue.</p>
                <p>When you're done the page will refresh.</p>
                <br>
                <h4>Current Version: <?=getenv('currentVersion')?></h4>
            <br><hr><br>


            <form action="#" method="post">
                <?php
                $databaseDir = './database/';

                if(getenv('development') == 'true' && getenv('production') == 'false'){
                    $search = 'development';
                }else if(getenv('production') == 'true' && getenv('development') == 'false'){
                    $search = 'production';
                }

                $files = array_slice(scandir($databaseDir), 2);

                foreach($files as $file){
                    // echo $file . '<br>';
                    if(strpos($file, $search) !== false){
                        $start = strpos($file, '[');
                        $end = strpos($file, ']', $start + 1);
                        $lenght = $end - $start;
                        $result = substr($file, $start + 1, $lenght - 1);
                        echo '<label style="cursor:pointer"><input type="radio" name="database" value="' . $file . '"> ' . $result . '</label><br><br>';
                    }
                }//end foreach
                 ?>
                <div class="formBtn">
                    <button class="formSubmit formBtn" type="submit" name="submit">Continue</button>
                </div>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $DB = new Database();
                    $DB->CreateDatabase($databaseDir . $_POST['database']);
                    $DB->Close();
                    header("Refresh:0");
                }
            ?>


            <br><hr><br>
            <h5>&copy;2018 made by</h5>
            <h5>Eric Heinzl | Henning Holthaus</h5>
        </div>
    </body>
</html>
