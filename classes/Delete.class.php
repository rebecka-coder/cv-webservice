<?php
/*Klass för att radera inlägg för studier, arbete och projekt, av Rebecka Högström ht-19*/

class Delete {
    public $db;

    //Constructor
        function __construct(){
        //Anslut till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    
    }
    //Radera utbildning/kurs
	public function delStudies($id) {
		$id = intval($id); //Bara siffervärden i heltal
		$sql = "DELETE FROM studies WHERE id='$id'";
		return $this->db->query($sql);
    }

    //Radera arbete
	public function delWork($id) {
		$id = intval($id); //Bara siffervärden i heltal
		$sql = "DELETE FROM work WHERE id='$id'";
		return $this->db->query($sql);
    }

    //Radera projekt
	public function delProject($id) {
		$id = intval($id); //Bara siffervärden i heltal
		$sql = "DELETE FROM projects WHERE id='$id'";
		return $this->db->query($sql);
    }
}
?>