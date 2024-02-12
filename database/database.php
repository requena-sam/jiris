<?php
function getPDO(): PDO
{
    define('CONFIG_PATH', '.env.local.ini');
    if (file_exists(CONFIG_PATH)) {
        $config = parse_ini_file(CONFIG_PATH, true);
    } else {
        die('Il y a un problème de configuration de l’application, contacter l’administrateur.');
    }
    $dsn = sprintf('%s:host=%s;dbname=%s;port=%s',
        $config['database']['DB_DRIVER'],
        $config['database']['DB_HOST'],
        $config['database']['DB_NAME'],
        $config['database']['DB_PORT'],
    );
    $username = $config['database']['DB_USERNAME'];
    $password = $config['database']['DB_PASSWORD'];
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    try {
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException $exception) {
        die('Il y a un problème de connexion à la base de données, contacter l’administrateur.');
    }
}