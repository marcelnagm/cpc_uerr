<?
//if(isset($_POST["nboleto"]))$nboleto=$_POST["nboleto"];//declaracao da variavel da acao passada pelo link da pagina anterior
//if(isset($_POST["nome"]))$nome=$_POST["nome"];
//if(isset($_POST["cpf"]))$cpf=$_POST["cpf"];
//if(isset($_POST["curso"]))$curso=$_POST["curso"];
//if(isset($_POST["datavence"]))$datavence=$_POST["datavence"];
//if(isset($_POST["valor"]))$valor=$_POST["valor"];
//if(isset($_POST["localprova"]))$localprova=$_POST["localprova"];
//if(isset($_POST["lingua"]))$lingua=$_POST["lingua"];
//if(isset($_POST["especial3"]))$especial3=$_POST["especial3"];
//if(isset($_POST["nome_certame"]))$nome_certame_inscrito=$_POST["nome_certame"];


//$nosso_numero='1394897'.$nboleto;

//$dadosboleto["data_vencimento"] = $datavence; // Data de Vencimento do Boleto
//$dadosboleto["data_documento"] = date('d/m/Y'); // Data de emissão do Boleto
//$dadosboleto["data_processamento"] = date('d/m/Y');; // Data de processamento do boleto (opcional)
//$dadosboleto["valor_boleto"] = $valor; 	// Valor do Boleto, com vírgula, sempre com duas casas depois da virgula

//opcionais
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";		
$dadosboleto["uso_banco"] = ""; 	
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";

//dados da sua conta e convênio
$dadosboleto["agencia"] = "03797"; // Num da agencia, sem digito
$dadosboleto["conta"] = "6269"; 	// Num da conta, sem digito
//convenio e contrato podem ser vistos no gerenciador financeiro do BB
//$dadosboleto["convenio"] = "00000";  // Num do convênio
$dadosboleto["convenio"] = "00000";  // Num do convênio
$dadosboleto["contrato"] = ""; // Num do seu contrato

/*
FORMATAÇÃO DO NOSSO NUMERO
*/

$dadosboleto["formatacao_nosso_numero"] = "2";

/*
#################################################
Sei que isso funciona pra carteira 18....pras outras, deixe opção 1

1	=	Formatação gerada: Num do convenio + 5 digitos informados por você + digito verificador
		(neste caso, informe de 1 a 5 digitos somente)

2	=	para 17 digitos informados por você ( de 1 a 99999999999999999)

Se você não entendeu, deixe a opção 1 e informe até 5 digitos no nosso numero

Nosso número:
de 1 a 99999 para opção de 12 dígitos
de 1 a 99999999999999999 para opção de 17 dígitos
#################################################
*/

$dadosboleto["nosso_numero"] = $nosso_numero;
$dadosboleto["numero_documento"] = $nosso_numero;	// Num do pedido ou nosso numero
$dadosboleto["carteira"] = "18";  // Código da Carteira 18 - 17 ou 11
$dadosboleto["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)

/*
SEUS DADOS
*/
$dadosboleto["cpf_cnpj"] = "008.240.695/0001-90";
$dadosboleto["endereco"] = "Av Sete de Setembro, Nº 231";
$dadosboleto["cidade"] = "Boa Vista - RR";
$dadosboleto["cedente"] = "Universidade Estadual de Roraima - UERR";

/*
DADOS DO SEU CLIENTE
*/
$dadosboleto["sacado"] = $nboleto." ".$nome;
$dadosboleto["endereco1"] = $cpf;
$dadosboleto["endereco2"] = "";//"Cidade de prova: ".$localprova;
$dadosboleto["endereco3"] = "Idioma estrangeiro para a prova: ".$lingua;

/*
INSTRUÇÕES PARA O CLIENTE
*/
$dadosboleto["instrucoes"] = $nome_certame_inscrito;
$dadosboleto["instrucoes1"] = $curso; 
$dadosboleto["instrucoes2"] = "Idioma estrangeiro para a prova: ".$lingua;
$dadosboleto["instrucoes3"] = "- Em caso de d&uacute;vidas entre em contato conosco: e-mail: cpc@uerr.edu.br | Tel: 2121-0931";
$dadosboleto["instrucoes4"] = "- <b>Sr. Caixa, n&atilde;o receber ap&oacute;s o vencimento</b>";
$dadosboleto["instrucoes5"] = $especial3;

//SÓ MEXA DEPOIS DISSO SE VOCÊ FOR EXPERIENTE EM PHP
//echo "<center><font color=read size=+2><a href='../opcoes.php'><< Menu Principal</a></font>";
include("include/funcoesbb.php"); 
include("include/layoutbbhtml.php");

?>
