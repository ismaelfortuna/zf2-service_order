<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class OrdemTable{

	private $tableGateway;

	public function __construct(TableGateway $tableGateway){
		$this->tableGateway = $tableGateway;
	}

	public function findAll(){
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function find($id){
		$resultSet = $this->tableGateway->select(['id' => $id]);
		$object = $resultSet->current();
		return $object;
	}

	public function insert(Ordem $ordem){
		$this->tableGateway->insert($ordem->getArrayCopy());
	}

	public function update(Ordem $ordem){
		$oldOrdem = $this->find($ordem->getId());
		if($oldOrdem){
			$this->tableGateway->update($ordem->getArrayCopy(),
				['id' => $oldOrdem->getId()]);
		}else{
		  throw new \Exception("Ordem não encontrada");
	   }
	}

	public function delete($id){
		$this->tableGateway->delete(['id' => $id]);
	}

}