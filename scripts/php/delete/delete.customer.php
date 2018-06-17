<?php
    if(isset($_POST['delete'])){
        if(!empty($_POST['select-all'])){
            require '../../../app/autoload.php';
            require '../Database.php';
            $DB = new Database();
            $DB->Connect();

            $checkbox = $_POST['select-all'];

            $kundenTable   = $DB->table['kunden'];
            $ortTable      = $DB->table['ort'];
            $rückgabeTable = $DB->table['rückgabe'];
            $verleihTable  = $DB->table['verleih'];

            // Delete from...
            foreach($checkbox as $kID){
                // Customer has no pending rent
                if(!$DB->SQLExist(
                    "SELECT ID
                     FROM $verleihTable, $rückgabeTable
                     WHERE $verleihTable.vID = $rückgabeTable.fk_vID
                        AND fk_kID = $kID
                        AND rueckgabedatum = '0000-00-00'"
                )){

                    // Ort Table
                    // Get postcode id
                    $postCodeID = $DB->SQLReturn("SELECT fk_plzID FROM $kundenTable WHERE kID=$kID");
                    $postCodeID = $postCodeID[0]['fk_plzID'];
                    // Check if postcode is used more than one time
                    $postCodeCount = $DB->SQLReturn("SELECT COUNT(*) FROM $kundenTable WHERE fk_plzID = $postCodeID");
                    if($postCodeCount[0]['COUNT(*)'] == 1){
                        $DB->SQLAdd("DELETE FROM `$ortTable`   WHERE `ID` = $postCodeID");
                    }

                    // Kunden Table
                    $DB->SQLAdd("DELETE FROM `$kundenTable`   WHERE `kID` = $kID");

                    // Check if there is a verleih
                    if($DB->SQLExist("SELECT vID FROM $verleihTable WHERE fk_kID = $kID")){
                    // Get verleih ID
                    $verleihID = $DB->SQLReturn("SELECT vID FROM $verleihTable WHERE fk_kID = $kID");
                    // Loop through each verleih
                    for($i = 0; $i < sizeof($verleihID); $i++){
                        $vID = $verleihID[$i]['vID'];
                        // Verleih Table
                        $DB->SQLAdd("DELETE FROM `$verleihTable`  WHERE `fk_kID` = $kID");
                        // Rückgabe Table
                        $DB->SQLAdd("DELETE FROM `$rückgabeTable` WHERE `fk_vID` = $vID");
                    }//end for

                }// verleih not found
                }// Customer has no pending rent
            }//end foreach
        }//nothing selected
    }//not set

    $backLink = '../../../index.php?page=kunden';
    header('Location: ' . $backLink);
    exit();
