<?php
    if(isset($_POST['submit-search'])){
        require '../Database.php';
        $DB = new Database();
        $DB->Connect();

        $search = mysqli_real_escape_string($DB->conn, $_POST['costumer-search']);
        $search = strtolower($search);

        header('Location: ../../../index.php?page=verleih&selectCustomer&query=' . $search);
        exit();
    }
