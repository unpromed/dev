<?php

class Application_Model_Usuario
{
    private $id_usuario;
    private $nom_usuario;
    private $num_ra_matricula;
    private $num_rg;
    private $num_cpf;
    private $num_telefone;
    private $num_celular;
    private $dt_nascimento;
    private $nom_mae;
    private $desc_campus;
    private $desc_email;
    private $flg_status_usuario;
    private $desc_senha;
    private $id_usu_sist;
    private $flg_tipo_usuario;
    private $delega_poder;
    private $dt_inclusao;
    private $dt_validade_senha;
    private $dt_alteracao;
    private $dt_validade_login;

    public function incluirUsuario(){
        $dao = new Application_Model_DbTable_Usuario();
        
    }
    
    public function alterarUsuario(){
        $dao = new Application_Model_DbTable_Usuario();
    }
    
    public function pesquisarUsuario($where = null, $order = null, $limit = null){
        $dao = new Application_Model_DbTable_Usuario();
        $select = $dao->select()->from($dao)->order($order)->limit($limit);
        if(!is_null($where)){
            $select->where($where);
        }
        return $dao->fetchAll($select)->toArray();
    }
}

?>