<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php require 'app/core/head.html'; ?>
        <title>
            <?=ucfirst(getenv('WEB_TITLE'))?> | First Start
        </title>
    </head>
    <body>
        <div class="addForm" style="text-align:center">
            <h1>Welcome to the "<i><?=strtoupper(getenv('WEB_TITLE'))?></i>"</h1>
            <h1>Web-Application</h1>
            <hr><br>
                <p>In order to continue you have to create an admin account.</p>
                <p>When you're done the page will refresh.</p>
                <br>
                <h4>Thank you for choosing our Website!</h4>
            <br><hr><br>

            <?php
                if(isset($_GET['charactersInvalid'])){
                    echo '<h3 class="error-message">Invalid Characters!</h3><br><hr><br>';
                }
                if(isset($_GET['emailinvalid'])){
                    echo '<h3 class="error-message">Invalid E-Mail!</h3><br><hr><br>';
                }
                if(isset($_GET['end'])){
                    echo '<h3 class="error-message">Please fill out every field!</h3><br><hr><br>';
                }?>

            <form action="./scripts/php/add/add.mitarbeiter.php" method="post" data-parsley-validate>
                <div class="form-input">
                    <input type="text" name="firstname" maxlength="50" placeholder="Firstname" required>
                </div>
                <div class="form-input">
                    <input type="text" name="surname" maxlength="50" placeholder="Surname" required>
                </div>
                <div class="form-input">
                    <input type="email" name="email" maxlength="128" placeholder="E-Mail" required>
                </div>
                <div class="form-input">
                    <input type="password" name="password" maxlength="128" placeholder="Passwort" minlength="8" required>
                </div>
                <div class="formBtn">
                    <button class="formSubmit formBtn" type="submit" name="submit">Start</button>
                </div>
            </form>
            <script src="scripts/javascript/parsley.min.js"></script>

            <br><hr><br>
            <h5>&copy;2018 made by</h5>
            <h5>Eric Heinzl | Henning Holthaus</h5>
        </div>
    </body>
</html>
