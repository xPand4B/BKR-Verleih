<?php
    if(isset($_POST['finish'])){
        if(!empty($_POST['select-all'])){
            require '../../../app/autoload.php';
            require '../Database.php';
            $DB = new Database();
            $DB->Connect();

            $rückgabeTable = $DB->table['rückgabe'];
            $currentDate = date('Y-m-d');
            $verleihID = $_POST['select-all'];


            for($i = 0; $i < sizeof($verleihID); $i++){
                // Check if rueclgabe = 0000-00-00
                if($DB->SQLExist("SELECT * FROM $rückgabeTable WHERE ID = $verleihID[$i] AND rueckgabedatum = '0000-00-00'")){
                    // update rueckgabedatum
                    $DB->SQLAdd(
                        "UPDATE $rückgabeTable
                         SET rueckgabedatum = '$currentDate'
                         WHERE ID = $verleihID[$i]"
                    );
                }
            }//end for
            $DB->Close();
        }//checkbox empty
    }//not set

    $backLink = '../../../index.php?page=verleih';
    header('Location: ' . $backLink);
    exit();
