<?php
// Submit set
if(isset($_POST['submit'])){
    require '../../../app/autoload.php';
    require '../Database.php';
    $DB = new Database();
    $DB->Connect();

    $customerTable = $DB->table['kunden'];
    $ortTable      = $DB->table['ort'];
    $adminTable    = $DB->table['mitarbeiter'];

    $firstname = mysqli_real_escape_string($DB->conn, $_POST['firstname']);
    $surname   = mysqli_real_escape_string($DB->conn, $_POST['surname']);
    $bday      = mysqli_real_escape_string($DB->conn, $_POST['bday']);
    $street    = mysqli_real_escape_string($DB->conn, $_POST['street']);
    $plz       = mysqli_real_escape_string($DB->conn, $_POST['plz']);
    $city      = mysqli_real_escape_string($DB->conn, $_POST['city']);
    $email     = mysqli_real_escape_string($DB->conn, $_POST['email']);
    $password  = mysqli_real_escape_string($DB->conn, $_POST['password']);

    // Is not empty
    if(!(empty($firstname) && empty($surname) && empty($bday) && empty($street) && empty($plz) && empty($city) && empty($email) && empty($password))){
        // Invalid Characters for Firstname,Surname, Street, PLZ, City
        if(!preg_match("/^[A-Za-zß.]*$/", $firstname) || !preg_match("/^[A-Za-zß.]*$/", $surname) || !preg_match("/^[A-Za-zß0-9 ]*$/", $street) || !preg_match("/^[0-9]*$/", $plz) || !preg_match("/^[A-Za-zäöüß-]*$/", $city)){
            $DB->Close();
            BackLink(['charactersInvalid']);
        //Characters valid
        }else{
            // Valid bday (min. age 12)
            if(time() > strtotime('+12 years', strtotime($bday))){
                // Valid Email
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // Email does exist
                    if($DB->SQLExist("SELECT * FROM $customerTable, $adminTable WHERE $customerTable.email='$email' OR mitarbeiter.email='$email'")){
                        $DB->Close();
                        BackLink(['emaildouble']);
                    }

                    // Post code does not exist
                    if(!$DB->SQLExist("SELECT * FROM $ortTable WHERE plz='$plz' AND stadt='$city'")){
                        $DB->SQLAdd(
                            "INSERT INTO $ortTable(plz, stadt)
                             VALUES('$plz', '$city')"
                        );
                    }//Post code does not exist

                    $postCodeID = $DB->SQLReturn(
                        "SELECT ID FROM $ortTable WHERE plz='$plz' AND stadt='$city'"
                    );
                    $postCodeID = $postCodeID[0]['ID'];

                    // Hash Password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insert All
                    $DB->SQLAdd(
                        "INSERT INTO $customerTable(name, vorname, geburtsdatum, fk_plzID, strasse, email, password)
                         VALUES('$surname', '$firstname', '$bday', '$postCodeID', '$street', '$email', '$hashedPassword')"
                    );

                    // Exit
                    $DB->Close();
                    BackLink(['success']);

                //Invalid Email
                }else{
                    $DB->Close();
                    BackLink(['emailinvalid']);
                }//Invalid Email
            //bday invalid (min. age 12)
            }else{
                $DB->Close();
                BackLink(['bday']);
            }//bday invalid
        }//Characters valid
    }//is empty
}//submit not set


/**
 * Create Backlink with optional Extensions (URL variables) and exit script
 * @param array $URIextensions [Optinal: Contains more URL Variables]
 */
function BackLink($URIextensions = []){
    $backLink = "../../../index.php?page=kunden&add";
    $extensions;

    foreach ($URIextensions as $key => $value) {
        if(!empty($value) && $value != ''){
            $extensions = $extensions . '&' . $value;
        }
    }
    header('Location: ' . $backLink . $extensions);
    exit();
}
