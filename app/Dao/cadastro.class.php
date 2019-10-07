<?php
/**
 * Description of cadastro
 *
 * @author Birra
 */
class cadastro {
    
    private $UltimoRegistro;
    function getUltimoRegistro() {
        return $this->UltimoRegistro;
    }
    
     //==============================================================================================
    //--------------- Cadastro de Login ----------------------
    //==============================================================================================
    public function CadastrarLogin(login $cad_log){
        
        $DadosLogin=['login'=>$cad_log->getNome(), 
                     'senha'=>$cad_log->getSenha() 
                    ];
        
        $CadastrarLogin= new InsercaoBanco();
        $CadastrarLogin->ExecutInserir("login", $DadosLogin);
    }

        
    //============= Cadastro de Alunos ===========//
    public function CadastrarAluno(aluno $aluno) {
        $DadosAluno=['nome'=>$aluno->getNome(), 
                     'nascimento'=>$aluno->getNascimento(),
                     'telefone'=>$aluno->getTelefone(),
                     'email'=>$aluno->getEmail()
                    ];
        
        $Cadastraraluno= new InsercaoBanco();
        $Cadastraraluno->ExecutInserir("aluno", $DadosAluno);
        $this->UltimoRegistro= $Cadastraraluno->getResult();
        
    }
    
    //============= Cadastro de Evento ===========//
    public function CadastrarEvento(eventos $evento) {
        $DadosEvento=['evento_nome'=>$evento->getEvento_nome(),
                      'data_evento'=>$evento->getData_evanto(),
                      'hora'=>$evento->getHorario(),
                      'evento_status'
                    ];
        
        $CadastrarEven= new InsercaoBanco();
        $CadastrarEven->ExecutInserir("professor", $DadosEvento);
        var_dump($CadastrarProf);
    }
    
    //============= Cadastro de Turma ===========//
    public function CadastrarTurma(turma $turma) {
        $DadosTurma=['turma_nome'=>$turma->getTurma_nome(),
                    'valor'=>$turma->getMensalidade()];
        
        $CadastrarTurma= new InsercaoBanco();
        $CadastrarTurma->ExecutInserir("turma", $DadosTurma);
        var_dump($CadastrarTurma);
    }
    
    //============= Cadastro de Pagamentos ===========//
    public function CadastrarPagamentos(pagamentos $pgt) {
        $DadosPagamentos=['aluno_pgt'=>$pgt->getId_Aluno(),
                          'data_pgt'=>$pgt->getData_pgt(),
                          'ref_incial'=>$pgt->getRef_inicial(),
                          'ref_final'=>$pgt->getRef_final(),
                          'valor'=>$pgt->getValor(),
                          'desconto'=>$pgt->getDesconto()];
        
        $CadastrarPagamentos= new InsercaoBanco();
        $CadastrarPagamentos->ExecutInserir(" pagamentos ", $DadosPagamentos);
        var_dump($CadastrarPagamentos);
    }
    
    //============= Cadastro de Atividade Semana ===========//
    public function CadastrarAtividadeSemana(diasSemana $dia, atividade $atividade) {
        $DadosAtividadeSemana=['dia_semana'=>$dia->getId_semana(),
                    'atividades'=>$atividade->getId_atividade()
                    ];
        
        $CadastrarAtividadeSemana= new InsercaoBanco();
        $CadastrarAtividadeSemana->ExecutInserir("atividade_semana", $DadosAtividadeSemana);
        var_dump($CadastrarAtividadeSemana);
    }
    
}

