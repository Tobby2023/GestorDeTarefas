<?php
include_once './Config/Database.php';
include_once('./Models/TarefaModel.php');

class TarefaRepository{
    private $db;

    function __construct() {
        $this->db = Database::getInstance();
    }

    public function insert($titulo, $descricao, $estado, $data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO ttarefa (titulo, descricao, estado, dataConclusa)VALUES".
            "('". $titulo ."', '". $descricao ."', '". $estado ."', '". $data ."')");
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($id, $titulo, $descricao, $estado, $data) {
        try {
            $stmt = $this->db->prepare("UPDATE ttarefa SET titulo = '". $titulo ."', descricao = '". $descricao ."', estado = '". $estado ."', dataConclusa = '". $data ."' WHERE codTarefa = ". $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM ttarefa WHERE codTarefa = ". $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        $tarefas = Array();
        $stmt = $this->db->prepare("SELECT * FROM ttarefa");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $tarefa) {
            $tarefas[] = new Tarefa($tarefa['codTarefa'], $tarefa['titulo'], $tarefa['descricao'], $tarefa['estado'], $tarefa['dataConclusa']);
        }
        return $tarefas;
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM ttarefa WHERE codTarefa = ". $id);
        $stmt->execute();
        $tarefa = $stmt->fetch();

        if(isset($tarefa)){
            return new Tarefa($tarefa['codTarefa'], $tarefa['titulo'], $tarefa['descricao'], $tarefa['estado'], $tarefa['dataConclusa']);
        }else{
            return NULL;
        }
    }

}