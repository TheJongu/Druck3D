    <?php 
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen
        include_once 'Functions/fct_sqlconnect.php';
        //Alle Schlagworte holen
        $sql = "SELECT Schlagwort, PK_Schlagwort FROM schlagworte;";
        $handle = fill_statement($sql, array($name));
        $handle->execute();

        //Iteriere über alle möglichen Schlagworte
        while ($zeile = $handle->fetch())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
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
        
        
        
        
        

         
