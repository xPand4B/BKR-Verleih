    <?php
    $DB = new Database();
    $DB->Connect();

    if(isset($_GET['query'])){
        $urlParam = $_GET['query'];
    }else{
        $urlParam = '';
    }

    $kundenTable   = $DB->table['kunden'];
    $ortTable      = $DB->table['ort'];
    $movieTable    = $DB->table['filme'];
    $exemplarTable = $DB->table['exemplar'];
    $typTable      = $DB->table['typ'];
    $verleihTable  = $DB->table['verleih'];
    $rückgabeTable = $DB->table['rückgabe'];

// Add Verleih
    // Select Costumer
    if(isset($_GET['selectCustomer'])){
        require 'app/partials/verleih/add.selectCustomer.php';

    // Select Movie
    }else if(isset($_GET['selectMovie']) && isset($_SESSION['kundenID']) && $_SESSION['kundenID'] != ''){
        require 'app/partials/verleih/add.selectMovie.php';

    // Show all
    }else{
        require 'app/partials/verleih/show.all.php';
    }//end show all
?>

<script src="scripts/javascript/tableSearch.js"></script>
