<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'kidsGames';
    private $charset = 'utf8mb4';
    private $pdo;

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;charset=$this->charset", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if the database already exists
            $stmt = $this->pdo->prepare("SHOW DATABASES LIKE :dbName");
            $stmt->execute(['dbName' => $this->dbName]);

            if ($stmt->rowCount() === 0) {
                $sqlScript = file_get_contents(__DIR__ . '/database-entity.sql');
                $this->pdo->exec($sqlScript);
            }
        } catch(PDOException $e) {
            echo $e->getMessage() . "\n" . $e->getTraceAsString();
        }
    }
}
?>