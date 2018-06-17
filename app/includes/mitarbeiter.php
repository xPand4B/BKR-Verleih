<?php
    $DB = new Database();
    $mitarbeiterTable = $DB->table['mitarbeiter'];

    // Add Employee
    if(isset($_GET['add'])){
        require 'app/partials/mitarbeiter/add.php';
    // Table View
    }else{
        require 'app/partials/mitarbeiter/show.all.php';
     }
 ?>
<script src="scripts/javascript/tableSearch.js"></script>
