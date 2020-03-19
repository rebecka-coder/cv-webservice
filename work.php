<?php
include("includes/config.php");

 header("Content-Type: application/json;charset=UTF-8"); //Skicka returnerad header information
 header("Access-Control-Allow-Origin: *");  //aktivera åtkomst via annan domän
 header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');

 $input = json_decode(file_get_contents('php://input'), true); //Läs in data från anropet, konvertera till json-format.
 //var_dump($input); //Gör en dump för anropet
 
 $method = $_SERVER['REQUEST_METHOD'];
 $c = new Create(); //variabel för klassen create
 $r = new Read(); //variabel för klassen read
 $u = new Update(); //variabel för klassen update
 $d = new Delete(); //variabel för klassen delete

//Switch-metod för att använda antingen, get, post, update eller delete
 switch($method) {
     case "GET":
     //Kod för GET
     $response = $r->getWork();
     if(sizeof($response) > 0) {
         http_response_code(200); //Ok
     } else {
         http_response_code(404); //Not found
         $response = array("message" => "Inga arbeten hittade."); //Felmeddelande
     }
     break;
     case "POST":
    //Kod för POST
        if ($input['workPlace'] == "" || $input['workTitle'] == "" || $input['workDate'] == "") {
        http_response_code(500); //Server error
        $response = array("message" => "Alla fält måste fyllas i!");
        } else { 
        $c->addWork($input['workPlace'], $input['workTitle'], $input['workDate']); 
        http_response_code(201); //Skapad
        $response = array("message" => "Arbete skapad.");
        }  

    break;
    case "DELETE":
    //Kod för DELETE
    if($d->delWork($input['id'])) {
        http_response_code(200); //Ok
        $response = array("message" => "Arbete raderad.");
    } else {
        http_response_code(500); //Server error
        $response = array("message" => "Error radera arbete."); //Felmeddelande
    }
    break;
    case "PUT":
    //Kod för PUT
    if($u->updateWork($input['workPlace'], $input['workTitle'], $input['workDate'], $input['id'])) {
        http_response_code(200); //Ok
        $response = array("message" => "Arbete uppdaterad.");
    } else {
        http_response_code(500); //Server error
        $response = array("message" => "Error uppdatera arbete."); //Felmeddelande
    }
    break;
 }
 echo json_encode($response); //Returnera resultatet i JSON-format    
?>