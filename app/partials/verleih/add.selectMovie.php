<?php
echo '<div id="searchArea">
        <input type="text" name="searchFilter" placeholder="Search" id="searchBar" maxlength="50"></input>
     </div>';

 $back     = "'index.php?page=" . $_GET['page'] . "&selectCustomer'";
 $continue = "'index.php?page=" . $_GET['page'] . "&select'";
 $cancel   = "'index.php?page=" . $_GET['page'];

?>
<form action="scripts/php/add/add.verleihStart.php" method="post">
    <div class="form-input">
        <?php
            // QUESTION: Check for exemplar?
            $kID = $_SESSION['kundenID'];
            $bday = $DB->SQLReturn("SELECT geburtsdatum FROM $kundenTable WHERE kID = '$kID'");
            $bday = $bday[0]['geburtsdatum'];
            $bday = date_format(date_create($bday), "d.m.Y");
            $age = floor((time() - strtotime($bday)) / 31556926);


            $allMovies = $DB->SQLReturn(
                "SELECT DISTINCT *
                 FROM $movieTable, $exemplarTable, $typTable
                 WHERE $exemplarTable.fk_fID = $movieTable.fID
                    AND $exemplarTable.fk_tID = $typTable.tID
                    AND $age > $movieTable.fsk
                 ORDER BY title ASC"
            );
            echo '<table id="sql-table">
                    <tr>
                        <th><input type="radio" disabled></th>
                        <th>Titel</th>
                        <th>Typ</th>
                        <th>Preis</th>
                    </tr>';

            if(!empty($allMovies)){
                for($i = 0; $i < sizeof($allMovies); $i++){?>
                    <tr class="search">
                        <td><input style="width:auto; cursor:pointer" type="radio" name="exemplar" value="<?=$allMovies[$i]['eID']?>" required></td>
                        <td><?=$allMovies[$i]['title']?></td>
                        <td><?=$allMovies[$i]['typ']?></td>
                        <td><?=$allMovies[$i]['preis']?> ,-€</td>
                    </tr>
                    <?php
                }
            }
            echo '</table>';
         ?>
    </div>

    <div class="formBtn">
        <a class="formCancel formBtn" onclick="window.location.href = 'index.php?page=verleih&selectCustomer'">Zurück</a>
        <button class="formSubmit formBtn" type="submit" name="selectMovie">Weiter</button>
        <a class="formCancel formBtn" onclick="window.location.href = <?=$cancel?>">Abbrechen</a>
    </div>
</form>
