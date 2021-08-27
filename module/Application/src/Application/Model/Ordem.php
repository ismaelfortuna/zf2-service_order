<?php

namespace Application\Model;

class Ordem{

	private $id;
	private $titulo;
	private $descricao;
	private $ativo;
	private $data;

	/**
     * Gets the value of id.
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Sets the value of id.
     * @param mixed $id the id
     * @return self
     */
    private function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Gets the value of título.
     * @return mixed
     */
    public function getTitulo(){
        return $this->titulo;
    }

    /**
     * Sets the value of título.
     * @param mixed $titulo the titulo
     * @return self
     */
    private function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Gets the value of descrição.
     * @return mixed
     */
    public function getDescricao(){
        return $this->descricao;
    }

    /**
     * Sets the value of descrição.
     * @param mixed $descricao the descrição
     * @return self
     */
    private function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Gets the value of ativo.
     * @return mixed
     */
    public function getAtivo(){
        return $this->ativo;
    }

    /**
     * Sets the value of ativo.
     *
     * @param mixed $ativo the ativo
     * @return self
     */
    private function setAtivo($ativo){
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * Gets the value of data.
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the value of data.
     * @param mixed $data the data
     * @return self
     */
    private function setData($data){
        $this->data = $data;
        return $this;
    }

	public function exchangeArray(array $dbOrdem){
		$this->setId(isset($dbOrdem['id'])?$dbOrdem['id']:0)
			->setTitulo($dbOrdem['titulo'])
			->setDescricao($dbOrdem['descricao'])
			->setAtivo($dbOrdem['ativo'])
			->setData($dbOrdem['data']);
	}

	public function getArrayCopy(){
		return [
			'id' => $this->getId(),
			'titulo' => $this->getTitulo(),
			'descricao' => $this->getDescricao(),
			'ativo' => $this->getAtivo(),
			'data' => $this->getData()
		];
	}

}