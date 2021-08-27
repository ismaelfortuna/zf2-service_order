<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Ordem;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$ordens = $this->getServiceLocator()
    	->get('Application\Model\OrdemTable')->findAll();
		return new ViewModel([
			'ordens' => $ordens
        ]);
    }

    public function createAction(){
    	if($this->getRequest()->isPost()){
    		$dbOrdem = $this->params()->fromPost();
    		$ordem = new Ordem();
    		$ordem->exchangeArray($dbOrdem);
    		$table = $this->getServiceLocator()
    		->get('Application\Model\OrdemTable');
    		$table->insert($ordem);
    		return $this->redirect()->toUrl('/application/index/index');
    	}
    	return new ViewModel();
    }

    public function editAction(){
    	$table = $this->getServiceLocator()
    		->get('Application\Model\OrdemTable');
    	if($this->getRequest()->isPost()){
    		$dbOrdem = $this->params()->fromPost();
    		$ordem = new Ordem();
    		$ordem->exchangeArray($dbOrdem);
    		$table->update($ordem);
    		return $this->redirect()->toUrl('/application/index/index');
    	}
    	$ordem = $table->find($this->params()->fromRoute('id'));
    	return new ViewModel([
    		'ordem' => $ordem
    	]);
    }

    public function deleteAction(){
    	$table = $this->getServiceLocator()
    		->get('Application\Model\OrdemTable');
    	
    	$ordem = $table->delete($this->params()->fromRoute('id'));
    	return $this->redirect()->toUrl('/application/index/index');
    }

}
