<!-- Costumer Search -->
<form action="scripts/php/search/search.costumer.php" method="post">
    <div class="form-input">
        <input  style="width:49%" type="text" name="costumer-search" placeholder="<?=$urlParam?>" maxlength="100">
        <button style="display:inline-block" class="formSubmit formBtn" type="submit" name="submit-search">Kunden Suchen</button>
    </div>
</form>

<!-- Costumer Selection -->
<form action="scripts/php/add/add.verleihStart.php" method="post">
   <div class="form-input">
      <?php
           $allCustomer = $DB->SQLReturn(
              "SELECT DISTINCT *
               FROM $kundenTable, $ortTable
               WHERE $kundenTable.fk_plzID = $ortTable.ID
                   AND(
                          name         LIKE '%$urlParam%'
                       OR vorname      LIKE '%$urlParam%'
                       OR plz          LIKE '%$urlParam%'
                       OR stadt        LIKE '%$urlParam%'
                       OR strasse      LIKE '%$urlParam%'
                       OR email        LIKE '%$urlParam%'
                       OR geburtsdatum LIKE '%$urlParam%'
                   )
               ORDER BY vorname ASC"
           );

           echo '<table id="sql-table">
                   <tr>
                       <th><input type="radio" disabled></th>
                       <th>Name</th>
                       <th>Wohnort</th>
                   </tr>';

           if(!empty($allCustomer)){
               for($i = 0; $i < sizeof($allCustomer); $i++){
                   $bday = date_format(date_create($allCustomer[$i]['geburtsdatum']), "d.m.Y");
                   $age = floor((time() - strtotime($allCustomer[$i]['geburtsdatum'])) / 31556926);

                   $titleInfo = $allCustomer[$i]['vorname'] . ' ' . $allCustomer[$i]['name'] . ' (' . $age . ')&#013;' .
                                $allCustomer[$i]['plz'] . ', ' . $allCustomer[$i]['stadt'] . '&#013;' .
                                $allCustomer[$i]['strasse'] . '&#013;' .
                                $allCustomer[$i]['email'];
                   ?>
                   <tr title="<?=$titleInfo?>" style="cursor:pointer">
                       <td><input style="width:auto; cursor:pointer" type="radio" name="customer" value="<?=$allCustomer[$i]['kID']?>" required></td>
                       <td><?=$allCustomer[$i]['vorname']?> <?=$allCustomer[$i]['name']?> (<?=$age?>)</td>
                       <td><?=$allCustomer[$i]['plz']?>, <?=$allCustomer[$i]['stadt']?></td>
                   </tr>
               <?php
               }
               echo '</table>';
           }else{
               echo '</table>';
               echo '<hr><h3 id="empty-query">Nothing found.</h3><hr>';
           }?>
       </div>

       <div class="formBtn">
           <button class="formSubmit formBtn" type="submit" name="selectCustomer">Weiter</button>
           <a class="formCancel formBtn" onclick="window.location.href = 'index.php?page=<?=$_GET['page']?>'">Abbrechen</a>
       </div>
   </form>
<script src="scripts/javascript/collapsible.js"></script>
