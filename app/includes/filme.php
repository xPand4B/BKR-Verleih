<?php
    $DB = new Database();
    $exemplarTable        = $DB->table['exemplar'];
    $movieTable           = $DB->table['filme'];
    $catTable             = $DB->table['kategorie'];
    $cat_linkTable        = $DB->table['kat_link'];
    $directorTable        = $DB->table['regisseur'];
    $director_linkTable   = $DB->table['rid_link'];
    $actorTable           = $DB->table['schauspieler'];
    $actor_linkTable      = $DB->table['sid_link'];
    $typTable             = $DB->table['typ'];

    $movieID = 'fID';


    // Add Movie
    if(isset($_GET['add'])){
        require 'app/partials/filme/add.php';

    // Show Movie Details
    }else if(isset($_GET['id'])){
        require 'app/partials/filme/details.php';

    // Delete Movie
    }else if(isset($_GET['delete'])){
        require 'app/partials/filme/delete.php';

    // Show all movies
    }else{
        require 'app/partials/filme/show.all.php';
    }
?>

<!-- Real Time Movie Search -->
<script src="scripts/javascript/movieSearch.js"></script>
<script src="scripts/javascript/lightbox.min.js"></script>
