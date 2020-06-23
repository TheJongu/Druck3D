<?php

function get_link() {

    static $link = null;
    static $refresh = true;

    $host = 'localhost';
    $port = '3308';
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

