<?php

class DB{

    

    function __construct() {

        //date_default_timezone_set('Africa/Douala');

    }

	function getConnection() {

        

        $dbhost="localhost:3306";
        $dbuser="root";
        $dbpass="";
        $dbname="essec_db";

        /*$dbhost="localhost:3306";
        $dbuser="root";
        $dbpass="";
        $dbname="essec_db";*/

        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	

        $dbh->exec("SET NAMES utf8;");        

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbh;

	}

}

	

	

	

