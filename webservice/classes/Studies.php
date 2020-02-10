<?php
//Create, read, update, remove för studies-tabellen i databasen.

class Studies {
    //Kopplar till databasen
    private $conn;
    private $table = "studies";

    //Variablar för tabellens kolumner
    public $_id;
    public $school;
    public $educationName;
    public $startDate;
    public $endDate;

    //Lagrar kopplingen till databasen i $conn vid konstruktion
    public function __construct($db) {
        $this->conn = $db;
    }

    //READ - hämtar all data
    public function read() {
        //SQL-fråga i variabel
        $query = 'SELECT _id, school, educationName, startDate, endDate FROM ' . $this->table;

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
        school = :school,
        educationName = :educationName,
        startDate = :startDate,
        endDate = :endDate';

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Gör så specialtecken(Å,Ä,Ö) kan lagras och tar bort eventuella html-taggar
        $this->school = htmlspecialchars(strip_tags($this->school));
        $this->educationName = htmlspecialchars(strip_tags($this->educationName));
        $this->startDate = htmlspecialchars(strip_tags($this->startDate));
        $this->endDate = htmlspecialchars(strip_tags($this->endDate));

        //Sätter in klassens variabler i SQL-frågan
        $stmt->bindParam(':school', $this->school);
        $stmt->bindParam(':educationName', $this->educationName);
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
        school = :school,
        educationName = :educationName,
        startDate = :startDate,
        endDate = :endDate
        WHERE
        _id = :_id';
        

        //Förbereder att skicka SQL-fråga
        $stmt = $this->conn->prepare($query);

        //Gör så specialtecken(Å,Ä,Ö) kan lagras och tar bort eventuella html-taggar
        $this->school = htmlspecialchars(strip_tags($this->school));
        $this->educationName = htmlspecialchars(strip_tags($this->educationName));
        $this->startDate = htmlspecialchars(strip_tags($this->startDate));
        $this->endDate = htmlspecialchars(strip_tags($this->endDate));
        $this->_id = htmlspecialchars(strip_tags($this->_id));

        //Sätter in klassens variabler i SQL-frågan
        $stmt->bindParam(':school', $this->school);
        $stmt->bindParam(':educationName', $this->educationName);
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