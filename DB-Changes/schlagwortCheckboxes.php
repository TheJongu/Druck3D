<form action="schlagwortCheckboxesSubmit.php" method="GET">
   <table>
      <tr>
         <h1> Schlagworte Hinzufügen</h1>
      </tr>
      <?php
         include_once 'Functions/fct_sqlconnect.php';
         error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen
         //Ermittle PK Artikel, der bearbeitet werden soll
         $pk_artikel = $_GET['pk_Artikel'];
         //Übergebe hidden input, beinhält den Artikel um den es geht
         echo "<input type='hidden' name='pk_artikel' value='{$pk_artikel}'>";
         //Alle Schlagworte
         $sqlGetSchlagworte = "SELECT Schlagwort FROM schlagworte ORDER BY schlagworte.Schlagwort ASC";
         $handleGetSchlagworte = fill_statement($sqlGetSchlagworte, array());
         $handleGetSchlagworte->execute();
         //Alle angehakten Schlagworte
         $sqlGetSchlagworteForPk = "SELECT DISTINCT schlagworte.Schlagwort FROM artikelschlagworte, schlagworte where artikelschlagworte.FK_Artikel = ? AND artikelschlagworte.FK_Schlagwort = schlagworte.PK_Schlagwort;";
         $handleGetSchlagworteForPk = fill_statement($sqlGetSchlagworteForPk, array($pk_artikel));
         $handleGetSchlagworteForPk->execute();

         //Erstelle ein Array, in welchem alle aktuell angehakten Schlagwörte stehen (von geklicktem Artikel)
         $currentSchlagworteArray = array();
         //Iteriere über das SelektErgebnis
         while ($currentSchlagwort = $handleGetSchlagworteForPk->fetch(PDO::FETCH_OBJ))
         {
             //Erweitere das Array um das nächste Schlagwort
             $currentSchlagworteArray[] = "$currentSchlagwort->Schlagwort";
         }
         //Iteriere über alle möglichen Schlagworte
         $i=0;

         while ($zeile = $handleGetSchlagworte->fetch(PDO::FETCH_OBJ))                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
         {

             $isCheckedFlag = "";
             //Prüfe ob das Aktuelle Schlagwort schon angehakt sein soll
             foreach ($currentSchlagworteArray as $value) {
                 if($value == $zeile->Schlagwort){
                     //Hake an
                     $isCheckedFlag = "checked";
                }
             }
             //Printe Checkbox, ist Input, dadurch wird an folgende PHP übergeben
             echo "<td><input $isCheckedFlag  type='checkbox' name='checkboxes[]' value='$zeile->Schlagwort'>{$zeile->Schlagwort}</td>";
             $i=$i+1;
             //Hole das zweite Element für die Tabelle
             $zeile = $handleGetSchlagworte->fetch(PDO::FETCH_OBJ);
             //Wenn nicht Null, gebe Tabelle weiter aus
             if($zeile->Schlagwort != null){

               $isCheckedFlag = "";
               //Prüfe ob das Aktuelle Schlagwort schon angehakt sein soll
                   if($value == $zeile->Schlagwort){
                     foreach ($currentSchlagworteArray as $value) {
                       //Hake an
                       $isCheckedFlag = "checked";
                     }
                   }
               //Printe Checkbox, ist Input, dadurch wird an folgende PHP übergeben
               echo "<td><input $isCheckedFlag  type='checkbox' name='checkboxes[]' value='$zeile->Schlagwort'>{$zeile->Schlagwort}</td>";
               $i=$i+1;
            }
            echo "</tr>";
           }
         ?>
      <?php //Wenn Submitbutten gedrückt, öffne schlagwortCheckboxesSubmit.php ?>
   </table>
   <input type="submit" value="Submit now" />
</form>
<form action="./displayAllArtikel.php" method="GET">
   <input type="submit" value="Abbrechen">
</form>
