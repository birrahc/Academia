<?php

/**
 * <b>Read.class:</b>
 * Classe responsavel por leituras genericas no banco de dados
 * 
 * @copyright (c) 2017, Júnior César
 */
abstract class Select extends Conexao{
    private $Select;
    private $Termos;
    private $Tabela;
    public $Colunas;
    private $ColumTable;
    public $Tipo;
    private $Result;
    /** @var PDOStatement */
    public $Read;
    public $Read_1;
    
    
    /** @var PDO */
    private $Conn;
    
    public function ExRead($Tabela, array $Colunas, $Termos = null, array $ColumTable=null,$Tipo=null) {
        $this->Tabela = (string) $Tabela;
        $this->Colunas = $Colunas;
        $this->Termos = $Termos;
        $this->ColumTable = $ColumTable;
        $this->Tipo = (int)$Tipo;
        
        $this->Execute();
    }
    
    public function getResult() {
     return $this->Result;
    }
    
    public function getRunCount() {
        return $this->Read->rowCount();
    }
    
   
     /**
     ****************************************
     ************* PRIVATE METHODS **********
     **************************************** 
     */
    abstract function Syntax();
    
    private function Connect(){
        $Coluna= implode(' ,', array_merge($this->Colunas));
        $this->Select = "SELECT {$Coluna} FROM {$this->Tabela} {$this->Termos}";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->query($this->Select);
        $this->Read_1 = $this->Conn->query($this->Select);
    }
    
   
    
    private function Execute(){
        $this->Connect();
        $this->Syntax();
        try {
            $this->Read->execute();
            $this->Read_1->execute();
            $this->Result = $this->Read->fetchAll();
            
            } catch (PDOException $e) {
                    $this->Read=null;
                    Error("<br>Erro ao Ler dados {$e->getMessage()}</b>", $e->getCode());
                }
    }
}
