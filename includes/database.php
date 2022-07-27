<?php 

    try {
        $db = new PDO(
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        );

        
        if (!$db) {
            echo "Error: No se pudo conectar a la base de datos, revisar credenciales";
            exit;
        }else 
        return $db;
    } catch (Exception $e) {
        return 'Exception capturada' . $e->getMessage();
    }