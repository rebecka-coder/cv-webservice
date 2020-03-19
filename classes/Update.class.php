<?php
/*Klass för att uppdatera inlägg för studier, arbete och projekt, av Rebecka Högström ht-19*/

class Update {
    public $db;

    //Constructor
        function __construct(){

        //Anslut till databasen
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
         }
    }

    //Uppdatera utbildning/kurs
	public function updateStudies($university, $studyName, $studyDate, $id) {
        $id = intval($id);
		$university = $this->db->real_escape_string($university);
        $studyName = $this->db->real_escape_string($studyName);
        $studyDate = $this->db->real_escape_string($studyDate);

        $sql = "UPDATE studies SET university= '$university', studyName = '$studyName', studyDate = '$studyDate' WHERE id=$id";

		return $this->db->query($sql);
    }
    

    //Uppdatera arbete
	public function updateWork($workPlace, $workTitle, $workDate, $id) {
        $id = intval($id);
		$workPlace = $this->db->real_escape_string($workPlace);
        $workTitle = $this->db->real_escape_string($workTitle);
        $workDate = $this->db->real_escape_string($workDate);

        $sql = "UPDATE work SET workPlace= '$workPlace', workTitle = '$workTitle', workDate = '$workDate' WHERE id=$id";

		return $this->db->query($sql);
    }

    //Uppdatera projekt
	public function updateProject($projectTitle, $url, $description, $id) {
        $id = intval($id);
		$projectTitle = $this->db->real_escape_string($projectTitle);
        $url = $this->db->real_escape_string($url);
        $description = $this->db->real_escape_string($description);

        $sql = "UPDATE projects SET projectTitle= '$projectTitle', url = '$url', description = '$description' WHERE id=$id";

		return $this->db->query($sql);
    }
}
?>