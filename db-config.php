<?php

$host = gethostname();

if ($host == "yupbitcoinlol") {
    // Dev Environment
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPWD', '');
    define('DBNAME', 'loginsystem');
} else {
    // Local Host
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPWD', '');
    define('DBNAME', 'loginsystem');
}

$DATABASE_HOST = DBHOST;
$DATABASE_USER = DBUSER;
$DATABASE_PASS = DBPWD;
$DATABASE_NAME = DBNAME;
