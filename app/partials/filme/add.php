<?php
// Error messages
if(isset($_GET['charactersInvalid'])){
    echo '<h1 class="error-message">Es wurden ungültige Zeichen eingegeben!</h1><br><hr><br>';
}
if(isset($_GET['moviedouble'])){
    echo '<h1 class="error-message">Der eingegebene Film existiert bereits!</h1><br><hr><br>';
}
if(isset($_GET['fileerror'])){
    echo '<h1 class="error-message">Das hochgeladene Bild konnte nicht verarbeitet werden!</h1><br><hr><br>';
}
if(isset($_GET['extension'])){
    echo '<h1 class="error-message">Der Dateityp des hochgeladenen Bildes ist ungültig!</h1><br><hr><br>';
}
if(isset($_GET['end'])){
    echo '<h1 class="error-message">Es wurden nicht alle Felder ausgefüllt!</h1><br><hr><br>';
}
if(isset($_GET['success'])){
    echo '<h1 class="error-message">Der Film wurde hinzugefügt.</h1><br><hr><br>';
}
// end Error messages
?>

<div class="addForm">
    <form action="scripts/php/add/add.movies.php" method="post" enctype="multipart/form-data" data-parsley-validate>
        <div class="form-input">
            <label for="titel"><b>*Titel</b></label>
            <input type="text" name="title" placeholder="Titel" maxlength="128" required>
        </div>

        <div class="form-input">
            <label for="firstname"><b>FSK</b></label>
            <select name="fsk" required>
                <option value="-">-</option>
                <option value="0">0</option>
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
        </div>

        <div class="form-input">
            <label for="description"><b>*Beschreibung</b></label>
            <textarea name="description" rows="3" data-parsley-length="[20, 1024]" placeholder="Beschreibung" maxlength="1024" required></textarea>
        </div>

        <div class="collapsible-open">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
            <b>Kategorie (Optional)</b>
        </div>
        <div class="form-input" style="display:none">
                <?php
                $category = $DB->SQLReturn("SELECT katID, kategorie FROM $catTable ORDER BY kategorie");
                if(!empty($category)){
                    echo '<ul class="categoryList">';
                    for($i = 0; $i < sizeof($category); $i++){
                        echo '<li><lable><input type="checkbox" name="CAT[]" value="' . $category[$i]['katID'] . '"> ' . $category[$i]['kategorie'] . '</lable></li>';
                    }
                    echo '</ul>';
                }?>
            <input type="text" name="category" placeholder="Andere Kategorien (Komma Trennung)" minlength="5" maxlength="50">
        </div>

        <div class="collapsible-open">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
            <b>Schauspieler (Optional)</b>
        </div>
        <div class="form-input" style="display:none">
                <?php
                $actor = $DB->SQLReturn("SELECT sID, name FROM $actorTable ORDER BY name");
                if(!empty($actor)){
                    echo '<ul class="actorList">';
                    for($i = 0; $i < sizeof($actor); $i++){
                        echo '<li><lable><input type="checkbox" name="ACTOR[]" value="' . $actor[$i]['sID'] . '"> ' . $actor[$i]['name'] . '</lable></li>';
                    }
                    echo '</ul>';
                }?>
            <input type="text" name="actor" placeholder="Andere Schauspieler (Komma Trennung)" minlength="5" maxlength="128">
         </div>

         <div class="collapsible-open">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
            <b>Regisseur (Optional)</b>
         </div>
         <div class="form-input" style="display:none">
             <?php
                $director = $DB->SQLReturn("SELECT rID, name FROM $directorTable ORDER BY name");
                if(!empty($director)){
                    echo '<ul class="directorList">';
                    for($i = 0; $i < sizeof($director); $i++){
                        echo '<li><lable><input type="checkbox" name="DIRECTOR[]" value="' . $director[$i]['rID'] . '"> ' . $director[$i]['name'] . '</lable></li>';
                    }
                    echo '</ul>';
                }?>
            <input type="text" name="director" placeholder="Anderer Regisseur (Komma Trennung)" minlength="5" maxlength="128">
        </div>

        <div class="form-input" style="margin-top:30px">
            <label for="runtime"><b>*Länge (in min.)</b></label>
            <input type="text" name="runtime" placeholder="Länge (in min.)" data-parsley-type="digits" maxlength="3" required>
        </div>

        <div class="form-input">
            <label for="releaseDate"><b>*Release</b></label>
            <input type="date" name="releaseDate" data-parsley-min="1880-01-01" data-parsley-max="<?=date('Y-m-d')?>" required>
        </div>

        <div class="form-input">
            <label for="trailerLink"><b>YouTube Trailer (Optional)</b>
                <div class="help">
                    <a href="https://support.google.com/youtube/answer/171780?hl=de" target="_blank">
                        <i class="far fa-question-circle"></i>
                    </a>
                    <span class="tooltiptext">Help</span>
                </div>
            </label>
            <input type="text" name="trailerLink" placeholder="YouTube Trailer (embed - Link only)" data-parsley-type="url" maxlength="255">
        </div>

        <div class="form-input">
            <label for="typ"><b>*Typ</b></label>
                <?php
                $typ = $DB->SQLReturn("SELECT * FROM $typTable");
                if(!empty($typ)){
                    echo '<ul class="categoryList">';
                    for($i = 0; $i < sizeof($typ); $i++){
                        echo '<li><lable><input type="radio" name="TYPE[]" value="' . $typ[$i]['tID'] . '" required> ' . $typ[$i]['typ'] . ' (' . $typ[$i]['preis']. ',-€)</lable></li>';
                    }
                    echo '</ul>';
                }?>
        </div>
        <br>

        <div class="form-input">
            <label for="coverImage"><b>*Cover Bild (max. 10MB)</b></label>
            <input type="file" name="coverImage" accept=".jpg, .jpeg, .png" required>
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
<script src="scripts/javascript/collapsible.js"></script>

</script>
<?php
