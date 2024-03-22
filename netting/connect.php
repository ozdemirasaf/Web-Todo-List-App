<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=DBNAME;chatset=utf8", 'USERNAME', 'USERPASS');
} catch (PDOException $e) {
    echo $e->getMessage();
}
