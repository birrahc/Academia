<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginDao
 *
 * @author Birra
 */
class loginDao extends Select{
    private $Destino;
    private $ExisteUsuario;
    private $PermissaoDao;
    
    function setDestino($Destino) {
        $this->Destino = $Destino;
    }

        
    function getDestino() {
        return $this->Destino;
    }
    
    function getExisteUsuario() {
        return $this->ExisteUsuario;
    }

    function getPermissaoDao() {
        return $this->PermissaoDao;
    }

    
    

    public function Logar(Login $logar) {

        $Coluna = ['id_login' => 'id_login',
                    'login' => 'login',
                    'senha'=>'senha',
                    'permissao' => 'permissao'
                ];
        $Termos = " where login='{$logar->getNome()}' and senha='{$logar->getSenha()}'";
        
        $ColumTable5 = [];
        $this->ExRead("login", $Coluna, $Termos, $ColumTable5);
        
        
    }

    public function Syntax() {
        $this->PermissaoDao=-1;
         while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             $this->ExisteUsuario=true;
             $this->PermissaoDao=$col['permissao'];
            
           endwhile;
    }

}
