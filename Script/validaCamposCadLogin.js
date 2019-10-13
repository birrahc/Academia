function validacadlogin(){
	if(document.formcadlogin.login.value==""){
		alert("Por favor preencha o campo Usuario");
		document.formcadlogin.login.focus();
		return false;
	}
        
        if(document.formcadlogin.login.value.length < 5){
		alert("O campo Login deve ter no minimo 5 caracteres");
		document.formcadlogin.login.focus();
		return false;
	}
        
        if(document.formcadlogin.senha.value==""){
		alert("Por favor preencha o campo Senha");
		document.formcadlogin.senha.focus();
		return false;
	}
        
        if(document.formcadlogin.repsenha.value==""){
		alert("Por favor preencha o campo Repete Senha");
		document.formcadlogin.repsenha.focus();
		return false;
	}
        
        
	
	if (document.formcadlogin.repsenha.value != document.formcadlogin.senha.value){
            alert('Os campos Senha e Repete Senha estão difirentes');
            return false;
        }
        
	if(document.formcadlogin.autorizacao.value==""){
		alert("Favor preencher o campo Autorização corretamente");
		document.formcadlogin.autorizacao.focus();
		return false;
	}
        if(document.formcadlogin.autorizacao.value!="lracademia"){
		alert("codigo de autorizão incorreta");
		document.formcadlogin.autorizacao.focus();
		return false;
	}

}