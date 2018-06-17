<?php
    $DB = new Database();
    $kundenTable   = $DB->table['kunden'];
    $ortTable      = $DB->table['ort'];
    $movieTable    = $DB->table['filme'];
    $exemplarTable = $DB->table['exemplar'];
    $typTable      = $DB->table['typ'];
    $verleihTable  = $DB->table['verleih'];
    $rückgabeTable = $DB->table['rückgabe'];

    // Add Customer
    if(isset($_GET['add'])){
        require 'app/partials/kunden/add.php';

    // Show Customer Details
    }else if(isset($_GET['id'])){
        require 'app/partials/kunden/details.php';

    // Show all Customers
    }else{
        require 'app/partials/kunden/show.all.php';
    }//end show all Customers
