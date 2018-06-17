<?php
$ID = $_GET['id'];
// Onlick
//     Alle Verleihvorgänge für ausgewählten Nutzer
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
    <h1 id="customerName"><?=$customer['vorname']?> <?=$customer['name']?> (<?=$age?>)</h1>
    <ul>
        <li><?=$bday?></li>
        <li><?=$customer['plz']?>, <?=$customer['stadt']?></li>
        <li><?=$customer['strasse']?></li>
        <li><?=$customer['email']?></li>
    </ul>
</div>

<div id="searchArea">
    <input type="text" name="searchFilter" placeholder="Search" id="searchBar"></input>
</div>

<table id="sql-table">
    <tr>
        <th>Film</th>
        <th>Typ</th>
        <th>Ausgabe</th>
        <th>Rückgabe</th>
    </tr>
<?php
$DB->SQLTable(
        "SELECT $movieTable.title, $typTable.typ, $verleihTable.ausgabedatum, $rückgabeTable.rueckgabedatum
         FROM $rückgabeTable, $verleihTable, $exemplarTable, $kundenTable, $movieTable, $typTable
         WHERE  $rückgabeTable.fk_vID = $verleihTable.vID
            AND $rückgabeTable.fk_eID = $exemplarTable.eID
            AND $verleihTable.fk_kID  = $kundenTable.kID
            AND $exemplarTable.fk_fID = $movieTable.fID
            AND $exemplarTable.fk_tID = $typTable.tID
            AND $kundenTable.kID      = '$ID'
         ORDER BY $verleihTable.vID"
 );

 $backLink = '"index.php?page=' . $_GET['page'] . '"';
 ?><div class="backButton">
     <hr>
     <button onclick='window.location.href = <?php echo $backLink; ?>' style="width:auto">Zurück</button>
 </div>
