<?php
/**
 * Description of login
 *
 * @author Birra
 */
class login extends aluno {
    private $Senha;
    private $RepeteSenha;
    private $Pemissao;
    private $VerificaLogin;
            
    function getSenha() {
        return $this->Senha;
    }
    
    function getRepeteSenha() {
        return $this->RepeteSenha;
    }

    function getPemissao() {
        return $this->Pemissao;
    }

    function setSenha($Senha) {
        $this->Senha = md5($Senha);
    }
    function setRepeteSenha($RepeteSenha) {
        $this->RepeteSenha = md5($RepeteSenha);
    }

    function setPemissao($Pemissao) {
        $this->Pemissao = ((int) $Pemissao ? $Pemissao:'Favor preencher com nuneros');
    }
    
    function getVerificaLogin() {
        return $this->VerificaLogin;
    }

        
    public function VerificaUsuario(login $login){
        $Coluna = [
                    'login' => 'login'
                  ];
        $Termos = " where login='{$login->getNome()}'";
        
        $ColumTable5 = [];
        $this->ExRead("login", $Coluna, $Termos, $ColumTable5);
        
    }

    public function Syntax() {
           
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             $this->VerificaLogin = true;
        endwhile;
    }

}
