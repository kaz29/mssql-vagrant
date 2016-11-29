<?php
try {
    $dbh = new PDO('sqlsrv:Database=SampleDB;Server=localhost', 'sa', getenv('MSSQLPW'));
    echo 'Connected!' . PHP_EOL;
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage() . PHP_EOL;;
}
