function validaLogin(){
	if(document.formlogin.login.value==""){
		alert("Por favor preencha o campo Login corretamente");
		document.formlogin.login.focus();
		return false;
	}
        
        
	
	if(document.formlogin.senha.value==""){
		alert("Por favor preencha o campo Senha corretamente");
		document.formlogin.senha.focus();
		return false;
	}
}


