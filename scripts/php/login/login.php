<?php
if(isset($_POST['submit'])){
    require '../../../app/autoload.php';
    require '../Database.php';
    $DB = new Database();
    $DB->Connect();

    $adminTable    = $DB->table['mitarbeiter'];
    $customerTable = $DB->table['kunden'];

    $email = mysqli_real_escape_string($DB->conn, $_POST['email']);
    $password = mysqli_real_escape_string($DB->conn, $_POST['password']);

    // Check for Admin
    $sql = "SELECT * FROM $adminTable WHERE email='$email'";
    $result = mysqli_query($DB->conn, $sql);

    // No Admin found
    if(mysqli_num_rows($result) < 1){
        // Check for Customer
        $sql2 = "SELECT * FROM $customerTable WHERE email='$email'";
        $result2 = mysqli_query($DB->conn, $sql2);

        // Nothing found
        if(mysqli_num_rows($result2) < 1){
            $DB->Close();
            BackLink();
        // Costumer found
        }else{
            $row = mysqli_fetch_assoc($result2);
            // Dehasing password
            $PWCheck = password_verify($password, $row['password']);
            // Password  equals
            if($PWCheck){
                session_start();
                $_SESSION = array(
                    'kID'        => $row['kID'],
                    'vorname'    => $row['vorname'],
                    'nachname'   => $row['nachname'],
                    'name'       => $row['vorname'] . ' ' . $row['name'],
                    'geb'        => $row['geburtsdatum'],
                    'isCustomer' => 1
                );
                $DB->Close();
                BackLink();
            // Password does not equals
            }else{
                $DB->Close();
                BackLink();
            }// Password does not equals
        }// Costumer found

    // Admin found
    }else{
        $row = mysqli_fetch_assoc($result);
        // Dehasing password
        $PWCheck = password_verify($password, $row['password']);
        // Passw/ord  equals
        if($PWCheck){
            session_start();
            $_SESSION = array(
                'aID'       => $row['aID'],
                'firstname' => $row['firstname'],
                'surname'   => $row['surname'],
                'name'      => $row['firstname'] . ' ' . $row['surname'],
                'email'     => $row['email'],
                'isAdmin' => 1
            );
            $DB->Close();
            BackLink();

        // Password does not equals
        }else{
            $DB->Close();
            BackLink();
        }// Password does not equals
    }// Admin found
}//is not set


/**
 * Create Backlink with optional Extensions (URL variables) and exit script
 * @param array $URIextensions [Optinal: Contains more URL Variables]
 */
function BackLink($URIextensions = []){
    $backLink = "../../../index.php?page=home";
    $extensions;

    foreach ($URIextensions as $key => $value) {
        if(!empty($value) && $value != ''){
            $extensions = $extensions . '&' . $value;
        }
    }
    header('Location: ' . $backLink . $extensions);
    exit();
}
