<?php
    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        if ($pdo) {
            return $pdo;
        } else {
            echo "Interne server-error";
        }
    } catch(PDOException $e) {
        $e->getMessage();
    }