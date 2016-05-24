jQuery(document).ready(function(){
  var highContrast = false;
    // Append the stylesheet on page load
    $("#switch").click(function () {

        if ((highContrast == false)) {
            jQuery('head').append('<link rel="stylesheet" href="/wp-content/themes/uerr/lib/css/contrast.css" type="text/css" id="contraste"/>');
            jQuery('#switch').text('Desativar contraste');
            highContrast = true;
        }
        else {
            // remove the high-contrast style
            jQuery('#contraste').remove();
            jQuery('#switch').text('Ativar contraste');
            highContrast = false;
        }
        
    });

});

