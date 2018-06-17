<?php
if(isset($_POST['submit'])){
// Variables
    require '../../../app/autoload.php';
    require '../Database.php';
    $DB = new Database();
    $DB->Connect();

    $movieTable         = $DB->table['filme'];
    $exemplarTable      = $DB->table['exemplar'];
    $typTable           = $DB->table['typ'];
    $catTable           = $DB->table['kategorie'];
    $cat_linkTable      = $DB->table['kat_link'];
    $directorTable      = $DB->table['regisseur'];
    $director_linkTable = $DB->table['rid_link'];
    $actorTable         = $DB->table['schauspieler'];
    $actor_linkTable    = $DB->table['sid_link'];

	$title       = mysqli_real_escape_string($DB->conn, $_POST['title']);
	$fsk         = mysqli_real_escape_string($DB->conn, $_POST['fsk']);
	$description = mysqli_real_escape_string($DB->conn, $_POST['description']);
	$runtime     = mysqli_real_escape_string($DB->conn, $_POST['runtime']);
	$releaseDate = mysqli_real_escape_string($DB->conn, $_POST['releaseDate']);
    $typeID = $_POST['TYPE'][0];

	// File attributes
	$file = $_FILES['coverImage'];
		$fileTmpName = $file['tmp_name'];
		$fileError   = $file['error'];
		$fileName    = $file['name'];
		$fileSize    = $file['size'];
		$fileType    = $file['type'];
	// Get file Extension
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	// Set allowed file extensions
	$allowedExt = array('jpg', 'jpeg', 'png');

// end Variables

	// Check for valid text input for FSK, runtime
	if(!preg_match("/^[0-9]*$/", $runtime)){
        $DB->Close();
        BackLink(['charactersInvalid']);
    // Valid input
	}else{
        // Movie exist
        if($DB->SQLExist(
            "SELECT eID
             FROM $exemplarTable, $movieTable, $typTable
             WHERE $exemplarTable.fk_fID  = $movieTable.fID
                AND $exemplarTable.fK_tID = $typTable.tID
                AND $movieTable.title='$title'"
        )){
            $movieID = $DB->SQLReturn("SELECT fID FROM $movieTable WHERE title='$title'");
            $movieID = $movieID[0]['fID'];
            // Insert Exemplar
            $DB->SQLAdd(
                "INSERT INTO $exemplarTable(fk_fID, fk_tID)
                 VALUES('$movieID', '$typeID')"
            );
            $DB->Close();
            BackLink(['success']);
        }
        //end Movie exist


        // File error handling
		// Check for correct extension
		if(in_array($fileActualExt, $allowedExt)){
			// Check for fileError
			if($fileError === 0){
				// Check imageSize (max-size = 10mb)
				if($fileSize < 10000000){
                    $fileDestination = '../../../img/upload/covers/';

					// Rename image with uniq ID
					$newImageName = uniqid('', true).".".$fileActualExt;
					$fileDestination = $fileDestination . $newImageName;

                    if(empty($_POST['trailerLink'])){
                        $trailerLink = "";
                    }else{
                        $trailerLink = $_POST['trailerLink'];
                    }

                    // Insert movie
                    $DB->SQLAdd(
                        "INSERT INTO $movieTable(title, FSK, description, runtime, releaseDate, trailerLink, coverImagePath)
                         Values ('$title', '$fsk', '$description', '$runtime', '$releaseDate', '$trailerLink', '$fileDestination')"
                    );
                    $movieID = $DB->SQLReturn("SELECT fID FROM $movieTable WHERE title='$title'");
                    $movieID = $movieID[0]['fID'];


                    // Insert other Category
                    if(!empty($_POST['category'])){
                        $otherCategories = explode(',', $_POST['category']);
                        for($i = 0; $i < sizeof($otherCategories); $i++){
                            // Check if category exist
                            if(!$DB->SQLExist("SELECT * FROM $catTable WHERE kategorie='$otherCategories[$i]'")){
                                $DB->SQLAdd(
                                    "INSERT INTO $catTable(kategorie)
                                     VALUES('$otherCategories[$i]')"
                                 );
                                 $otherCatID = $DB->SQLReturn("SELECT katID FROM $catTable WHERE kategorie='$otherCategories[$i]'");
                                 $otherCatID = $otherCatID[0]['katID'];
                                 $DB->SQLAdd(
                                     "INSERT INTO $cat_linkTable(fk_fID, fk_katID)
                                      VALUES('$movieID', '$otherCatID')"
                                 );
                            }
                        }//end for
                    }//end Insert other Category
                    // Insert Category
                    if(!empty($_POST['CAT'])){
                        $checked = join(',', $_POST['CAT']);
                        $categories = explode(',', $checked);

                        for($i = 0; $i < sizeof($categories); $i++){
                            echo $categories[$i];
                            $DB->SQLAdd(
                                "INSERT INTO $cat_linkTable(fk_fID, fk_katID)
                                 VALUES ('$movieID', '$categories[$i]')"
                            );
                        }//end for
                    }//end Insert Category


                    // Insert other Actor
                    if(!empty($_POST['actor'])){
                        $otherActors = explode(',', $_POST['actor']);
                        for($i = 0; $i < sizeof($otherActors); $i++){
                            // Check if category exist
                            if(!$DB->SQLExist("SELECT * FROM $actorTable WHERE name='$otherActors[$i]'")){
                                $DB->SQLAdd(
                                    "INSERT INTO $actorTable(name)
                                     VALUES('$otherActors[$i]')"
                                 );
                                 $otherActorID = $DB->SQLReturn("SELECT sID FROM $actorTable WHERE name='$otherActors[$i]'");
                                 $otherActorID = $otherActorID[0]['sID'];
                                 $DB->SQLAdd(
                                     "INSERT INTO $actor_linkTable(fk_fID, fk_sID)
                                      VALUES('$movieID', '$otherActorID')"
                                 );
                            }
                        }//end for
                    }//end Insert other Category
                    // Insert Actor
                    if(!empty($_POST['ACTOR'])){
                        $checked = join(',', $_POST['ACTOR']);
                        $actors = explode(',', $checked);

                        for($i = 0; $i < sizeof($actors); $i++){
                            echo $actors[$i];
                            $DB->SQLAdd(
                                "INSERT INTO $actor_linkTable(fk_fID, fk_sID)
                                 VALUES ('$movieID', '$actors[$i]')"
                            );
                        }//end for
                    }//end Insert Actor


                    // Insert other Director
                    if(!empty($_POST['director'])){
                        $otherDirectors = explode(',', $_POST['director']);
                        for($i = 0; $i < sizeof($otherDirectors); $i++){
                            // Check if category exist
                            if(!$DB->SQLExist("SELECT * FROM $directorTable WHERE name='$otherDirectors[$i]'")){
                                $DB->SQLAdd(
                                    "INSERT INTO $directorTable(name)
                                     VALUES('$otherDirectors[$i]')"
                                 );
                                 $otherDirectorID = $DB->SQLReturn("SELECT rID FROM $directorTable WHERE name='$otherDirectors[$i]'");
                                 $otherDirectorID = $otherDirectorID[0]['rID'];
                                 $DB->SQLAdd(
                                     "INSERT INTO $director_linkTable(fk_fID, fk_rID)
                                      VALUES('$movieID', '$otherDirectorID')"
                                 );
                            }
                        }//end for
                    }//end Insert other Category
                    // Insert Actor
                    if(!empty($_POST['DIRECTOR'])){
                        $checked = join(',', $_POST['DIRECTOR']);
                        $directors = explode(',', $checked);

                        for($i = 0; $i < sizeof($directors); $i++){
                            echo $directors[$i];
                            $DB->SQLAdd(
                                "INSERT INTO $director_linkTable(fk_fID, fk_rID)
                                 VALUES ('$movieID', '$directors[$i]')"
                            );
                        }//end for
                    }//end Insert Actor


                    // Insert Exemplar
                    $DB->SQLAdd(
                        "INSERT INTO $exemplarTable(fk_fID, fk_tID)
                         VALUES('$movieID', '$typeID')"
                    );


					// Move uploaded File
					move_uploaded_file($fileTmpName, $fileDestination);
                    $DB->Close();
					BackLink(['success']);
				}// imageSize to high
            // fileError occurred
            }else{
                $DB->Close();
                BackLink(['fileerror']);
            }// fileError occurred
        // Wrong extension
        }else{
            $DB->Close();
            BackLink(['extension']);
        }// Wrong extension
	}// Valid Input
}// Submit not set



/**
 * Create Backlink with optional Extensions (URL variables) and exit script
 * @param array $URIextensions [Optinal: Contains more URL Variables]
 */
function BackLink($URIextensions = []){
    $backLink = '../../../index.php?page=filme&add';
    $extensions;

    foreach ($URIextensions as $key => $value) {
        if(!empty($value) && $value != ''){
            $extensions = $extensions . '&' . $value;
        }
    }
    header('Location: ' . $backLink . $extensions);
    exit();
}
