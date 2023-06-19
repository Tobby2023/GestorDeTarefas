<?php
include_once "Service/TarefaService.php";


class TarefaControl{
    private $tarefaService = NULL;

    public function __construct(){
        $this->tarefaService = new TarefaService();
    }

    public function index()
    {
        $tarefas = $this->listaTarefas();
        $valor = $this->tarefa();
        include "./View/TarefasVeiw.php";
    }

    public function addTarefa()
    {
        $titulo = '';
        $descricao = '';
        $estado = '';
        $data = '';

        if(isset($_POST["enviar"])){

            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            $data = $_POST['data'];

            $filtrar = filter_input(INPUT_GET, 'id');
            $id = isset($filtrar) ? $filtrar : NULL;
    
            if(isset($id)){
                $this->tarefaService->guardarTarefa($id, $titulo, $descricao, $estado, $data);
            }else{
                $this->tarefaService->guardarTarefa(0, $titulo, $descricao, $estado, $data);
            }
            
        }
        $this->index();
    }

    public function listaTarefas(){
        $listaDeTarefas = array();
        $listaDeTarefas = $this->tarefaService->todasTarefas();
        return $listaDeTarefas;
    }

    public function tarefa(){
        $filtrar = filter_input(INPUT_GET, 'idA');
        $id = isset($filtrar) ? $filtrar : NULL;

        if(isset($id)){
            return $this->tarefaService->umaTarefa($id);
        }else{
            return NULL;
        }
    }

    public function removerTarefa(){

        $filtrar = filter_input(INPUT_GET, 'id');
        $id = isset($filtrar) ? $filtrar : NULL;

        if(isset($id)){
            $this->tarefaService->removerTarefa($id);
        }
        $this->index();
    }

}


