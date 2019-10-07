<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InsercaoBanco
 *
 * @author Birra
 */
class InsercaoBanco extends Conexao {
    private $Tabela;
    private $Dados;
    private $Result;
    
    private $Mensagem;
    
    private $Inserir;
    
    private $Conectar;
    
    public function ExecutInserir($Tabela, array $Dados ){
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        
        $this->getSytax();
        $this->Execute();
    }
    
    function getMensagem() {
        return $this->Mensagem;
    }

        
    function getResult() {
        return $this->Result;
    }

    
    private function ConetarBanco(){
        $this->Conectar = parent::getConn();
        $this->Inserir = $this->Conectar->prepare($this->Inserir);
    }
    
    private function getSytax(){
        $Colunas = implode(', ', array_keys($this->Dados));
        $Valores = ':'.implode(', :', array_keys($this->Dados));
        
        $this->Inserir = "INSERT INTO {$this->Tabela} ({$Colunas}) VALUES ({$Valores})";
        
    }
    
    private function Execute(){
        $this->ConetarBanco();
        $this->Mensagem="<script> alert('Cadastrado com sucesso!')</script>";
        try {
            $this->Inserir->execute($this->Dados);
            $this->Result = $this->Conectar->lastInsertId();
        } catch (Exception $ex) {
            $this->Mensagem=("Erro ao inserir dados! cod:{$ex->getCode()} Linha: {$ex->getLine()} arquivo:{$ex->getFile()}");
            
        }
    }
}
