# cv-webservice
## Mappar och filer

Projektet heter cv-webservice och är en REST-webbtjänst till webbplatsen cvprojekt. De mappar och filer som ingår är:

* Classes. En klassmapp med fyra respektive klassfiler, som har olika funktioner med metoder för att kunna interagera med databasen.
Includes. En mapp med en config-fil som innehåller bl a inställningar till databasen och aktivering av min klassmappar.
* .gitignore mapp.
dbprojects.text, dbstudies.txt och dbwork.txt som är tre textfiler, som har blivit exporterad från databasen.
package-lock.json fil.
* projects.php - En fil som får webbtjänsten att fungera. I den inkluderas config-filen, och tre olika headers som t ex gör att man kan aktivera denna tjänst via en annan domän och använda samtliga metoder för GET, POST, PUT och DELETE. Kod för att kunna konvertera till JSON-format samt en switch som kan byta mellan olika metoder. Ett anrop görs för json som returnerar resultatet.
* studies.php - se ovan.
* work.php - se ovan.
* Länk till api:et studier arbete projekt

