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
if(isset($_GET['bday'])){
    echo '<h1 class="error-message">Die Person ist noch keine 12 Jahre alt!</h1><br><hr><br>';
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
    <form class="" action="scripts/php/add/add.kunden.php" method="post" data-parsley-validate>
        <div class="form-input">
            <label><b>*Vorname</b></label>
            <input type="text" name="firstname" placeholder="Vorname" maxlength="50" required>
        </div>
        <div class="form-input">
            <label><b>*Nachname</b></label>
            <input type="text" name="surname" placeholder="Nachname" maxlength="50" required>
        </div>
        <div class="form-input">
            <label><b>*Geburtsdatum (mind. 12 Jahre)</b></label>
            <?php $minAge = date('Y') - 80 . '-01-01'; ?>
            <?php $maxAge = date('Y') - 12 . date('-m-d'); ?>
            <input type="date" name="bday" data-parsley-min="<?=$minAge?>" data-parsley-max="<?=$maxAge?>" required>
        </div>
        <div class="form-input">
            <label><b>*Strasse</b></label>
            <input type="text" name="street"placeholder="Straße" maxlength="50" required>
        </div>
        <div class="form-input">
            <label><b>*PLZ</b></label>
            <input type="text" name="plz" minlength="5" maxlength="5" placeholder="PLZ" data-parsley-type="digits" required>
        </div>
        <div class="form-input">
            <label><b>*Stadt</b></label>
            <input type="text" name="city" maxlength="50" placeholder="Stadt" required>
        </div>
        <div class="form-input">
            <label><b>*E-Mail</b></label>
            <input type="email" name="email" maxlength="128" placeholder="E-Mail" required>
        </div>
        <div class="form-input">
            <label><b>*Passwort</b></label>
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
