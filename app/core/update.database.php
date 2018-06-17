<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php require 'app/core/head.html'; ?>
        <title>
            <?=ucfirst(getenv('WEB_TITLE'))?> | Old Database
        </title>
    </head>
    <body>
        <div class="addForm" style="text-align:center">
            <h1>Something went wrong</h1>
            <hr><br>
                <p>Sorry, but your database version isn't the same as the website.</p>
                <br>
                <p>Please contact an admin in order to reconfigure your database.</p>
                <br>
                <p><strong>Do not import an older database!</strong> </p>

                <p></p>
                <br>

            <br><hr><br>
            <h5>&copy;2018 made by</h5>
            <h5>Eric Heinzl</h5>
        </div>
    </body>
</html>
