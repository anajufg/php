<?php
require_once 'Conexao.php';

class Cliente {
    private $pdo;
    private $tabela = "TrabalhoSemana29_Cliente";

    public function __construct() {
        $this->pdo = new Conexao(); 
    }

    /* Lista usuarios */
    public function listarUsuarios() {
        $stmt = $this->pdo->query("SELECT * FROM " . $tabela . " ORDER BY username");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Cadastra usuario */
    public function cadastraUsuario($username, $senha, $acesso, $email) {
        // Verifica se já existe
        $stmt = $this->pdo->prepare("SELECT id FROM " . $tabela . " WHERE username = :n");
        $stmt->bindValue(":n", $username);
        $stmt->execute();

        // Se o user ja existe retorna falso
        if ($stmt->rowCount() > 0) {
            return false;
        } else { // Caso contrario, cadastra a pessoa
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT); // Hash da senha
            $stmt = $this->pdo->prepare("INSERT INTO " . $tabela . " (username, senha, acesso, status, email) VALUES (:n, :s, :a, 1, :e)");
            $stmt->bindValue(":n", $username);
            $stmt->bindValue(":s", $senhaHash); // Armazena a senha hasheada
            $stmt->bindValue(":a", $acesso);
            $stmt->bindValue(":e", $email);
            return $stmt->execute();
        }
    }

    /* Exclui usuario */
    public function excluiUsuario($id) {
        $stmt = $this->pdo->prepare("DELETE FROM " . $tabela . " WHERE id = :id");
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    /* Busca dados de um usuario */
    public function buscaDadosUsuario($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $tabela . " WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* Atualiza dados de um usuario */
    public function atualizaDadosUsuario($id, $username, $senha, $acesso, $email) {
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT); // Hash da senha
        $stmt = $this->pdo->prepare("UPDATE " . $tabela . " SET username = :n, senha = :s, acesso = :a, email = :e WHERE id = :id");
        $stmt->bindValue(":n", $username);
        $stmt->bindValue(":s", $senhaHash); // Armazena a senha hasheada
        $stmt->bindValue(":a", $acesso);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
}
?>
