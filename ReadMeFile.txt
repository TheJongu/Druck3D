/Functions:
- fct_Artikel
    - include 'fct_sqlconnect.php'
    - include 'fct_ArtikelSchlagworte.php'
    - insertArticle()
    - articleExists()
    - articleExistsPK()
    - deleteArticle()
    - editArticle()

- fct_ArtikelSchlagworte.php
    - include 'fct_sqlconnect.php'
    - include 'fct_Schlagworte.php'
    - removeAllArticleTags()
    - removeTagFromArticles()
    - addArticleTag()
    - addArticleTagPK()
    - removeArticleTag()
    - removeArticleTagPK()

- fct_Schlagworte.php
    - include 'fct_sqlconnect.php'
    - createTag()
    - deleteTag()
    - deleteTagPK()
    - getTagPK()

- fct_sqlconnect.php:
    - get_link()
    - fill_statement()

/DB-Changes:
- admin.html
    - Verweist auf displayAllArtikel.php

- deleteArtikel.php
    - Löscht den Mitgegebenen Artikel
    - verweist auf displayAllArtikel.php

- displayAllArtikel.php
    - include 'Functions/fct_sqlconnect.php'
    - Zeigt alle Artikel in der Datenbank an. Man kann Artikel bearbeiten, die Schlagworte der Artikel bearbeiten und Artikel löschen. Zusätzlichen kann man neue Artikel anlegen und Schlagwörter bearbeiten und löschen.
    - verweist auf insGetInput.html editSchlagworte.php editArtikel.php schlagwortCheckboxes.php deleteArtikel.php

- editArtikel.php
    - include 'Functions/fct_sqlconnect.php'
    - Stellt dem Nutzer ein vorausgefülltes Formular vor die Nase, wo er dann die Attribute des Artikels bearbeiten kann.
    - verweist auf editArtikelSubmit.php

- editArtikelSubmit.php
    - include 'Functions/fct_sqlconnect.php'
    - ruft editArticle() für die Daten auf, die von editArtikel.php übergeben werden
    - verweist auf displayAllArtikel.php

- editSchlagworte.php
    - include 'Functions/fct_sqlconnect.php'
    - Stellt eine Liste aller möglichen Schlagworte dar, welche einzeln gelöscht werden können. Zusätzlich kann man ein neues Schlagwort hinzufügen
    - verweist auf editSchlagworteDelete.php newSchlagwortSubmit.php

- editSchlagworteDelete.php
    - include 'Functions/fct_ArtikelSchlagworte.php'
    - include 'Functions/fct_Schlagworte.php'
    - löscht das mitgegebene Schlagwort über den PK-Schlagwort
    - verweist auf displayAllArtikel.php

- insert.php
    - include 'Functions/fct_Artikel.php'
    - fügt einen neuen Artikel mit den übergebenen daten hinzufügen
    - verweist auf displayAllArtikel.php

- insGetInput.htmnl
    - stellt ein Formular dar, wo man einen neuen Artikel eingeben und hinzufügen kann
    - verweist auf insert.php

- newSchlagwortSubmit.php
    - include 'Functions/fct_Schlagworte.php'
    - include 'Functions/fct_ArtikelSchlagworte.php'
    - erstellt ein neues Schlagwort
    - verweist auf displayAllArtikel.php

- schlagwortCheckboxes.php
    - include 'Functions/fct_sqlconnect.php'
    - Erstellt eine vorausgefüllte Liste von allen aktuellen Schlagwörtern, um die Schlagwörter des Artikels bearbeiten zu können
    - verweist auf schlagwortCheckboxesSubmit.php

- schlagwortCheckboxesSubmit.php
    - include 'Functions/fct_ArtikelSchlagworte.php'
    - entfernt zuerst vom Artikel alle Schlagwörter und fügt dann alle in schlagwortCheckboxes angehakten Schlagwörter hinzufügen
    - verweist auf displayAllArtikel