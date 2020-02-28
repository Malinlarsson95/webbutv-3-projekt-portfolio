## Webbplatsen

Länk till publicerad hemsida: https://e3c.se/webbutv/webbutv3/projekt/index.html

Startsidan hämtar data från webbtjänsten med Fetch API.  
Sidan är konstruerad över ett Gulp-ramverk som automatiserar uppgifter så som att minimera, slå ihop och komprimera filer.   

Gränsnitt ligger tillgänglig under webbplatsen fast på en annan undersida. Ungefär som wp-admin.  
Länk till gränssnittet: https://e3c.se/webbutv/webbutv3/projekt/admin.php  
Användarnamn: admin  
Password: password  

En undersida finns tillgänglig enbart om man har en Session som görs vid korrekt inloggning.  
Här finns funktionalitet i JavaScript koden för att även kunna uppdatera, radera och lägga till data i databasen.  

## GULP

### De tasks jag skapat, vad de gör och vilka paket jag använd:
* **HTML-task:**
Tar HTML-filerna i mappen "src" och minifierar dessa, alltså tar bort alla mellanrum för att göra filen så liten som möjligt. Skickar sedan dessa vidare till "pub"-mappen.  
Paketen som används är "gulp htmlmin" för att minifiera HTML-filerna.
* **Js-task:**
Tar js-filerna i mappen "src/js" och minifierar de filerna och skriver till "pub/js" mappen.  
För att minifiera filerna används "gulp uglify es"
* **Image-task:**
Filerna hämtas in, komprimeras och skickas till "pub/images".  
Det paket jag använd heter "gulp-imagemin".
* **SASS-task**
Gör om scss-kod till css kod och lägger det i CSS-mappen i pub, om flera scss-filer skulle användas skulle dessa slås ihop. Minifierar även koden. Paketen "gulp-sass" och "node-sass" har använts.

För att man enkelt ska kunna sitta och utveckla sin sida utan att behöva ladda om sin webbbläsare för varje ändring man gör i någon fil har jag lagt in en browser-sync. Browser-sync känner då av när någon av filerna i "pub" mappen har ändrats och uppdaterar då webbläsaren automatiskt.
