<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagamentos
 *
 * @author Birra
 */
class pagamentos extends aluno{
    private $id_pgt;
    private $aluno_pgt;
    private $data_pgt;
    private $data_pgt_inicial;
    private $data_pgt_final;
    private $ref_inicial;
    private $ref_final;
    private $valor;
    private $desconto;
    private $SomaValores;
    private $TotalDesconto;
    private $Valor_total;
    private $Situacao_pgt;
            
    function getId_pgt() {
        return $this->id_pgt;
    }
    
    function getAluno_pgt() {
        return $this->aluno_pgt;
    }

    function getData_pgt() {
        return $this->data_pgt;
    }
    
    function getData_pgt_inicial() {
        return $this->data_pgt_inicial;
    }

        function getData_pgt_final() {
        return $this->data_pgt_final;
    }

        function getRef_inicial() {
        return $this->ref_inicial;
    }

    function getRef_final() {
        return $this->ref_final;
    }

    function getValor() {
        return $this->valor;
    }

    function getDesconto() {
        return $this->desconto;
    }
    
    function getSomaValores() {
        return $this->SomaValores;
    }

    function getTotalDesconto() {
        return $this->TotalDesconto;
    }

        
    function getValor_total() {
        return $this->Valor_total;
    }

        
    function getSituacao_pgt() {
        return $this->Situacao_pgt;
    }

    
    function setId_pgt($id_pgt) {
        $this->id_pgt = $id_pgt;
    }

    function setData_pgt($data_pgt) {
        $this->data_pgt = $data_pgt;
    }
    
    function setData_pgt_inicial($data_pgt_inicial) {
        $this->data_pgt_inicial = $data_pgt_inicial;
    }

        function setData_pgt_final($data_pgt_final) {
        $this->data_pgt_final = $data_pgt_final;
    }

    function setRef_inicial($ref_inicial) {
        $this->ref_inicial = $ref_inicial;
    }

    function setRef_final($ref_final) {
        $this->ref_final = $ref_final;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    
    function setValor_total($Valor_total) {
        $this->Valor_total = $Valor_total;
    }

    
    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }
    
    function setSituacao_pgt($Situacao_pgt) {
        $this->Situacao_pgt = $Situacao_pgt;
    }
    
