<?php

if(isset($_SESSION['kundenID'])){
    unset($_SESSION['kundenID']);
}

echo '<div id="searchArea">
        <input type="text" name="searchFilter" placeholder="Search" id="searchBar" maxlength="50"></input>
     </div>';

$addVerleih = "'index.php?page=" . $_GET['page'] . "&selectCustomer'";
$endVerleih = "'index.php?page=" . $_GET['page'] . "&end'";

?>
<form action="./scripts/php/add/add.verleihEnd.php" method="post">
    <div class="formBtn add">
        <a class="formSubmit formBtn" onclick="window.location.href = <?=$addVerleih?>"><?=ucfirst($_GET['page'])?> Hinzufügen</a>
        <button class="formCancel formBtn" type="submit" name="finish"><?=ucfirst($_GET['page'])?> Abschließen</button>
    </div>

    <p>* = Klickbar</p>

    <table id="sql-table">
    <tr>
        <th><input type="checkbox" onClick="toggle(this)"></th>
        <th>*Name</th>
        <th>*Film</th>
        <th>*Typ</th>
        <th>*Ausgabe</th>
        <th>*Rückgabe</th>
    </tr>
    <?php
    $currentDate = date('Y-m-d');
    $allVerleih = $DB->SQLReturn(
        "SELECT $kundenTable.name, vorname, title, $typTable.typ, preis, ausgabedatum, rueckgabedatum, frist, $rückgabeTable.ID, kID
         FROM $rückgabeTable, $verleihTable, $exemplarTable, $kundenTable, $movieTable, $typTable
         WHERE  $rückgabeTable.fk_vID = $verleihTable.vID
            AND $rückgabeTable.fk_eID = $exemplarTable.eID
            AND $verleihTable.fk_kID  = $kundenTable.kID
            AND $exemplarTable.fk_fID = $movieTable.fID
            AND $exemplarTable.fk_tID = $typTable.tID
         ORDER BY $rückgabeTable.ID DESC"
    );

    if(!empty($allVerleih)){
        for($i = 0; $i < sizeof($allVerleih); $i++){
            $maxDuration = $allVerleih[$i]['frist'];
            $deadline = date('Y-m-d', strtotime('-' . $maxDuration . ' day', strtotime($currentDate)));

            $customerLink = "'index.php?page=kunden&id=" . $allVerleih[$i]['kID'] . "'";
            ?>
            <tr class="search">
                <td><input type="checkbox" name="select-all[]" value="<?=$allVerleih[$i]['ID']?>"></td>
                <td title="View <?=$allVerleih[$i]['vorname']?> <?=$allVerleih[$i]['name']?>" onclick="window.location.href = <?=$customerLink?>" style="cursor:pointer"><?=$allVerleih[$i]['vorname']?> <?=$allVerleih[$i]['name']?></td>
                <td title="View <?=$allVerleih[$i]['vorname']?> <?=$allVerleih[$i]['name']?>" onclick="window.location.href = <?=$customerLink?>" style="cursor:pointer"><?=$allVerleih[$i]['title']?></td>
                <td title="View <?=$allVerleih[$i]['vorname']?> <?=$allVerleih[$i]['name']?>" onclick="window.location.href = <?=$customerLink?>" style="cursor:pointer"><?=$allVerleih[$i]['typ']?> (<?=$allVerleih[$i]['preis']?>,-€)</td>
                <td title="View <?=$allVerleih[$i]['vorname']?> <?=$allVerleih[$i]['name']?>" onclick="window.location.href = <?=$customerLink?>" style="cursor:pointer"><?=date_format(date_create($allVerleih[$i]['ausgabedatum']), "d.m.Y")?></td>
                <?php
                    // Some pending verleih found
                    if($allVerleih[$i]['rueckgabedatum'] == '0000-00-00'){
                        // Pending verleih within deadline
                        if($allVerleih[$i]['ausgabedatum'] >= $deadline){
                            echo '<td class="warningDate">' . $allVerleih[$i]['rueckgabedatum'] . '</td>';
                        // Pending verleig not within deadline
                        }else{
                            echo '<td class="emptyDate">' . $allVerleih[$i]['rueckgabedatum'] . '</td>';
                        }
                    // No pending Verleih
                    }else{
                        echo '<td class="setDate">' . date_format(date_create($allVerleih[$i]['rueckgabedatum']), "d.m.Y") . '</td>';
                    }
                ?>
            </tr>
            <?php
        }
    }else{
        echo '</table>';
        echo '<hr><h3 id="empty-query">Nothing found.</h3><hr>';
    }
    echo '</table>';
echo '</form>';
?>
<script src="scripts/javascript/checkbox.selectAll.js"></script>
