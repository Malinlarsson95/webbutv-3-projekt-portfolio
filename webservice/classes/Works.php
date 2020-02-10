<?php
//Create, read, update, remove för works-tabellen i databasen.

class Works {
    //Kopplar till databasen
    private $conn;
    private $table = "works";

    //Variablar för tabellens kolumner
    public $_id;
    public $workTitle;
    public $workPlace;
    public $startDate;
    public $endDate;

    //Lagrar kopplingen till databasen i $conn vid konstruktion
    public function __construct($db) {
        $this->conn = $db;
    }

    //READ - hämtar all data
    public function read() {
        //SQL-fråga i variabel
        $query = 'SELECT _id, workTitle, workPlace, startDate, endDate FROM ' . $this->table;

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
        workTitle = :workTitle,
        workPlace = :workPlace,
        startDate = :startDate,
        endDate = :endDate';

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Gör så specialtecken(Å,Ä,Ö) kan lagras och tar bort eventuella html-taggar
        $this->workTitle = htmlspecialchars(strip_tags($this->workTitle));
        $this->workPlace = htmlspecialchars(strip_tags($this->workPlace));
        $this->startDate = htmlspecialchars(strip_tags($this->startDate));
        $this->endDate = htmlspecialchars(strip_tags($this->endDate));

        //Sätter in klassens variabler i SQL-frågan
        $stmt->bindParam(':workTitle', $this->workTitle);
        $stmt->bindParam(':workPlace', $this->workPlace);
        $stmt->bindParam(':startDate', $this->startDate);
        $stmt->bindParam(':endDate', $this->endDate);

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
        $query = 'INSERT INTO ' . $this->table . ' SET
        workTitle = :workTitle,
        workPlace = :workPlace,
        startDate = :startDate,
        endDate = :endDate
        WHERE
        _id = :_id';
        

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Gör så specialtecken(Å,Ä,Ö) kan lagras och tar bort eventuella html-taggar
        $this->workTitle = htmlspecialchars(strip_tags($this->workTitle));
        $this->workPlace = htmlspecialchars(strip_tags($this->workPlace));
        $this->startDate = htmlspecialchars(strip_tags($this->startDate));
        $this->endDate = htmlspecialchars(strip_tags($this->endDate));
        $this->_id = htmlspecialchars(strip_tags($this->_id));

        //Sätter in klassens variabler i SQL-frågan
        $stmt->bindParam(':workTitle', $this->workTitle);
        $stmt->bindParam(':workPlace', $this->workPlace);
        $stmt->bindParam(':startDate', $this->startDate);
        $stmt->bindParam(':endDate', $this->endDate);
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