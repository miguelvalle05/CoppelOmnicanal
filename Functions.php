<?php

function conectar($pdo = false){	
    
    if(!$pdo){
        $mysqli = new mysqli("localhost", "userdb", "dbcoppel", "coppelomnicanal");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL1: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        else {
            //echo "Fallo al conectar a MySQL2: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return $mysqli;
            }
    }else{
        $dbConfig["dbtype"] = "mysql";
        $dbConfig["dbname"] = "coppelomnicanal";
        $dbConfig["dbhost"] = "localhost";
        $dbConfig["dbcharset"] = "utf8";
        $dbConfig["dbuser"] = "userdb";
        $dbConfig["dbpass"] = "dbcoppel";
        $dbh = getPDOConnect($dbConfig);
        return $dbh;
    }
}



?>