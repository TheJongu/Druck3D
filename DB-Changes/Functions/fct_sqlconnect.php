<?php

function get_link(): PDO {

    static $link = null;
    static $refresh = true;

    $host = 'localhost';
    $port = '3306';
    $user = 'root';
    $password = '';
    $db = 'druck3ddb';

    if ($link == null || $refresh) {
        // echo 'Link is null. Attempting connection';
        $link = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db .  ';charset=utf8mb4',
            $user, $password);
        try {
            $handle = $link->prepare('SELECT TABLE_NAME FROM information_schema.tables');
            $handle->execute();
            $refresh = false;
            // echo 'Successfully created connection';
        } catch (PDOException $e) {
            // echo 'Database connection unavailable';
            $link = null;
        }
    }

    return $link;
}

function fill_statement(string $sql, array $parameter_array): PDOStatement {
    $handle = get_link()->prepare($sql);
    if (substr_count($sql, '?') != sizeof($parameter_array)) {
        die('Wrong parameter count');
    }
    for ($i = 0; $i < sizeof($parameter_array); $i++) {
        $handle->bindValue($i + 1, $parameter_array[$i]);
    }
    return $handle;
}

