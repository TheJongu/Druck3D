    <?php 
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen
        include_once 'Functions/fct_sqlconnect.php';

        //SQL Anfragen für die DB: Kriege alle Schlagworte
        $sqlRequestGetAllSchlagworte = "SELECT Schlagwort, PK_Schlagwort FROM schlagworte;";
        //Frage die DB an
        $ergAllSchlagworte = $db_link->query($sqlRequestGetAllSchlagworte) or die($db_link->error);    //Liest die Datenbank aus    
        //Iteriere über alle möglichen Schlagworte
        while ($zeile = $ergAllSchlagworte->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
        {
            ?><form action="editSchlagworteDelete.php" method="get"><?php
            //Printe Button und Name des Schlagwortes, welches der Button löscht
            echo "<input type='hidden' name='pk_schlagwort' value='{$zeile->PK_Schlagwort}'>"; 
            echo "<br><input type='submit' value='Löschen'/>    ";
            echo "$zeile->Schlagwort";
            ?></form><?php
        }
        ?>
    
    <form action="newSchlagwortSubmit.php" method="get">
        <?php
        echo "<label for='newschlagwort'></label><input name='newschlagwort' id='newschlagwort' type='text' placeholder='Neues Schlagwort' value='' title='Artikelbeschreibung'>";
        echo "<input type='hidden' name='pk_Artikel' value='{$PK_Artikel}'>";
        ?>
        <input type="submit" value="Füge Schlagwort hinzu" />

    </form>
        
        
        
        
        

         
