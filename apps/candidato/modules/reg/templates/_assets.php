<?php use_stylesheet('/sfDoctrinePlugin/css/global.css', 'first') ?> 
<?php use_stylesheet('/sfDoctrinePlugin/css/default.css', 'first') ?> 
<?php use_javascript('/js/jquery.maskedinput-1.3.js') ?> 
<script>

    $(document).ready(function () {
        $("#data_nasc").mask("99/99/9999");
        $("#cep").mask("99999-999");
        $(".sf_admin_form_field_password_confirm").keyup(function () {
            var pass = $("#tb_candidato_password").val();
            var passconfirm = $("#tb_candidato_password_confirm").val();
            if (pass == passconfirm) {
                $("#tb_candidato_password_strength").val('SENHAS IGUAIS');
            } else {
                $("#tb_candidato_password_strength").val('SENHAS DIFERENTES');
            }


        });
        $(".sf_admin_form_field_password").keyup(function () {
            
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var pwd =$("#tb_candidato_password").val();
            if (pwd.length == 0) {
            } else if (false == enoughRegex.test(pwd)) {
                $("#tb_candidato_password_strength").val('Mais Caracteres necessários');
            } else if (strongRegex.test(pwd)) {
                $("#tb_candidato_password_strength").val('Senha Forte');
            } else if (mediumRegex.test(pwd)) {
                $("#tb_candidato_password_strength").val('Senha Média');
            } else {
                $("#tb_candidato_password_strength").val('Senha Fraca');
            }
        });
    });
</script>

<?php
