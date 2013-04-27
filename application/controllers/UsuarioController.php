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
    
    public function editAction(){
        
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
        /*mostra os detalhes do Sim*/
        $model = new Application_Model_Sim();
        $sim = $model->find($this->_getParam('id'));
        $this->view->assign('sim', $sim);
        
        $port = $this->_getParam('port');
        $card = $this->_getParam('card');
        
        $where='card_add = "'.$card.'" AND port_num ="'.$port.'"';
        $sms = new Application_Model_Sms();
        $outgoing = $sms->count("outgoing",$where);
        $incoming = $sms->count("incoming",$where);
        $this->view->outgoing=$outgoing;
        $this->view->incoming=$incoming;
        
        $where='card_add = "'.$card.'" AND port_num ="'. $port.'" AND result = "confirmation_val-0" OR result = "confirmation_val-112"' ;
        
        $ok = $sms->count("outgoing", $where);
        $this->view->ok=$ok;
        
        /*
         * if($result =='confirmation_val-0' OR $result =='confirmation_val-112'){
         */
        
        
    }


}

