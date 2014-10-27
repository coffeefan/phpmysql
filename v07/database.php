<?php
//Konfiguration
define("DB_host", "mysql:host=127.0.0.1;dbname=loc_orm;charset=utf8");
define("DB_user", "loc_orm");
define("DB_password", "12341234");
define("DEBUGGING", false);


$pdodb = null;
function newPDOConnection() {
        try {
                $pdo = new PDO(DB_host, DB_user, DB_password);
                if ($pdo == null) {
                        echo 'Fehler bei der Datenbankverbidnung aufgetreten';
                }
                return $pdo;
        } catch(PDOException $e) {
                die ('Es konnte keine Verbindung folgender Datenbank dargestellt werden '.DB_host);
        }
}

function getPDODB() {
        global $pdodb;
        if ($pdodb == null) {
            $pdodb = newPDOConnection();
        }
        return $pdodb;
}


function prepareSql($sql) {
        $query = getPDODB()->prepare($sql);
        return $query;
}

function executeSql($query, $fieldValueMapping) {
        $query->execute($fieldValueMapping);
        if (DEBUGGING == true) {
                echo var_dump(getDb()->errorinfo());
        }
        return $query;
}

?>