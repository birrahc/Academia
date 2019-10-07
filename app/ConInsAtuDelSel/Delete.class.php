<?php

/**
 * <b>Delete.class:</b>
 * Classe responsavel por Deletar genericamente no banco de dados
 * 
 * @copyright (c) 2017, Júnior César
 */
class Delete extends Conexao {
    private $Tabela;
    private $Termos;
    private $Places;
    private $Result;
    
    /** @var PDOStatement */
    private $Delete;


    /** @var PDO */
    private $Conn;
    
    public function ExeDelete($Tabela, $Termos, $ParseString) {
        $this->Tabela=(string)$Tabela;
        $this->Termos=(string)$Termos;
        parse_str($ParseString, $this->Places);
        
        $this->getSytax();
        $this->Execute();
        
    }
    
    public function getResult() {
     return $this->Result;
    }
    
    public function getRunCount() {
        return $this->Delete->rowCount();
    }
    
    
    public function setPlaces($ParseString){
        parse_str($ParseString, $this->Places); //parse_str transforma em array
        $this->getSytax();
        $this->Execute();
    }

        /**
     ****************************************
     ************* PRIVATE METHODS **********
     **************************************** 
     */
    
    private function Connect(){
        $this->Conn = parent::getConn();
        $this->Delete = $this->Conn->prepare($this->Delete);
        
    }
    
    private function getSytax(){
        $this->Delete="DELETE FROM {$this->Tabela} {$this->Termos}";
    }
    
    private function Execute(){
        $this->Connect();
        try {
            $this->Delete->execute($this->Places);
            $this->Result=true;
        } catch (PDOException $e) {
            $this->Result=null;
            Error("<br>Erro ao Deletar dados {$e->getMessage()}</b>", $e->getCode());
            
        }
        
    }
}
