<?php

class UsuarioController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $usuario = new Application_Model_Usuario();
        
        $dados_usuario = $usuario->pesquisarUsuario();
        
        $this->view->assign("dados_usuario",$dados_usuario);
    }
    
    
    
    /*public function newAction(){
        $request = $this->getRequest();
        $form = new Application_Form_Usuario();
        
         if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $usuario = new Application_Model_Usuario($form->getValues());
                $usuario->incluirUsuario($usuario);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }*/
    
    public function newAction(){
    }
    
    public function createAction(){
        $this->_helper->flashMessenger->addMessage('Usuario Cadastrado com Sucesso');
        
        $model = new Application_Model_Usuario();
        $model->incluirUsuario($this->getAllParams());
        
        $this->_helper->redirector('index');
    }
    
    public function showAction(){
       $model = new Application_Model_Usuario();
       $dados_usuario = $model->find($this->_getParam('id'));
       $this->view->assign("dados_usuario", $dados_usuario);
    }
    
    public function editAction()
   {
      $model = new Application_Model_Usuario();
      $dados_usuario = $model->find($this->_getParam('id'));
      $this->view->assign("dados_usuario", $dados_usuario);
   }
   
   public function updateAction()
   {
      $model = new Application_Model_Usuario();
      $model->alterarUsuario($this->_getAllParams());
      $this->_redirect('usuario/index');
   }


}

