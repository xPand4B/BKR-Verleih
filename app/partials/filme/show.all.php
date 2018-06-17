<!-- Show all Movies + Search -->
<div class="tableContent">
    <div id="searchArea">
        <input type="text" name="searchFilter" placeholder="Search" id="searchBar" maxlength="50"></input>
    </div>

    <?php
        if(isset($_SESSION['isAdmin'])){
            $addMovie = "'index.php?page=" . $_GET['page'] . "&add'";?>

            <div class="formBtn add">
                <button class="formSubmit formBtn" onclick="window.location.href=<?=$addMovie?>"><?=ucfirst($_GET['page'])?> Hinzufügen</button>
                <a class="formCancel formBtn" onclick="window.location.href = 'index.php?page=<?=$_GET['page']?>&delete'"><?=ucfirst($_GET['page'])?> Löschen</a>
            </div><?php
        }

        echo '<section id="sql-table">';

            $movies = $DB->SQLReturn(
                "SELECT $movieID, title, fsk, year(releaseDate), coverImagePath
                 FROM $movieTable
                 ORDER BY title"
            );
            if(!empty($movies)){
                echo '<div class="itemPoster">';
                for($i = 0; $i < sizeof($movies); $i++){
                    $link = "'index.php?page=" . $_GET['page'] . "&id=" . $movies[$i][$movieID] . "'";?>

                    <div class="itemView" title="View <?=$movies[$i]['title']?>">
                        <div class="itemIMG" onclick="document.location.href = <?=$link?>"><img src="<?=substr($movies[$i]['coverImagePath'], 7)?>"></div>
                        <div class="itemTitel" onclick="document.location.href = <?=$link?>"><?=$movies[$i]['title']?></div>
                        <div class="itemYear">(<?=$movies[$i]['year(releaseDate)']?>)</div>
                  </div><?php
                }
                echo '</div>';
            }else{
                echo '<hr><h3 id="empty-query">Nothing found.</h3><hr>';
            }
        ?>
    </section>
</div>
