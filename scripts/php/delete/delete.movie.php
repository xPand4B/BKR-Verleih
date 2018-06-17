<?php
    if(isset($_POST['delete'])){
        if(!empty($_POST['select-all'])){
            require '../../../app/autoload.php';
            require '../Database.php';
            $DB = new Database();
            $DB->Connect();

            $checkbox = $_POST['select-all'];

            $exemplarTable        = $DB->table['exemplar'];
            $movieTable           = $DB->table['filme'];
            $catTable             = $DB->table['kategorie'];
            $cat_linkTable        = $DB->table['kat_link'];
            $directorTable        = $DB->table['regisseur'];
            $director_linkTable   = $DB->table['rid_link'];
            $actorTable           = $DB->table['schauspieler'];
            $actor_linkTable      = $DB->table['sid_link'];
            $rückgabeTable        = $DB->table['rückgabe'];
            $verleihTable         = $DB->table['verleih'];

        // Delete from...
            foreach($checkbox as $eID){
                $fID = $DB->SQLReturn("SELECT fk_fID FROM $exemplarTable WHERE eID = $eID");
                $fID = $fID[0]['fk_fID'];

                $exemplarCount = $DB->SQLReturn("SELECT COUNT(*) FROM $exemplarTable WHERE fk_fID = $fID");
                $exemplarCount = $exemplarCount[0]['COUNT(*)'];

                // Movie in use?
                if(!$DB->SQLExist("SELECT ID FROM $rückgabeTable WHERE fk_eID = $eID AND rueckgabedatum='0000-00-00'")){
                    // Single exemplar
                    if($exemplarCount == 1){
                        // Category tables
                        // Check if there is any category for selected movie
                        if($DB->SQLExist("SELECT ID FROM $cat_linkTable WHERE fk_fID = $fID LIMIT 1")){
                            // Get katID from category link
                            $IDs = $DB->SQLReturn("SELECT ID, fk_katID FROM $cat_linkTable WHERE fk_fID = $fID");
                            // Category Table
                            // Loop through to get each category ID
                            for($i = 0; $i < sizeof($IDs); $i++){
                                $katID      = $IDs[$i]['fk_katID'];
                                $cat_linkID = $IDs[$i]['ID'];

                                $catCount   = $DB->SQLReturn("SELECT COUNT(*) FROM $cat_linkTable WHERE fk_katID = $katID");
                                // Delete Category if only used once
                                if($catCount[0]['COUNT(*)'] == 1){
                                    $DB->SQLAdd("DELETE FROM $catTable WHERE katID = $katID");
                                }
                                $DB->SQLAdd("DELETE FROM $cat_linkTable WHERE ID = $cat_linkID");
                            }//end catID Loop
                        }//end Category Table

                        // Director tables
                        // Check if there is any director for selected movie
                        if($DB->SQLExist("SELECT ID FROM $director_linkTable WHERE fk_fID = $fID LIMIT 1")){
                            // Get rID from director link
                            $IDs = $DB->SQLReturn("SELECT ID, fk_rID FROM $director_linkTable WHERE fk_fID = $fID");
                            // Director Table
                            // Loop through to get each director ID
                            for($i = 0; $i < sizeof($IDs); $i++){
                                $rID             = $IDs[$i]['fk_rID'];
                                $director_linkID = $IDs[$i]['ID'];

                                $directorCount   = $DB->SQLReturn("SELECT COUNT(*) FROM $director_linkTable WHERE fk_rID = $rID");
                                // Delete Director if only used once
                                if($directorCount[0]['COUNT(*)'] == 1){
                                    $DB->SQLAdd("DELETE FROM $directorTable WHERE rID = $rID");
                                }
                                $DB->SQLAdd("DELETE FROM $director_linkTable WHERE ID = $director_linkID");
                            }//end rID Loop
                        }//end Director Table


                        // Actor tables
                        // Check if there is any actor for selected movie
                        if($DB->SQLExist("SELECT ID FROM $actor_linkTable WHERE fk_fID = $fID LIMIT 1")){
                            // Get sID from actor link
                            $IDs = $DB->SQLReturn("SELECT ID, fk_sID FROM $actor_linkTable WHERE fk_fID = $fID");
                            // Actor Table
                            // Loop through to get each actor ID
                            for($i = 0; $i < sizeof($IDs); $i++){
                                $sID          = $IDs[$i]['fk_sID'];
                                $actor_linkID = $IDs[$i]['ID'];

                                $actorCount   = $DB->SQLReturn("SELECT COUNT(*) FROM $actor_linkTable WHERE fk_sID = $sID");
                                // Delete Actor if only used once
                                if($actorCount[0]['COUNT(*)'] == 1){
                                    $DB->SQLAdd("DELETE FROM $actorTable WHERE sID = $sID");
                                }
                                $DB->SQLAdd("DELETE FROM $actor_linkTable WHERE ID = $actor_linkID");
                            }//end sID Loop
                        }//end Actor Table


                        // Movie Table
                        // Movie Cover Img
                        $coverImg = $DB->SQLReturn("SELECT coverImagePath FROM $movieTable WHERE fID = $fID");
                        $coverImg = $coverImg[0]['coverImagePath'];
                        $fp = fopen($coverImg, 'w') or die("Can't open file.");
                        fclose($fp);
                        unlink($coverImg) or die("Couldn't delete file.");
                        // Movie Table
                        $DB->SQLAdd("DELETE FROM $movieTable WHERE fID = $fID");
                    }


                    // Exemplar Table
                    $DB->SQLAdd("DELETE FROM $exemplarTable WHERE eID = $eID");


                    // Rückgabe Table
                    if($DB->SQLExist("SELECT ID FROM $rückgabeTable WHERE fk_eID = $eID")){
                        $vID = $DB->SQLReturn("SELECT fk_vID FROM $rückgabeTable WHERE fk_eID = $eID");
                        $vID = $vID[0]['fk_vID'];
                        $DB->SQLAdd("DELETE FROM $rückgabeTable WHERE fk_eID = $eID");
                        $DB->SQLAdd("DELETE FROM $verleihTable WHERE vID = $vID");
                    }

                }//movie in use
            }//end foreach
        }//nothing selected
    }//not set

    $backLink = '../../../index.php?page=filme';
    header('Location: ' . $backLink);
    exit();
