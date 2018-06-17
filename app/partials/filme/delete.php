<div id="searchArea">
    <input type="text" name="searchFilter" placeholder="Search" id="searchBar" maxlength="50"></input>
</div>

<form action="scripts/php/delete/delete.movie.php" method="post">
    <div class="formBtn">
        <button class="formSubmit formBtn" type="submit" name="delete">Löschen</button>
        <a class="formCancel formBtn" onclick="window.location.href = 'index.php?page=<?=$_GET['page']?>'">Zurück</a>
    </div>
    <?php
        $allMovies = $DB->SQLReturn(
            "SELECT eID, title, typ
             FROM $movieTable, $exemplarTable, $typTable
             WHERE $movieTable.fID        = $exemplarTable.fk_fID
                AND $exemplarTable.fk_tID = $typTable.tID
             ORDER BY title ASC"
        );
     ?>
     <table id="sql-table">
         <tr>
             <th><input type="checkbox" onClick="toggle(this)"></th>
             <th>Titel</th>
             <th>Typ</th>
         </tr>
         <?php if(!empty($allMovies)) : ?>
             <?php for($i = 0; $i < sizeof($allMovies); $i++) : ?>
                 <tr class="search">
                     <td><input type="checkbox" name="select-all[]" value="<?=$allMovies[$i]['eID']?>"></td>
                     <td><?=$allMovies[$i]['title']?></td>
                     <td><?=$allMovies[$i]['typ']?></td>
                 </tr>
            <?php endfor; ?>
         <?php else : ?>
             </table>
             <hr><h3 id="empty-query">Nothing found.</h3><hr>
         <?php endif ; ?>
     </table>
</form>

<script src="scripts/javascript/tableSearch.js"></script>
<script src="scripts/javascript/checkbox.selectAll.js"></script>
