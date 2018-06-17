<?php
    session_start();
    $defaultLink = '../../../index.php?page=verleih';
    $headerLink = array(
        $defaultLink . '&selectCustomer',
        $defaultLink . '&selectMovie'
    );

    // Select Customer
    if(isset($_POST['selectCustomer'])){
        $_SESSION['kundenID'] =  $_POST['customer'];
        header('Location: ' . $headerLink[1]);
        exit();
    }

    // Select Movie
    if(isset($_POST['selectMovie'])){
        require '../../../app/autoload.php';
        require '../Database.php';
        $DB = new Database();
        $DB->Connect();


        $kundenID = $_SESSION['kundenID'];
        $exemplarID = $_POST['exemplar'];

        // Tables
        $kundenTable   = $DB->table['kunden'];
        $movieTable    = $DB->table['filme'];
        $exemplarTable = $DB->table['exemplar'];
        $typTable      = $DB->table['typ'];
        $verleihTable  = $DB->table['verleih'];
        $rückgabeTable = $DB->table['rückgabe'];
        // end Tables

        $currentDate = date('Y-m-d');

        // Insert into Verleih
        $DB->SQLAdd(
            "INSERT INTO $verleihTable(fk_kID, ausgabedatum)
             VALUES('$kundenID', '$currentDate')"
        );

        // Get Verleih ID
        $verleihID = $DB->SQLReturn("SELECT vID FROM $verleihTable ORDER BY vID DESC LIMIT 1");
        $verleihID = $verleihID[0]['vID'];

        // Insert into Rückgabe
        $DB->SQLAdd(
            "INSERT INTO $rückgabeTable(fk_vID, fk_eID, rueckgabedatum)
             VALUES('$verleihID', '$exemplarID', '0000-00-00')"
        );
        // IDEA: Create Bill ?
        header('Location: ' . $defaultLink);
        exit();
    }


/**
 * Create Backlink with optional Extensions (URL variables) and exit script
 * @param array $URIextensions [Optinal: Contains more URL Variables]
 */
function BackLink($URIextensions = []){
    $backLink = '../../../index.php?page=verleih&start';
    $extensions;

    foreach ($URIextensions as $key => $value) {
        if(!empty($value) && $value != ''){
            $extensions = $extensions . '&' . $value;
        }
    }
    header('Location: ' . $backLink . $extensions);
    exit();
}
