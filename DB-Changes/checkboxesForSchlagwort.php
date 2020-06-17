<form method="post" action="/Tests/Post/">      

    <?php
        
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Druck3DDB';
    
        $db_link = new mysqli($host, $user, $password, $db);            //Verbindungsaufbau zur Datenbank

        $sqlrequest = 'SELECT schlagwort FROM schlagworte';

        $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus

        while ($zeile = $erg->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
    {
        $isCheckedFlag = "checked";

        echo "<br><input $isCheckedFlag  type='checkbox' name='asd'>{$zeile->schlagwort}";
    }
    ?>



    <br>
    <br>
    <input type="submit" value="Submit now" />           
</form>