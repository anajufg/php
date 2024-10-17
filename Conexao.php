<?php 
Class Conexao {

    /* Conexao com o banco de dados */
    public function __construct() {
        $dbname =  'a2023951555@teiacoltec.org';
        $host = 'localhost';
        $user = 'a2023951555@teiacoltec.org';
        $pass = '@Coltec2024';
        $charset = 'utf8mb4';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass, $options);
            return $pdo;
        } catch (PDOExeception $e) {
            echo "ERRO com banco de dados: ".$e->getMessage();
            exit();
        } catch (Exception $e) {
            echo "ERRO generico: ".$e->getMessage();
            exit();
        }
    }
}
?>