<?php
    $site_title = "CV-Webservice";
    $divider = " | ";
    $page_title = "Webbtjänst";

// Aktivera felrapportering
error_reporting(-1);
ini_set("display_errors", 1);

// Aktivera autoload för registrering av klasser
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

//DB-inställningar
define("DBHOST", "");
define("DBUSER", "");
define("DBPASS", "");
define("DBDATABASE", "");

//Start session
if (session_status() == PHP_SESSION_NONE) {
     session_start();
}
?>