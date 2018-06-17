<?php
    $DB = new Database();
    $kundenTable = $DB->table['kunden'];
    $ortTable = $DB->table['ort'];

    $movieTable    = $DB->table['filme'];
    $exemplarTable = $DB->table['exemplar'];
    $typTable      = $DB->table['typ'];
    $verleihTable  = $DB->table['verleih'];
    $rückgabeTable = $DB->table['rückgabe'];

    $ID = $_SESSION['kID'];

    // Details
    $customer = $DB->SQLReturn(
        "SELECT name, vorname, geburtsdatum, plz, stadt, strasse, email
         FROM $kundenTable, $ortTable
         WHERE $kundenTable.fk_plzID = $ortTable.ID
            AND $kundenTable.kID='$ID'"
    );
    $customer = $customer[0];
    $bday = date_format(date_create($customer['geburtsdatum']), "d.m.Y");
    $age = floor((time() - strtotime($customer['geburtsdatum'])) / 31556926);

    ?>
    <div class="customerInfo">
        <h1 id="customerName"><?=$customer['vorname']?> <?=$customer['name']?> (<?=$age?>)</i></h1>
        <ul>
            <li><?=$bday?></li>
            <li><?=$customer['plz']?>, <?=$customer['stadt']?></li>
            <li><?=$customer['strasse']?></li>
            <li><?=$customer['email']?></li>
        </ul>
    </div>
    <?php

    // Verleih per customer
    echo '<table id="sql-table">
            <tr>
                <th>Film</th>
                <th>Typ</th>
                <th>Ausgabe</th>
                <th>Rückgabe</th>
            </tr>';
    $DB->SQLTable(
            "SELECT $movieTable.title, $typTable.typ, $verleihTable.ausgabedatum, $rückgabeTable.rueckgabedatum
             FROM $rückgabeTable, $verleihTable, $exemplarTable, $kundenTable, $movieTable, $typTable
             WHERE  $rückgabeTable.fk_vID = $verleihTable.vID
                AND $rückgabeTable.fk_eID = $exemplarTable.eID
                AND $verleihTable.fk_kID  = $kundenTable.kID
                AND $exemplarTable.fk_fID = $movieTable.fID
                AND $exemplarTable.fk_tID = $typTable.tID
                AND $kundenTable.kID      = '$ID'"
         );
 ?>
