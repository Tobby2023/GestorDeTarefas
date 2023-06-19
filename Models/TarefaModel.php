<?php

class Tarefa{
    private $id = '';
    private $titulo = '';
    private $descricao = '';
    private $estado = '';
    private $data = '';

    public function __construct($id, $titulo, $descricao, $estado, $data){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->data = $data;
        if($estado == 'on')
            $this->estado = 'checked';
        else
            $this->estado = $estado;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getData(){
        return $this->data;
    }
}