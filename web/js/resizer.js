//Guilherme Serrano - Ferramenta para aumentar e reduzir o tamanho da fonte (jQuery)
//www.odesenvolvedor.com.br
//andafter.org

jQuery(document).ready(function(){

	var fonte = 15;
    
    jQuery('.mais').click(function(){
		if(fonte<19){
			fonte = fonte+1;
			jQuery('.title a, .post-single, #content .title').css({'font-size':fonte+'px'});
		}
    });
    
    jQuery('.menos').click(function(){
		if(fonte>9){
			fonte = fonte-1;
			jQuery('.title a, .post-single, #content .title').css({'font-size':fonte+'px'});
		}
    });
    
    jQuery('.igual').click(function(){
    	if(fonte!=15) {
    		fonte = 15;
    		//jQuery('body').css({'font-size':fonte+'px'});
    		jQuery('.title a, .post-single, #content .title').removeAttr('style');
    	};
    });

    //verifico se existe hash na url (caso não tenha, não preciso fazer o scroll)
    /*if(window.location.hash) {
        //pego a hash
        var hash = window.location.hash
        //animo até meu elemento
        jQuery('html, body').animate({
            scrollTop: jQuery(hash).offset().top
        }, 2000);
    }*/

});
