<?php
/*Klass för att hämta inlägg för studier, arbete och projekt, av Rebecka Högström ht-19*/

class Read {
    public $db;

    //Constructor
        function __construct(){

        //Anslut till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
         }
    }

    //Returnera alla studier från tabellen studier
    public function getStudies() {
        $sql = "SELECT * FROM studies";
        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC); //skaffa en associativ array
    }

    //Returnera alla arbeten från tabellen arbete
    public function getWork() {
        $sql = "SELECT * FROM work";
        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC); //skaffa en associativ array
    }

    //Returnera alla projekt från tabellen projekt
    public function getProject() {
        $sql = "SELECT * FROM projects";
        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC); //skaffa en associativ array
    }
}
?>