<?php

ini_set('mssql.datetimeconvert', false);

// require_once("Models/config.php");

require_once(__DIR__ . '/../db-config.php');

class DBO
{

    public $db = NULL;
    public $dbServer = "";

    public function __construct($RRO = NULL)
    {
        $this->dbConnect();
    }


    public function __destruct()
    {
        //error_log("\nDBO DESTRUNCT\n");
        $this->dbDisconnect();
    }


    //Database connection
    public function dbConnect()
    {
        try {
            $this->db = null;
            $this->db = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPWD, array(PDO::ATTR_PERSISTENT => false));
        } catch (PDOException $e) {
            error_log("Failed to get DB handle: " . $e->getMessage() . "\n");
            exit;
        }
    }

    public function GetRecordSet($sqlStr)
    {
        $rs = $this->db->prepare($sqlStr);
        $rs->execute();
        return $rs;
    }

    public function Execute($sqlStr)
    {
        $rs = $this->db->prepare($sqlStr);
        $rs->execute();
    }

    public function FreeRS($rs)
    {
        unset($rs);
    }

    public function dbDisconnect()
    {
        $this->db = null;
        unset($this->db);
    }
}
