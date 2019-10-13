function validacao(){
	if(document.cadastrarAluno.nome.value==""){
		alert("Por favor preencha o campo Nome");
		document.cadastrarAluno.nome.focus();
		return false;
	}
        
        if(document.cadastrarAluno.nome.value.length < 6){
		alert("O campo Nome deve ter no minimo 6 caracteres");
		document.cadastrarAluno.nome.focus();
		return false;
	}
	
	if (document.cadastrarAluno.sexo[0].checked == false 
            && document.cadastrarAluno.sexo[1].checked == false) {
            alert('Marque o campo Sexo');
            return false;
        }
        
	if(document.cadastrarAluno.nascimento.value==""){
		alert("Favor preencher o campo Nascimento");
		document.cadastrarAluno.nascimento.focus();
		return false;
	}
	

}



