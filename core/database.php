<?php
namespace Core;
use Core\Exceptions\FileNotFoundException;
use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(string $ini_path)
    {
        $this->pdo = $this->getPDO($ini_path);
    }

    public function dropTables()
    {
        $tables_sql = 'SHOW TABLES';
        $tables = $this->pdo->query($tables_sql)->fetchAll();
        foreach ($tables as $table) {
            $this->pdo->exec('DROP TABlE ' . $table->Tables_in_jiri);
        }
    }

    public function exec(string $statement): false|int
    {
        return $this->pdo->exec($statement);
    }

    private function getPDO(string $ini_path): PDO
    {
        if (file_exists($ini_path)) {
            $config = parse_ini_file($ini_path, true);
        } else {
            throw new FileNotFoundException('Il y a un problème de configuration de l’application, contacter l’administrateur.');
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

    public function prepare(string $sql_statement): false|PDOStatement
    {
        return $this->pdo->prepare($sql_statement);
    }
    public function query(string $sql_statement): false|PDOStatement
    {
        return $this->pdo->query($sql_statement);
    }
}