    public function PgtEspecifico(pagamentos $pgt){
        $this->Tipo=0;
        
        $coluna5=['id_pgt'=>'id_pgt',
                  'id_aluno'=>'id_aluno',
                  'aluno_pgt'=>'aluno_pgt',
                  'nome'=>'nome',
                  'data_pgt'=>'data_pgt',
                  'ref_incial'=>'ref_incial',
                  'ref_final'=>'ref_final',
                  'valor'=>'valor',
                  'desconto'=>'desconto'
                ];
           
        $Termos5 =" inner join aluno a on aluno_pgt = a.id_aluno"
                . " where id_pgt='{$pgt->getId_pgt()}'";
             
                $ColumTable5 = [];
                    
       $this->ExRead("pagamentos p ", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
    }
    
    public function DataRelatorio(){
        $this->Tipo=8;
         $coluna5=['id_pgt'=>'id_pgt',
                  'data_pgt'=>'data_pgt'
                  ];
        
        $ColumTable5 = [];
        $Termos5 =" ";
        $this->ExRead("pagamentos ", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
       
    }

    public function  Relatorio(pagamentos $pgtdata){
        $this->Tipo=7;
        $coluna5=['id_pgt'=>'id_pgt',
                  'id_aluno'=>'id_aluno',
                  'aluno_pgt'=>'aluno_pgt',
                  'nome'=>'nome',
                  'data_pgt'=>'data_pgt',
                  'ref_incial'=>'ref_incial',
                  'ref_final'=>'ref_final',
                  'valor'=>'valor',
                  'desconto'=>'desconto'
                ];
        
        $ColumTable5 = [];
        $Termos5 ="inner join aluno a on aluno_pgt = a.id_aluno "
                . "WHERE data_pgt BETWEEN ('{$pgtdata->getData_pgt_inicial()}') AND ('{$pgtdata->getData_pgt_final()}'); ";
        $this->ExRead("pagamentos ", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
       
    }

        
    public function listaPgtAluno(pagamentos $pgt, $tipo){
        $this->Tipo=$tipo;
        
        $coluna5=['id_pgt'=>'id_pgt',
                  'id_aluno'=>'id_aluno',
                  'aluno_pgt'=>'aluno_pgt',
                  'nome'=>'nome',
                  'data_pgt'=>'data_pgt',
                  'ref_incial'=>'ref_incial',
                  'ref_final'=>'ref_final',
                  'valor'=>'valor',
                  'desconto'=>'desconto'
                ];
        if($this->Tipo==5 || $this->Tipo==6 || $this->Tipo==2 || $this->Tipo==0):    
        $Termos5 =" inner join aluno a on aluno_pgt = a.id_aluno"
                . " where id_aluno='{$pgt->getId_Aluno()}'";
        endif;        
                $ColumTable5 = [];
                    
       $this->ExRead("pagamentos p ", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
    }

    public function Syntax() {
      
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
               $this->id_pgt = $col['id_pgt'];
               $this->setId_Aluno($col['id_aluno']);
               $this->data_pgt = $col['data_pgt'];
               $this->ref_inicial=$col['ref_incial'];
               $this->ref_final = $col['ref_final'];
               $this->setNome($col['nome']);
               $this->aluno_pgt = $col['aluno_pgt'];
               $this->valor=$col['valor'];
               $this->desconto = $col['desconto'];
               $this->Valor_total = $this->getValor() - $this->getDesconto();
       
           
        
    if($this->Tipo==1 || $this->Tipo==3):
       
          
            
            
    elseif($this->Tipo==2):
        $this->setValor_total( $this->getValor() - $this->getDesconto());
                echo "<div class='dados-pgt-aluno' style='margin-left: 5%'><p>Data pagamento: " .date("d/m/Y", strtotime($this->getData_pgt()))."</p></div>"
                . "<div class='dados-pgt-aluno'><p>Mensalidade paga de: ".date("d/m/y", strtotime($this->getRef_inicial()))."</p></div>"
                . "<div class='dados-pgt-aluno'><p> Até: " .date("d/m/y", strtotime($this->getRef_final()))."</p></div>"
                . "<div class='dados-pgt-aluno' style='margin-left: 5%'><p>Valor: ". number_format($this->getValor(), 2,',','.')."</p></div>"
                . "<div class='dados-pgt-aluno'><p>Desconto: ". number_format($this->getDesconto(), 2,',','.')."</p></div>"
                . "<div class='dados-pgt-aluno'><p>Total pago: ". number_format($this->getValor_total(), 2,',','.')."</p></div>"
                . "<div id='link-pgt'>"
                . "<ul>"
                    . "<li><a href='cadastrarPagamentos.php?id_pgt={$this->getId_pgt()}'>Editar</a></li>"
                    . "<li><a href=''>Excluir</a></li>"
                . "</ul>"
                . "</div>";
            
    endif;
endwhile;
    if($this->Tipo==5):
        if($this->getValor()>0):
            if($this->getRef_final() >= date('Y-m-d')):
                 echo"<div id='ver-ativa'><b>Ativo Até:</b> ".date("d/m/Y", strtotime($this->getRef_final()))."</div>";
            else:
                echo"<div id='ver-venc'><b>A Mensalidade a pagar:</b> ".date("d/m/Y", strtotime($this->getRef_final()))."</div>";
            endif;
        else:
            echo"<div id='ver-venc' style='background-color:orange'><b>Pagamento a Registrar:</b> </div>";

        endif;
        
    elseif($this->Tipo==6):
        if($this->getValor()>0):
            if($this->getRef_final() >= date('Y-m-d')):
                 echo"<td style='width:20px; background-color:#2E8B57; border-radius:10px 2px 2px 10px;'> </td>";
            else:
                echo"<td style='width:20px; background-color:red; border-radius:10px 2px 2px 10px;'> </td>";
            endif;
        else:
            echo"<td style='width:20px; background-color:orange; border-radius:10px 2px 2px 10px;'> </td>";
        endif;
    elseif($this->Tipo==7):
        while ($col = $this->Read_1->fetch(PDO::FETCH_ASSOC)):
        
            $this->setNome($col['nome']);
            $this->valor=$col['valor'];
            $this->desconto = $col['desconto'];
            if($this->getValor()>0):
                echo"<div class='conuteudo_relatorio altura-10'><p>{$this->getNome()}</p></div>"
                  . "<div class='conuteudo_relatorio altura-10'><p>". number_format($this->getValor(), 2,',','.')."</p></div> "
                  . "<div class='conuteudo_relatorio altura-10'><p>". number_format($this->getDesconto(), 2,',','.')."</p></div>";

                $this->SomaValores = ($this->SomaValores + $this->getValor());

                $this->TotalDesconto = ($this->TotalDesconto + $this->getDesconto());

                $this->Valor_total = ($this->SomaValores - $this->TotalDesconto);
            endif;
        endwhile;
        
    elseif($this->Tipo==8):
         while ($col = $this->Read_1->fetch(PDO::FETCH_ASSOC)):
        
            $data = $col['data_pgt'];
            
            echo"<option value='{$data}'>".date("d/m/Y", strtotime($data))."</option>";
        endwhile;
    endif;

    }


}
