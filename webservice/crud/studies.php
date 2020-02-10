<?php
//URL för GET, POST, PUT, DELETE
// http://localhost/webb3projekt/webservice/crud/studies.php

//Lagrar anropets metod
$method = $_SERVER['REQUEST_METHOD'];

//Headers som gör att webbtjänsten kan kommas åt från alla domäner
//Samt godkänner att GET, PUT, POST och DELETE används.
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Studies.php';

//Startar en koppling till databasen
$database = new Database();
$db = $database->connect();

//Skapar klassen för att skicka SQL-frågor till databasen.
$studies = new Studies($db);

//Kolla vilken metod som skickats och kör de funktionerna i klassen
switch($method) {
    case "GET":
        //Kör funktionen read och lagrar i en variabel
        $result = $studies->read();

        //Lagrar antalet objekt i en variabel
        $num = $result->rowCount();

        //Kollar om resultatet innehåller några objekt
        if($num > 0) {
            $studies_arr = array();

            //Kör igenom resultatet objekt för objekt och lagrar i en array.
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $studies_item = array(
                    '_id' => $_id,
                    'school' => $school,
                    'educationName' => $educationName,
                    'startDate' => $startDate,
                    'endDate' => $endDate
                );
                array_push($studies_arr, $studies_item);
            }
            echo json_encode($studies_arr);

        } else {
            //Om inga objekt finns i tabellen
            echo json_encode(
                array('message' => 'Inga studier hittades')
            );
        }

    break;

    case "POST":
        //Läser in den JSON-data som skickades med i anropet och lagras i en variabel.
        $data = json_decode(file_get_contents("php://input"));

        // Tar datan från variabeln och lägger in i klassens variablar
        $studies->school = $data->school;
        $studies->educationName = $data->educationName;
        $studies->startDate = $data->startDate;
        $studies->endDate = $data->endDate;

        //Kör create-metoden i klassen, returnerar den true har data lagts in i databasen
        if($studies->create()) {
            echo json_encode(
                array('message' => 'Studie inlagd')
            );
        } else {
            echo json_encode(
                array('message' => 'Studie lades inte in')
            );
        }

    break;

    case "PUT":
        //Läser in den JSON-data som skickades med i anropet och lagras i en variabel.
        $data = json_decode(file_get_contents("php://input"));

        // Tar datan från variabeln och lägger in i klassens variablar
        $studies->school = $data->school;
        $studies->educationName = $data->educationName;
        $studies->startDate = $data->startDate;
        $studies->endDate = $data->endDate;

        //Kör create-metoden i klassen, returnerar den true har data lagts in i databasen
        if($studies->update()) {
            echo json_encode(
                array('message' => 'Studie uppdaterad')
            );
        } else {
            echo json_encode(
                array('message' => 'Studie uppdaterades inte')
            );
        }
    break;

    case "DELETE":
        //Läser in den JSON-data som skickades med i anropet och lagras i en variabel.
        $data = json_decode(file_get_contents("php://input"));

        //Skickar med id:et som skickades med och lagrar i klassen.
        $studies->_id = $data->_id;

        //Kör delete-metoden i klassen, returnar den true och data raderats med det specifika id:et
        if ($studies->delete()) {
            echo json_encode(
                array('message' => 'Studie raderad')
            );
        } else {
            echo json_encode(
                array('message' => 'Studie raderades inte')
            );
        }
    break;
}