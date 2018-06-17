<?php

$id = $_GET['id'];
$row = $DB->SQLReturn(
    "SELECT title, FSK, description, runtime, year(releaseDate), releaseDate, trailerLink, coverImagePath
     FROM $movieTable
     WHERE $movieID='$id'"
);
$row = $row[0];
$backLink = '"index.php?page=' . $_GET['page'] . '"';
?>

<div class="movieContent">
    <div class="movieIMG">
        <a href="<?=substr($row['coverImagePath'], 7)?>" data-lightbox="cover" data-title="<?=$row['title']?>">
            <img src="<?=substr($row['coverImagePath'], 7)?>" alt="<?=$row['title']?>">
        </a>
    </div>
    <section class="movieDetails">
        <div class="movieTitel">
            <h1><?=$row['title']?></h1>
            <span class="releaseYear">(<?=$row['year(releaseDate)']?>)</span>
        </div>
        <div class="actions">
            <hr>
            <ul>
                <li>FSK <?=$row['FSK']?></li>
                <li>Länge: <?=$row['runtime']?> min.</li>
                <li>Release: <?=date_format(date_create($row['releaseDate']), "d.m.Y")?></li>
                <?php if(!empty($row['trailerLink'])):?>
                    <li id="playTrailer" onclick="document.getElementById('trailerFrame').style.display = 'block';">
                        <i class="fa fa-play"></i> Play Trailer
                    </li>
                <?php endif; ?>
            </ul>
            <hr>
        </div>
        <?php if(!empty($row['trailerLink'])): ?>
            <div id="trailerFrame" style="display:none">
                <div class="trailer">
                    <iframe src="<?=$row['trailerLink']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <button onclick="document.getElementById('trailerFrame').style.display = 'none';">Schließen</button>
                <hr>
            </div>
        <?php endif; ?>
        <div class="movieInfo">
            <div class="movieDescription">
                <h3>Beschreibung</h3>
                <p><?=$row['description']?></p>
            </div>
            <div class="movieCategorie">
                <h3>Kategorie</h3>
                <p><?php
                    $cats = $DB->SQLReturn(
                        "SELECT kategorie
                         FROM $cat_linkTable, $catTable
                         WHERE $cat_linkTable.fk_katID = $catTable.katID
                            AND $cat_linkTable.fk_fID = '$id'
                         ORDER BY kategorie"
                    );
                    if(!empty($cats)){
                        for($i = 0; $i < sizeof($cats); $i++){
                            echo $cats[$i]['kategorie'];
                            if($i < sizeof($cats) - 1){ echo ' | ';}
                        }
                    }?>
                </p>
            </div>
            <div class="movieDirector">
                <h3>Regisseure</h3>
                <p><?php
                    $director = $DB->SQLReturn(
                        "SELECT name
                         FROM $director_linkTable, $directorTable
                         WHERE $director_linkTable.fk_rID = $directorTable.rID
                            AND $director_linkTable.fk_fID = '$id'
                         ORDER BY name"
                    );
                    if(!empty($director)){
                        for($i = 0; $i < sizeof($director); $i++){
                            echo $director[$i]['name'];
                            if($i < sizeof($director) - 1){ echo ' | ';}
                        }
                    }?>
                </p>
            </div>
            <div class="movieActor">
                <h3>Schauspieler</h3>
                <p><?php
                    $actor = $DB->SQLReturn(
                        "SELECT name
                         FROM $actor_linkTable, $actorTable
                         WHERE $actor_linkTable.fk_sID = $actorTable.sID
                            AND $actor_linkTable.fk_fID = '$id'
                         ORDER BY name"
                    );
                    if(!empty($actor)){
                        for($i = 0; $i < sizeof($actor); $i++){
                            echo $actor[$i]['name'];
                            if($i < sizeof($actor) - 1){ echo ' | ';}
                        }
                    }?>
                </p>
            </div>
        </div>
    </section>
</div>

<div class="backButton">
    <hr>
    <button onclick='window.location.href=<?=$backLink?>' style="width:auto">Zurück</button>
</div>
