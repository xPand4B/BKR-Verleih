<?php require 'app/init.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php require 'app/core/head.html'; ?>
        <title>
            <?php echo $Page->Titel(); ?>
        </title>
    </head>
    <body>
        <?php
            // Load Page Content
            $Page->Load();
        ?>
    </body>
</html>
