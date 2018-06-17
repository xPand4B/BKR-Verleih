<?php
    $DB = new Database();
    $customerTable = $DB->table['kunden'];
    $adminTable    = $DB->table['mitarbeiter'];
    $movieTable    = $DB->table['filme'];

    // User-login
    if(isset($_SESSION['kID'])){
        require 'app/partials/home/login.customer.php';

    // Admin-login
    }else if(isset($_SESSION['aID'])){
        require 'app/partials/home/login.admin.php';
    }

    // Visiter
    echo '<br><h1 style="text-align:center; text-decoration:underline">Neusten Filme</h1> <br>';

    // Show latest 10 Movies
    $latestMovies = $DB->SQLReturn(
        "SELECT fID, title, releaseDate, coverImagePath, fsk
         FROM $movieTable
         ORDER BY releaseDate DESC
         LIMIT 5"
    );

    if(!empty($latestMovies)){
        echo '<table class="latest-movies">';
        for($i = 0; $i < sizeof($latestMovies); $i++){
            // Create Link for Movie Detailed page
            $link = "'index.php?page=filme&id=" . $latestMovies[$i]['fID'] . "'";?>
                <tr onclick="document.location.href=<?=$link?>" title="View '<?=$latestMovies[$i]['title']?>'">
                    <td><img src="<?=substr($latestMovies[$i]['coverImagePath'], 7)?>" alt="<?=$latestMovies[$i]['title']?>"></td>
                    <td><?=$latestMovies[$i]['title']?></td>
                    <td><?=date_format(date_create($latestMovies[$i]['releaseDate']), "d.m.Y")?></td>
                </tr>
                <?php
        }
        echo '</table>';
    }
