<?php
// Database Type : "MySQL"
// Database Adapter : "mysql"
$exports = <<<'JSON'
{
    "name": "db",
    "module": "dbconnector",
    "action": "connect",
    "options": {
        "server": "mysql",
        "databaseType": "MySQL",
        "connectionString": "mysql:host=db;sslverify=false;port=3306;dbname=ocean;user=db_user;password=9ugvMprP;charset=utf8"
    }
}
JSON;
?>