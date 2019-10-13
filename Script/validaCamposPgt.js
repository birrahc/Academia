function validaPgt(){

    if(document.cadastrarPgt.ref_incial.value==""){
	alert("As Datas precisam estar preenchidas");
	document.cadastrarPgt.ref_incial.focus();
	return false;
    }
	
    if(document.cadastrarPgt.ref_final.value==""){
	alert("As Datas precisam estar preenchidas");
	document.cadastrarPgt.ref_final.focus();
	return false;
    }
    
    if(document.cadastrarPgt.valor.value=="" || document.cadastrarPgt.valor.value<=0){
	alert("O campo Valor não pode estar vazio");
	document.cadastrarPgt.valor.focus();
	return false;
    }
        
}

