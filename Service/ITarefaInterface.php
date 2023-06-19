<?php

interface ITarefaInterface{
    
    //Insert / Update
    public function guardarTarefa($id, $titulo, $descricao, $estado, $data);
    //Select All
    public function todasTarefas();
    //Select One
    public function umaTarefa($id);
    //Delete
    public function removerTarefa($id);
}
