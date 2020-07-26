<html>
   <head>
      <title>Schlagworte Editieren</title>
      <meta charset="UTF-8">
      <style>
         div.errorDescr{
         color: red;
         display: none;
         }
      </style>
   </head>
</html>
<h1>Schlagwörter</h1>
<table>
<?php
   error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen
   include_once 'Functions/fct_sqlconnect.php';
   //Alle Schlagworte holen
   $sql = "SELECT Schlagwort, PK_Schlagwort FROM schlagworte ORDER BY schlagworte.Schlagwort ASC";
   $handle = fill_statement($sql, array());
   $handle->execute();

   //Iteriere über alle möglichen Schlagworte
   while ($zeile = $handle->fetch(PDO::FETCH_OBJ))                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
   {
       //Printe Button und Name des Schlagwortes, welches der Button löscht

       ?>
<form action="editSchlagworteDelete.php" method="get"><?php
   echo "<td><input type='hidden' name='pk_schlagwort' value='{$zeile->PK_Schlagwort}'></td>";
   echo "<td><input type='submit' value='Löschen'/></td>    ";
   echo "<td>$zeile->Schlagwort</td>";
   echo "</form>";


   //Ziehe das nächste Element
   $zeile = $handle->fetch(PDO::FETCH_OBJ);
   //Prüfe das Element ob Null, wenn nein, gebe nächstes aus.
   if($zeile->PK_Schlagwort != NULL){

   ?>
<form action="editSchlagworteDelete.php" method="get"><?php
   //Printe Button und Name des Schlagwortes, welches der Button löscht
   echo "<td><input type='hidden' name='pk_schlagwort' value='{$zeile->PK_Schlagwort}'></td>";
   echo "<td><input type='submit' value='Löschen'/></td>    ";
   echo "<td>$zeile->Schlagwort</td>";
   echo "</form>";

   echo "</tr>";
   }
   echo "</tr>";
   }
   echo "</table>";
   ?>
<form action="newSchlagwortSubmit.php" method="get" id="editSchlagworteForm">
   <?php
      echo "<label for='newschlagwort'></label><input name='newschlagwort' id='newschlagwort' type='text' placeholder='Neues Schlagwort' value='' title='Artikelbeschreibung'><div class='errorDescr' id='schlagwortError'>Bitte kein ' eingeben.</div>";
      echo "<input type='hidden' name='pk_Artikel' value='{$PK_Artikel}'>";
      ?>
   <input type="button" value="Füge Schlagwort hinzu" onclick="validate()">
</form>
<form action="./displayAllArtikel.php" method="GET">
   <input type="submit" value="Abbrechen">
</form>
<script>
   function submitForm()
   {
       document.getElementById("editSchlagworteForm").submit();
   }
   const validate = () => {
       //RESET UI
       document.getElementById("schlagwortError").style.display = "none";

       const newschlagwort = document.getElementById("newschlagwort").value;
       const REGEX = /^[^']*$/;

       if(!REGEX.test(newschlagwort))
       {
           document.getElementById("schlagwortError").style.display = "block";
           return;
       }
       submitForm();
   }
</script>
