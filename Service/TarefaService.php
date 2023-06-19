<?php
include_once "Repository/TarefaRepository.php";
include_once "Service/ITarefaInterface.php";


class TarefaService implements ITarefaInterface{
    private $tarefaRepository = null;

    public function __construct(){
        $this->tarefaRepository = new TarefaRepository();
    }

    //Insert / Update
    public function guardarTarefa($id, $titulo, $descricao, $estado, $data){
        if($id != ''){
            echo 'Atualizar';
            $this->tarefaRepository->update($id, $titulo, $descricao, $estado, $data);
        }else{
            echo 'Inserir';
            $this->tarefaRepository->insert($titulo, $descricao, $estado, $data);
        }
    }

    //Select All
    public function todasTarefas(){
        try {
            $rest = $this->tarefaRepository->selectAll();
            return $rest;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //Select One
    public function umaTarefa($id){
        try {
            $rests = $this->tarefaRepository->selectById($id);
            return $rests;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //Delete
    public function removerTarefa($id){
        try {
            $this->tarefaRepository->delete($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
