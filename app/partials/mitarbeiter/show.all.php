<?php

echo '<div id="searchArea">
        <input type="text" name="searchFilter" placeholder="Search" id="searchBar" maxlength="50"></input>
     </div>';

$addEmployee = "'index.php?page=" . $_GET['page'] . "&add'";
echo '<div class="formBtn add">
        <button class="formSubmit formBtn" onclick="window.location.href = ' . $addEmployee . '">' . ucfirst($_GET['page']) . ' Hinzufügen</button>
      </div>';

echo '<table id="sql-table">
        <tr>
            <th>Name</th>
            <th>Vorname</th>
            <th>E-Mail</th>
        </tr>';
$DB->SQLTable(
        "SELECT surname, firstname, email
         FROM $mitarbeiterTable
         ORDER BY surname DESC"
 );
