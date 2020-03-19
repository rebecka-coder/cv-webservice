<?php
/*Klass för att skapa inlägg för studier, arbete och projekt, av Rebecka Högström ht-19*/

class Create {
    public $db;

//Constructor
function __construct(){
    //Anslut till databasen
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    if($this->db->connect_errno > 0) {
        die("Fel vid anslutning: " . $this->db->connect_error);
    }
}
    //Registrera ny utbildning/kurs
    public function addStudies($university, $studyName, $studyDate) {
        $university = $this->db->real_escape_string($university);
        $studyName = $this->db->real_escape_string($studyName);
        $studyDate = $this->db->real_escape_string($studyDate);


        //Sql-fråga till databasen
        $sql = "INSERT INTO studies(university, studyName, studyDate)VALUES('$university', '$studyName', '$studyDate')";
        //echo $sql;

        $result = $this->db->query($sql);

        return $result;
    }

    //Registrera nytt arbete
    public function addWork($workPlace, $workTitle, $workDate) {
        $workPlace = $this->db->real_escape_string($workPlace);
        $workTitle = $this->db->real_escape_string($workTitle);
        $workDate = $this->db->real_escape_string($workDate);


        //Sql-fråga till databasen
        $sql = "INSERT INTO work(workPlace, workTitle, workDate)VALUES('$workPlace', '$workTitle', '$workDate')";
        //echo $sql;

        $result = $this->db->query($sql);

        return $result;
    }

    //Registrera nytt projekt
    public function addProject($projectTitle, $url, $description) {
        $projectTitle = $this->db->real_escape_string($projectTitle);
        $url = $this->db->real_escape_string($url);
        $description = $this->db->real_escape_string($description);


        //Sql-fråga till databasen
        $sql = "INSERT INTO projects(projectTitle, url, description)VALUES('$projectTitle', '$url', '$description')";
        //echo $sql;

        $result = $this->db->query($sql);

        return $result;
    }
}
?>