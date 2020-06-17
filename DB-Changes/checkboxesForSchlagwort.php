

    <?php
        
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen
        //Ermittle PK Artikel, der bearbeitet werden soll
        $pk_artikel = $_GET['pk_Artikel'];
        //Anmelde Daten für die DB
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Druck3DDB';
    
        $db_link = new mysqli($host, $user, $password, $db);            //Verbindungsaufbau zur Datenbank


        //SQL Anfragen für die DB 
        $sqlRequestGetAllSchlagworte = "SELECT Schlagwort FROM schlagworte;";
        $sqlRequestGetSchlagworteForPk = "SELECT DISTINCT schlagworte.Schlagwort FROM artikelschlagworte, schlagworte where artikelschlagworte.FK_Artikel = '{$pk_artikel}' AND artikelschlagworte.FK_Schlagwort = schlagworte.PK_Schlagworte;";
        //Frage die DB an
        $ergAllSchlagworte = $db_link->query($sqlRequestGetAllSchlagworte) or die($db_link->error);    //Liest die Datenbank aus
        $ergPKSchlagworte = $db_link->query($sqlRequestGetSchlagworteForPk) or die($db_link->error);    //Liest die Datenbank aus

        //Erstelle ein Array, in welchem alle aktuell angehackten Schlagwörte stehen (von geklicktem Artikel)
        $currentSchlagworteArray = array();
        //Iteriere über das SelektErgebnis
        $i = 0;
        while ($currentSchlagwort = $ergPKSchlagworte->fetch_object()){
            //Erweitere das Array um das nächste Schlagwort
            $currentSchlagworteArray[] = "$currentSchlagwort->Schlagwort";
            $i = $i+1;
        }
        //Iteriere über alle möglichen Schlagworte
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
            echo "<br><input $isCheckedFlag  type='checkbox' name='asd'>{$zeile->Schlagwort}";
        }
    ?>



    <br>
    <br>
    <input type="submit" value="Submit now" />           
</form>