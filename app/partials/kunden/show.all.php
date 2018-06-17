<?php
echo '<div id="searchArea">
        <input type="text" name="searchFilter" placeholder="Search" id="searchBar" maxlength="50"></input>
     </div>';

$addCustomer = "'index.php?page=" . $_GET['page'] . "&add'";
$allCustomer = $DB->SQLReturn(
    "SELECT kID, vorname, name
     FROM $kundenTable
     ORDER BY vorname ASC"
);

?>
    <form action="./scripts/php/delete/delete.customer.php" method="post">
        <div class="formBtn add">
            <a class="formSubmit formBtn" onclick="window.location.href = <?=$addCustomer?>"><?=ucfirst($_GET['page'])?> Hinzufügen</a>
            <button class="formCancel formBtn" type="submit" name="delete"><?=ucfirst($_GET['page'])?> Löschen</button>
        </div>

        <p>* = Klickbar</p>

        <table id="sql-table">
            <tr>
                <th><input type="checkbox" onClick="toggle(this)"></th>
                <th>*Vorname</th>
                <th>*Nachname</th>
                <th>*Offene Verleihvorgänge?</th>
                <th>Bearbeiten</th>
            </tr>
<?php

if(!empty($allCustomer)){
    $currentDate = date('Y-m-d');
    for($i = 0; $i < sizeof($allCustomer); $i++){

        $kID = $allCustomer[$i]['kID'];
        $link = "'index.php?page=" . $_GET['page'] . "&id=" . $kID . "'";

        $query = "SELECT rueckgabedatum, ausgabedatum
                  FROM $rückgabeTable, $verleihTable, $exemplarTable, $kundenTable, $movieTable, $typTable
                  WHERE  $rückgabeTable.fk_vID = $verleihTable.vID
                     AND $rückgabeTable.fk_eID = $exemplarTable.eID
                     AND $verleihTable.fk_kID  = $kundenTable.kID
                     AND $exemplarTable.fk_fID = $movieTable.fID
                     AND $exemplarTable.fk_tID = $typTable.tID
                     AND $kundenTable.kID = $kID";
        // Is there any verleih?
        if($DB->SQLExist($query)){
            // Verleih found
            if($DB->SQLExist($query . " AND rueckgabedatum = '0000-00-00'")){
                $pendingVerleih = 'Ja';
            }else{
                $pendingVerleih = '-';
            }
        // No verleih found
        }else{
            $pendingVerleih = '-';
        }
        $name = $allCustomer[$i]['vorname'] . ' ' . $allCustomer[$i]['name'];
        $title = 'View ' . $name;
        ?>
        <tr class="search">
            <td><input type="checkbox" name="select-all[]" value="<?=$kID?>"></td>
            <td title="<?=$title?>"  onclick="document.location.href=<?=$link?>" style="cursor:pointer"><?=$allCustomer[$i]['vorname']?></td>
            <td title="<?=$title?>"  onclick="document.location.href=<?=$link?>" style="cursor:pointer"><?=$allCustomer[$i]['name']?></td>
            <?php if($pendingVerleih == 'Ja') : ?>
                <td class="emptyDate" title="<?=$title?>"  onclick="document.location.href=<?=$link?>" style="cursor:pointer"><?=$pendingVerleih?></td>
            <?php else : ?>
                <td title="<?=$title?>"  onclick="document.location.href=<?=$link?>" style="cursor:pointer"><?=$pendingVerleih?></td>
            <?php endif; ?>

            <td><i onclick="document.location.href=<?=$editLink?>" title="Edit <?=$name?>" style="cursor:pointer" class="fa fa-edit" aria-hidden="true"></i></td>
        </tr>
        <?php
    }
}else{
    echo '</table>';
    echo '<hr><h3 id="empty-query">Nothing found.</h3><hr>';
}
echo '</table>';
echo '</form>';
// echo '</div>';
?>
<script src="scripts/javascript/tableSearch.js"></script>
<script src="scripts/javascript/checkbox.selectAll.js"></script>
