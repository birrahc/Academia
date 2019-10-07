<?php

/**
 * Description of Update
 *
 * @author Birra
 */
class Update extends Conexao{
   private $Tabela;
   private $Dados;
   private $Termos;
   private $Places;
   private $Result;
    
    /** @var PDOStatement */
    private $Update;


    /** @var PDO */
    private $Conn;
    
    public function ExUpdate($Tabela, array $Dados, $Termos, $ParseString) {
        $this->Tabela = (string) $Tabela;
        $this->Dados =  $Dados;
        $this->Termos = $Termos;
        
        parse_str($ParseString, $this->Places);
        $this->getSytax();
        $this->Execute();
    }
    
    public function getResult() {
     return $this->Result;
    }
    
    public function getRunCount() {
        return $this->Update->rowCount();
    }
    
    public function FullRead($Query, $ParseString = null) {
       
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
        $this->Update = $this->Conn->prepare($this->Update);
        
    }
    
    private function getSytax(){
        foreach ($this->Dados as $Key => $Value):
            $Places[] = $Key . ' = :'.$Key;
        endforeach;
        
        $Places = implode(', ', $Places);
        $this->Update = "UPDATE {$this->Tabela} SET {$Places} {$this->Termos}";
        
    }
    
    private function Execute(){
        $this->Connect();
        try {
            
            $this->Update->execute(array_merge($this->Dados, $this->Places));//mesclando valores
            $this->Result = true;
            
        } catch (PDOException $e) {
            $this->Result = null;
            Error("<br>Erro ao atualizar dados {$e->getMessage()}</b>", $e->getCode());
            
        }
    }
}
