<?php
// Error messages
if(isset($_GET['charactersInvalid'])){
    echo '<h1 class="error-message">Es wurden ungültige Zeichen eingegeben!</h1><br><hr><br>';
}
if(isset($_GET['emaildouble'])){
    echo '<h1 class="error-message">Die eingegebene E-Mail existiert bereits!</h1><br><hr><br>';
}
if(isset($_GET['emailinvalid'])){
    echo '<h1 class="error-message">Es wurde eine ungültige E-Mail eingegeben!</h1><br><hr><br>';
}
if(isset($_GET['end'])){
    echo '<h1 class="error-message">Es wurden nicht alle Felder ausgefüllt!</h1><br><hr><br>';
}
if(isset($_GET['success'])){
    echo '<h1 class="error-message">Die Person wurde hinzugefügt.</h1><br><hr><br>';
}
// end Error messages
?>
<div class="addForm">
    <form action="./scripts/php/add/add.mitarbeiter.php" method="post" data-parsley-validate>
        <div class="form-input">
            <label for="firstname"><b>*Vorname</b></label>
            <input type="text" name="firstname" maxlength="50" placeholder="Vorname" required >
        </div>
        <div class="form-input">
            <label for="surname"><b>*Nachname</b></label>
            <input type="text" name="surname" maxlength="50" placeholder="Nachname" required>
        </div>
        <div class="form-input">
            <label for="email"><b>*E-Mail</b></label>
            <input type="email" name="email" maxlength="128" placeholder="E-Mail" required>
        </div>
        <div class="form-input">
            <label for="password"><b>*Passwort</b></label>
            <input type="password" name="password" maxlength="128" placeholder="Passwort" minlength="8" required>
        </div>

        <br><br>
        <h5>* = Pflichtfeld</h5>

        <div class="formBtn">
            <button class="formSubmit formBtn" type="submit" name="submit">Hinzufügen</button>
            <a class="formCancel formBtn" onclick="window.location.href = 'index.php?page=<?php echo $_GET['page']; ?>'">Abbrechen</a>
        </div>
    </form>
</div>
<script src="scripts/javascript/parsley.min.js"></script>
