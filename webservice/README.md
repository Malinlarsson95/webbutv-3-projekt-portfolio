## WEBBTJÄNSTEN
Webbtjänst som är **objektorienterad** med fyra **klasser**. 
En som håller inställningar för databasen och skapar en koppling till den.
En klass för vardera tabell i databasen som sköter **SQL-frågor** till tabellerna studies, works och websites i databasen.
SQL-frågor för att hämta, lägga till, radera och updatera datan finns som funktioner.

Genom att läsa in vilken **metod** som skickats med vid anrop görs en switch-sats som har fyra olika cases för de olika anropen get, put, post och delete.
Vid **Get** körs funktion för att hämta data ur en av tabellerna beroende till vilken php-fil man gjort anropet till.
Vid **Post** körs funktion för att läsa in data från anropet samt skicka in detta till klassen för att sedan köra funktion för att skapa data i databasen.
Vid **Put** körs funktion för att läsa in data från anropet samt skicka in detta till klassen för att sedan köra funktion för att updatera data i databasen.
Vid **Delete** körs funktion för att läsa in id från anropet samt skicka in detta till klassen för att sedan köra funktion för att radera data i databasen.

* **Url för att göra anrop till webbtjänsten:** 
**Studie-tabellen:** https://e3c.se/webbutv/webbutv3/projekt/webservice/crud/studies.php  
**Json-format för att lägga till data:**  
{"school":"SKOLA","educationName":"UTBILDNING","startDate":"åååå/MM","endDate":"åååå/MM"}  
**Json-format för att ändra data:**  
{"_id":"INT","school":"SKOLA","educationName":"UTBILDNING","startDate":"åååå/MM","endDate":"åååå/MM"}  
**Json-format för att radera data:**  
{"_id":"INT"}

* **Works-tabellen:** https://e3c.se/webbutv/webbutv3/projekt/webservice/crud/studies.php  
**Json-format för att lägga till data:**  
{"workTitle":"TITEL","workPlace":"ARBETSPLATS","startDate":"åååå/MM","endDate":"åååå/MM"}
**Json-format för att ändra data:**  
{"_id":"INT", "workTitle":"TITEL","workPlace":"ARBETSPLATS","startDate":"åååå/MM","endDate":"åååå/MM"}
**Json-format för att radera data:**  
{"_id":"INT"}

* **Websites-tabellen:** https://e3c.se/webbutv/webbutv3/projekt/webservice/crud/studies.php  
**Json-format för att lägga till data:**  
{"siteTitle":"TITEL","siteUrl":"URL","siteDescription":"BESKRIVNING","createdDate":"åååå/MM"}
**Json-format för att ändra data:**  
{"_id":"INT" "siteTitle":"TITEL","siteUrl":"URL","siteDescription":"BESKRIVNING","createdDate":"åååå/MM"}
**Json-format för att radera data:**  
{"_id":"INT"}
