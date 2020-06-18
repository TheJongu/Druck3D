<form action="updateSchlagworte.php" method="get">

    <?php
        
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen
        //Ermittle PK Artikel, der bearbeitet werden soll
        $pk_artikel = $_GET['pk_Artikel'];

        include 'Functions/fct_sqlconnect';

        $schlagwortCheckboxenArray[] = array();

        //SQL Anfragen für die DB 
        $sqlRequestGetAllSchlagworte = "SELECT Schlagwort FROM schlagworte;";
        $sqlRequestGetSchlagworteForPk = "SELECT DISTINCT schlagworte.Schlagwort FROM artikelschlagworte, schlagworte where artikelschlagworte.FK_Artikel = '{$pk_artikel}' AND artikelschlagworte.FK_Schlagwort = schlagworte.PK_Schlagworte;";
        //Frage die DB an
        $ergAllSchlagworte = $db_link->query($sqlRequestGetAllSchlagworte) or die($db_link->error);    //Liest die Datenbank aus
        $ergPKSchlagworte = $db_link->query($sqlRequestGetSchlagworteForPk) or die($db_link->error);    //Liest die Datenbank aus

        //Erstelle ein Array, in welchem alle aktuell angehackten Schlagwörte stehen (von geklicktem Artikel)
        $currentSchlagworteArray = array();
        //Iteriere über das SelektErgebnis
        while ($currentSchlagwort = $ergPKSchlagworte->fetch_object()){
            //Erweitere das Array um das nächste Schlagwort
            $currentSchlagworteArray[] = "$currentSchlagwort->Schlagwort";
        }
        //Iteriere über alle möglichen Schlagworte
        $i=0;
        while ($zeile = $ergAllSchlagworte->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
        {
            $isCheckedFlag = "";
            //Prüfe ob das Aktuelle Schlagwort schon angehakt sein soll
            foreach ($currentSchlagworteArray as &$value) {
                if($value == $zeile->Schlagwort){
                    //Hake an
                    $isCheckedFlag = "checked";
               }
            }
            //Printe Checkbox
            echo "<br><input $isCheckedFlag  type='checkbox' name='checkboxes[]' value='$zeile->Schlagwort'>{$zeile->Schlagwort}";
            $i=$i+1;
        }
    ?>

        

    <br>
    <br>
    <input type="submit" value="Submit now" />           
</form>