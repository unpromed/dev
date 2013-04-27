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

    public function incluirUsuario(array $request){
        $dao = new Application_Model_DbTable_Usuario();
        $date = Zend_Date::now()->toString('yyyy-MM-dd');
        $dados = array(
            /*
             * formato:
             * 'nome_campo => valor,
             */
            'nom_usuario'           =>  $request['nom_usuario'],
            'num_ra_matricula'      =>  $request['num_ra_matricula'],
            'num_rg'                =>  $request['num_rg'],
            'num_cpf'               =>  $request['num_cpf'],    
            'num_telefone'          =>  $request['num_telefone'],            
            'num_celular'           =>  $request['num_celular'],
            'dt_nascimento'         =>  $request['dt_nascimento'],
            'nom_mae'               =>  $request['nom_mae'],
            'desc_campus'           =>  $request['desc_campus'],
            'desc_email'            =>  $request['desc_email'],
            'flg_status_usuario'    =>  $request['flg_status_usuario'],
            'desc_senha'            =>  $request['desc_senha'],
            //'id_usu_sist'           =>  $request['id_usu_sist'],//usuario que alterou o cadastro (quem esta logado)
            'flg_tipo_usuario'      =>  $request['flg_tipo_usuario'],
            'delega_poder'          =>  $request['delega_poder'],
            'dt_inclusao'           =>  $request['dt_inclusao'],
            'dt_validade_senha'     =>  $request['dt_validade_senha'],
            'dt_alteracao'          =>  $date,
            'dt_validade_login'     =>  $request['dt_validade_login']
        );
        return $dao->insert($dados);
    }
    
    public function alterarUsuario(array $request){
        $dao = new Application_Model_DbTable_Usuario();
        $date = Zend_Date::now()->toString('yyyy-MM-dd');
        $dados = array(
            /*
             * formato:
             * 'nome_campo => valor,
             */
            'nom_usuario'           =>  $request['nom_usuario'],
            'num_ra_matricula'      =>  $request['num_ra_matricula'],
            'num_rg'                =>  $request['num_rg'],
            'num_cpf'               =>  $request['num_cpf'],    
            'num_telefone'          =>  $request['num_telefone'],            
            'num_celular'           =>  $request['num_celular'],
            'dt_nascimento'         =>  $request['dt_nascimento'],
            'nom_mae'               =>  $request['nom_mae'],
            'desc_campus'           =>  $request['desc_campus'],
            'desc_email'            =>  $request['desc_email'],
            'flg_status_usuario'    =>  $request['flg_status_usuario'],
            'desc_senha'            =>  $request['desc_senha'],
            'id_usu_sist'           =>  $request['id_usu_sist'],
            'flg_tipo_usuario'      =>  $request['flg_tipo_usuario'],
            'delega_poder'          =>  $request['delega_poder'],
            'dt_inclusao'           =>  $request['dt_inclusao'],
            'dt_validade_senha'     =>  $request['dt_validade_senha'],
            'dt_alteracao'          =>  $date,
            'dt_validade_login'     =>  $request['dt_validade_login']
        );
        $where = $dao->getAdapter()->quoteInto("id_usuario = ?", $request['id_usuario']);
        $dao->update($dados, $where);
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