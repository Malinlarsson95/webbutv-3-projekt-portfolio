<?php
//Create, read, update, remove för websites-tabellen i databasen.

class Websites {
    //Kopplar till databasen
    private $conn;
    private $table = "websites";

    //Variablar för tabellens kolumner
    public $_id;
    public $siteTitle;
    public $siteUrl;
    public $siteDescription;
    public $createdDate;

    //Lagrar kopplingen till databasen i $conn vid konstruktion
    public function __construct($db) {
        $this->conn = $db;
    }

    //READ - hämtar all data
    public function read() {
        //SQL-fråga i variabel
        $query = 'SELECT _id, siteTitle, siteUrl, siteDescription, createdDate FROM ' . $this->table . ' ORDER BY _id DESC';

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Skickar SQL-fråga
        $stmt->execute();

        //Returnerar svar
        return $stmt;
    }
    
    // CREATE - Lägg in data
    public function create() {
        //SQL-fråga för att lägga till data
        $query = 'INSERT INTO ' . $this->table . ' SET
        siteTitle = :siteTitle,
        siteUrl = :siteUrl,
        siteDescription = :siteDescription,
        createdDate = :createdDate';

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Gör så specialtecken(Å,Ä,Ö) kan lagras och tar bort eventuella html-taggar
        $this->siteTitle = htmlspecialchars(strip_tags($this->siteTitle));
        $this->siteUrl = htmlspecialchars(strip_tags($this->siteUrl));
        $this->siteDescription = htmlspecialchars(strip_tags($this->siteDescription));
        $this->createdDate = htmlspecialchars(strip_tags($this->createdDate));

        //Sätter in klassens variabler i SQL-frågan
        $stmt->bindParam(':siteTitle', $this->siteTitle);
        $stmt->bindParam(':siteUrl', $this->siteUrl);
        $stmt->bindParam(':siteDescription', $this->siteDescription);
        $stmt->bindParam(':createdDate', $this->createdDate);

        //Kör SQL-frågan, returnerar true om det fungerade
        if($stmt->execute()) {
            return true;
        } 
        //Fungerade det inte returneras false och skriver ut felmeddelande
        else {
            printf("Error: %s.\n", $stmt->error);

            return false;
            }
        }

    public function update() {
        //SQL-fråga för att lägga till data
        $query = 'UPDATE ' . $this->table . ' SET
        siteTitle = :siteTitle,
        siteUrl = :siteUrl,
        siteDescription = :siteDescription,
        createdDate = :createdDate
        WHERE
        _id = :_id';
        

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Gör så specialtecken(Å,Ä,Ö) kan lagras och tar bort eventuella html-taggar
        $this->siteTitle = htmlspecialchars(strip_tags($this->siteTitle));
        $this->siteUrl = htmlspecialchars(strip_tags($this->siteUrl));
        $this->siteDescription = htmlspecialchars(strip_tags($this->siteDescription));
        $this->createdDate = htmlspecialchars(strip_tags($this->createdDate));
        $this->_id = htmlspecialchars(strip_tags($this->_id));

        //Sätter in klassens variabler i SQL-frågan
        $stmt->bindParam(':siteTitle', $this->siteTitle);
        $stmt->bindParam(':siteUrl', $this->siteUrl);
        $stmt->bindParam(':siteDescription', $this->siteDescription);
        $stmt->bindParam(':createdDate', $this->createdDate);
        $stmt->bindParam(':_id', $this->_id);

        //Kör SQL-frågan, returnerar true om det fungerade
        if($stmt->execute()) {
            return true;
        } 
        //Fungerade det inte returneras false och skriver ut felmeddelande
        else {
            printf("Error: %s.\n", $stmt->error);

            return false;
            }
        }
        //DELETE - Tar bort data med ett specifikt id
        public function delete() {
            //SQL-fråga för att ta bort element
            $query = 'DELETE FROM ' . $this->table . ' WHERE _id = :_id';

            //Förbereder för att skicka SQL-frågan
            $stmt = $this->conn->prepare($query);

            //tar bort eventuella html koder och lagrar det medskickade _id i klassen.
            $this->_id = htmlspecialchars(strip_tags($this->_id));

            //Sätter in klassens _id i SQL-frågan.
            $stmt->bindParam(':_id', $this->_id);

            //Kör SQL-frågan, returnerar true om det fungerade
            if($stmt->execute()) {
                return true;
            } 
            //Fungerade det inte returneras false och skriver ut felmeddelande
            else {
                printf("Error: %s.\n", $stmt->error);

                return false;
                }
            }
        }

?>