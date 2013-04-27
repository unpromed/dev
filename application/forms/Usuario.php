<?php

class Application_Form_Usuario extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        
        $this->addElement('text','nom_usuario',array(
            'label' =>  'Nome do Usuario',
            'required'  =>  true,
            'filters'   =>  array('StringTrim'),
        ));
        
        $this->addElement('text','num_matricula_ra',array(
            'label' =>  'Seu Endereço de Email',
            'required'  =>  true,
            'filters'   =>  array('StringTrim'),
            'validators'    =>  array('EmailAddress',)
        ));
        
        $this->addElement('text','email',array(
            'label' =>  'Seu Endereço de Email',
            'required'  =>  true,
            'filters'   =>  array('StringTrim'),
            'validators'    =>  array('EmailAddress',)
        ));
        
        $this->addElement('submit', 'enviar', array(
            'ignore'    =>  true,
            'label'     =>  'Enviar Cadastro',
        ));
    }


}

