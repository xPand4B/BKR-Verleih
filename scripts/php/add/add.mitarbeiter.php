<?php
// Submit set
if(isset($_POST['submit'])){
    require '../../../app/autoload.php';
    require '../Database.php';
    $DB = new Database();
    $DB->Connect();

    $employeeTable = $DB->table['mitarbeiter'];

    $firstname = mysqli_real_escape_string($DB->conn, $_POST['firstname']);
    $surname   = mysqli_real_escape_string($DB->conn, $_POST['surname']);
    $email     = mysqli_real_escape_string($DB->conn, $_POST['email']);
    $password  = mysqli_real_escape_string($DB->conn, $_POST['password']);

    // Is not empty
    if(!(empty($firstname) && empty($surname) && empty($email) && empty($email))){
        // Invalid Character
        if(!preg_match("/^[A-Za-zß]*$/", $firstname) || !preg_match("/^[A-Za-zß]*$/", $surname)){
            $DB->Close();
            BackLink(['charactersInvalid']);
        //Valid Characters
        }else{
            //Valid Email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($DB->SQLExist("SELECT * FROM $employeeTable WHERE email='$email'")){
                    $DB->Close();
                    BackLink(['emaildouble']);
                }

                // Hash Password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


                // First Run ?
                $firstRun = 0;
                if($DB->SQLExist("SELECT 1 FROM $employeeTable LIMIT 1")){
                    $firstRun = 1;
                }

                // Insert All
                $DB->SQLAdd(
                    "INSERT INTO $employeeTable(firstname, surname, email, password)
                     VALUES('$firstname', '$surname', '$email', '$hashedPassword')"
                );

                // Exit
                // $DB->Close();
                if($firstRun == 0){
                    header('Location: ../../../index.php?page=home');
                    exit();
                }else{
                    BackLink(['success']);
                }

            //invalid email
            }else{
                $DB->Close();
                BackLink(['emailinvalid']);
            }
        }//Valid Characters
    }//is empty
}//Submit not set



/**
 * Create Backlink with optional Extensions (URL variables) and exit script
 * @param array $URIextensions [Optinal: Contains more URL Variables]
 */
function BackLink($URIextensions = []){
    $backLink = "../../../index.php?page=mitarbeiter&add";
    $extensions;

    foreach ($URIextensions as $key => $value) {
        if(!empty($value) && $value != ''){
            $extensions = $extensions . '&' . $value;
        }
    }
    header('Location: ' . $backLink . $extensions);
    exit();
}
