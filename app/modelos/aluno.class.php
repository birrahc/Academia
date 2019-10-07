<?php
/**
 * Description of aluno
 *
 * @author Birra
 */
class aluno extends Select{
    private $id_Aluno;
    private $nome;
    private $nascimento;
    private $telefone;
    private $email;
    private $Idade;
    
    function getId_Aluno() {
        return $this->id_Aluno;
    }

    function getNome() {
        return $this->nome;
    }
   
    function getNascimento() {
        return $this->nascimento;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }
    
    function getIdade() {
        return $this->Idade;
    }

    
    function setId_Aluno($id_Aluno) {
        $this->id_Aluno = $id_Aluno;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
     function setIdade($Nascimento){
        $Data_Nascimento = explode('-', $Nascimento);
        $Data = date('d/m/Y');
        $Data_Sist = explode('/', $Data);
        //Calculo
        $Anos= $Data_Sist[2]-$Data_Nascimento[0];
        if($Data_Nascimento[1] > $Data_Sist[1]):
             $Anos-=1; 
            //echo $Anos.'anos<br>';
        else:
            if($Data_Nascimento[1]==$Data_Sist[1]):
                if($Data_Nascimento[2] > $Data_Sist[0]):
                   $Anos-=1; 
                endif;
            endif;
         //echo $Anos.' anos// <br>';   
        endif;
       
        $this->Idade=$Anos;
    }
    
    public function listaAluno(aluno $id){
        
        $this->dadosAluno($id,1);
        
    }   
    
     public function dadosAluno(aluno $Aluno, $Tipo) {
        $this->Tipo=$Tipo;
        
        if($this->Tipo==1):
            $Termos2 = " where nome like '{$Aluno->getNome()}%' "
            . "ORDER BY nome ";
            
             $coluna2=['id_aluno'=>'id_aluno',
                  'nome'=>'nome', 
                  'nascimento'=>'nascimento',
                  'telefone'=>'telefone',
                  'email'=>'email'];
             
        elseif($this->Tipo == 2 || $this->Tipo == 3):
            $Termos2 = "where id_aluno ={$Aluno->getId_Aluno()}";
                
                $coluna2=['id_aluno'=>'id_aluno',
                  'nome'=>'nome',
                  'nascimento'=>'nascimento',
                  'telefone'=>'telefone',
                  'email'=>'email'];
        endif;
        
       
       
       $ColumTable2=[];

        $this->ExRead('aluno', $coluna2, $Termos2, $ColumTable2, $this->Tipo);
    }

    public function Syntax() {
        if($this->Tipo==1):
            echo"<table>"
              . "<tr>";
               while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   
                   $this->id_Aluno = $col['id_aluno'];
                   $this->nome = $col['nome'];
                    echo"<td><a href='alunos.php?aluno={$this->getId_Aluno()}'>{$this->getNome()}</a>  </td> "
              . "</tr>";
               endwhile;
            echo"</table>";
        
            elseif($this->Tipo==2):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->id_Aluno = $col['id_aluno'];
                    $this->nome = $col['nome'];
                    $this->nascimento = $col['nascimento'];
                    $this->setIdade($col['nascimento']);
                    $this->telefone=$col['telefone'];
                    $this->email=$col['email'];
                    
                endwhile;
                
                echo "<div>"
                      . "<p>{$this->getNome()}</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p>".date('d/m/Y',  strtotime($this->getNascimento()))."</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p>{$this->getIdade()} anos</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p>{$this->getTelefone()}</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p> {$this->getEmail()}</p>"; 
                  echo"</div>";
            elseif($this->Tipo==3):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->id_Aluno = $col['id_aluno'];
                    $this->nome = $col['nome'];
                    $this->nascimento = $col['nascimento'];
                    $this->setIdade($col['nascimento']);
                    $this->email=$col['email'];
                    $this->telefone=$col['telefone'];
                endwhile;
            endif;
     
    
    }


}
