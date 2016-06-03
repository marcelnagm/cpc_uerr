<?php
$nboleto= $inscricao->getBoleto();//declaracao da variavel da acao passada pelo link da pagina anterior
$nome=$inscricao->getTbCandidato()->getNome();
$cpf= $inscricao->getTbCandidato()->getCpf();
//$curso=$_POST["curso"];
$datavence=$inscricao->getTbVaga()->getDataVencimento();
$valor=(string)$inscricao->getTbVaga()->getValor();
$valor = str_replace(',', '',$valor);
//if(isset($_POST["localprova"]))$localprova=$_POST["localprova"];
$lingua=$inscricao->getTbIdioma();
//if(isset($_POST["especial3"]))$especial3=$_POST["especial3"];
$nome_certame_inscrito=$inscricao->getTbCertame();

$nosso_numero='1394897'.$nboleto;

$dadosboleto["data_vencimento"] = $datavence; // Data de Vencimento do Boleto
$dadosboleto["data_documento"] = date('d/m/Y'); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date('d/m/Y');; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor; 	// Valor do Boleto, com vírgula, sempre com duas casas depois da virgula

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


/*
C�digo reestruturado por: Daniel William Schultz
Email: hospedavip@hospedavip.com

Este c�digo foi construido atrav�s de reutiliza��o de c�digos do PHPBoleto para BB.
Fique livre pra mudar este programa, redistribuir de gra�a, vender...
S� pe�o que n�o roube os creditos, que pertencem em grande parte � equipe do PHPBoleto...E em �nfima parte, � mim.

Os valores ai embaixo podem ser colocados manualmente, atrav�s de formul�rio com POST, GET
Ou retirados de uma tabela mysql, pgsql....ou qualquer nome-sql

Ensinar isso seria demais, vai em www.php.net e come�e a ler o manual ;o)
*/

//formatando os dados
$codigobanco = "001";
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

/*
Linha digitavel
*/
//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//convenio tem 6 digitos
$convenio = formata_numero($dadosboleto["convenio"],6,0,"convenio");
//agencia � sempre 4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta � sempre 8 digitos
$conta = formata_numero($dadosboleto["conta"],8,0);

$carteira = $dadosboleto["carteira"];

if ($dadosboleto["formatacao_nosso_numero"] == "1") {
	// 12 d�gitos
	$nossonumero = formata_numero($dadosboleto["nosso_numero"],5,0);
	$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira");
	$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira";
	//recolocando o nosso numero com DV
	$nossonumero = $convenio . $nossonumero ."-". modulo_11("$convenio$nossonumero");
	$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
}

if ($dadosboleto["formatacao_nosso_numero"] == "2") {
	// 17 d�gitos
	$nservico = "18";
	$nossonumero = formata_numero($dadosboleto["nosso_numero"],17,0);
	$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$nservico");
	$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$nservico";
	$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
}

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo ;
$dadosboleto["nosso_numero"] = $nossonumero."-".$dv; //acrescentar digito para boleto do bb

/*
FUN��ES MINHAS ;)
*/

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "valor") {
		/*
		retira as virgulas
		formata o numero
		preenche com zeros
		*/
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo = "convenio") {
		while(strlen($numero)<$loop){
			$numero = $numero . $insert;
		}
	}
	return $numero;
}

/*
Fun��o gr�tis, dispon�vel em http://www.netdinamica.com.br/boleto/gratis.php
*/

/*
*******************************************************************************************************************************
*	Rotina para gerar c�digos de barra padr�o 2of5 .
*	Luciano Lima Silva 09/01/2003
*	netdinamica@netdinamica.com.br
*	Site: www.netdinamica.com.br
*	
*	Este script foi testado com o leitor de c�digo de barras e esta OK.
*   Tenho o sistema de boleto</b>, para o ITAU, UNIBANCO, CAIXA, BBV, BRADESCO, HSBC, UNIBANCO, REAL e varios outros, em PHP ou ASP
*   Para maiores informa��es entre em contato boleto@netdinamica.com.br ou visite: www.netdinamica.com.br/boleto
*	 
*	Basta chamar a fun��o fbarcode("01202") com o valor
**********************************************************************************************************************************
*/

function fbarcode($valor){

$fino = 1 ;
$largo = 3 ;
$altura = 50 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){ 
    for($f2=9;$f2>=0;$f2--){  
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra


//Guarda inicial
?><img src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=1?> height=<?=$altura?> border=0> 
  <?
} //Fim da fun��o

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

/*
FUN��ES REAPROVEITADAS/CORRIGIDAS DO PHPBOLETO
*/

/*
Fator vencimento, phpboleto
*/
function fator_vencimento($data) {
	$data = split("/",$data);
	$ano = $data[2];
	$mes = $data[1];
	$dia = $data[0];
    return(abs((_dateToDays("1997","10","07")) - (_dateToDays($ano, $mes, $dia))));
}

function _dateToDays($year,$month,$day)
{
    $century = substr($year, 0, 2);
    $year = substr($year, 2, 2);
    if ($month > 2) {
        $month -= 3;
    } else {
        $month += 9;
        if ($year) {
            $year--;
        } else {
            $year = 99;
            $century --;
        }
    }

    return ( floor((  146097 * $century)    /  4 ) +
            floor(( 1461 * $year)        /  4 ) +
            floor(( 153 * $month +  2) /  5 ) +
                $day +  1721119);
}

/*
#################################################
FUN��O DO M�DULO 10 RETIRADA DO PHPBOLETO

ESTA FUN��O PEGA O D�GITO VERIFICADOR DO PRIMEIRO, SEGUNDO
E TERCEIRO CAMPOS DA LINHA DIGIT�VEL
#################################################
*/
function modulo_10($num) { 
	$numtotal10 = 0;
	$fator = 2;
 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial10[$i] = $numeros[$i] * $fator;
		$numtotal10 .= $parcial10[$i];
		if ($fator == 2) {
			$fator = 1;
		}
		else {
			$fator = 2; 
		}
	}
	
	$soma = 0;
	for ($i = strlen($numtotal10); $i > 0; $i--) {
		$numeros[$i] = substr($numtotal10,$i-1,1);
		$soma += $numeros[$i]; 
	}
	$resto = $soma % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;
}

/*
#################################################
FUN��O DO M�DULO 11 RETIRADA DO PHPBOLETO

MODIFIQUEI ALGUMAS COISAS...

ESTA FUN��O PEGA O D�GITO VERIFICADOR:

NOSSONUMERO
AGENCIA
CONTA
CAMPO 4 DA LINHA DIGIT�VEL
#################################################
*/

function modulo_11($num, $base=9, $r=0) {
	$soma = 0;
	$fator = 2; 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial[$i] = $numeros[$i] * $fator;
		$soma += $parcial[$i];
		if ($fator == $base) {
			$fator = 1;
		}
		$fator++;
	}
	if ($r == 0) {
		$soma *= 10;
		$digito = $soma % 11;
		
		//corrigido
		if ($digito == 10) {
			$digito = "X";
		}

		/*
		alterado por mim, Daniel Schultz

		Vamos explicar:

		O m�dulo 11 s� gera os digitos verificadores do nossonumero,
		agencia, conta e digito verificador com codigo de barras (aquele que fica sozinho e triste na linha digit�vel)
		s� que � foi um rolo...pq ele nao podia resultar em 0, e o pessoal do phpboleto se esqueceu disso...
		
		No BB, os d�gitos verificadores podem ser X ou 0 (zero) para agencia, conta e nosso numero,
		mas nunca pode ser X ou 0 (zero) para a linha digit�vel, justamente por ser totalmente num�rica.

		Quando passamos os dados para a fun��o, fica assim:

		Agencia = sempre 4 digitos
		Conta = at� 8 d�gitos
		Nosso n�mero = de 1 a 17 digitos

		A unica vari�vel que passa 17 digitos � a da linha digitada, justamente por ter 43 caracteres

		Entao vamos definir ai embaixo o seguinte...

		se (strlen($num) == 43) { n�o deixar dar digito X ou 0 }
		*/
		
		if (strlen($num) == "43") {
			//ent�o estamos checando a linha digit�vel
			if ($digito == "0" or $digito == "X" or $digito > 9) {
					$digito = 1;
			}
		}
		return $digito;
	} 
	elseif ($r == 1){
		$resto = $soma % 11;
		return $resto;
	}
}

/*
Montagem da linha digit�vel - Fun��o tirada do PHPBoleto
N�o mudei nada
*/
function monta_linha_digitavel($linha) {
    // Posi��o 	Conte�do
    // 1 a 3    N�mero do banco
    // 4        C�digo da Moeda - 9 para Real
    // 5        Digito verificador do C�digo de Barras
    // 6 a 19   Valor (12 inteeeiros e 2 decimais)
    // 20 a 44  Campo Livre definido por cada banco

    // 1. Campo - composto pelo c�digo do banco, c�digo da mo�da, as cinco primeiras posi��es
    // do campo livre e DV (modulo10) deste campo
    $p1 = substr($linha, 0, 4);
    $p2 = substr($linha, 19, 5);
    $p3 = modulo_10("$p1$p2");
    $p4 = "$p1$p2$p3";
    $p5 = substr($p4, 0, 5);
    $p6 = substr($p4, 5);
    $campo1 = "$p5.$p6";

    // 2. Campo - composto pelas posi�oes 6 a 15 do campo livre
    // e livre e DV (modulo10) deste campo
    $p1 = substr($linha, 24, 10);
    $p2 = modulo_10($p1);
    $p3 = "$p1$p2";
    $p4 = substr($p3, 0, 5);
    $p5 = substr($p3, 5);
    $campo2 = "$p4.$p5";

    // 3. Campo composto pelas posicoes 16 a 25 do campo livre
    // e livre e DV (modulo10) deste campo
    $p1 = substr($linha, 34, 10);
    $p2 = modulo_10($p1);
    $p3 = "$p1$p2";
    $p4 = substr($p3, 0, 5);
    $p5 = substr($p3, 5);
    $campo3 = "$p4.$p5";

    // 4. Campo - digito verificador do codigo de barras
    $campo4 = substr($linha, 4, 1);

    // 5. Campo composto pelo valor nominal pelo valor nominal do documento, sem
    // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
    // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
    $campo5 = substr($linha, 5, 14);

    return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
}


?>
<HTML><HEAD><TITLE>Boleto - <?=$dadosboleto["instrucoes"];?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2800.1400" name=GENERATOR></HEAD>
<BODY >
<STYLE>
BODY {
FONT: 10px Arial
}
.Titulo {
FONT: 9px Arial Narrow; COLOR: navy
}
.Campo {
FONT: 10px Arial; COLOR: black
}
TD.Normal {
FONT: 12px Arial; COLOR: black
}
TD.Titulo {
FONT: 9px Arial Narrow; COLOR: navy
}
TD.Campo {
FONT: bold 10px Arial; COLOR: black
}
TD.CampoTitulo {
FONT: bold 13px Arial; 
COLOR: navy;
text-align:center;
}
TD.CampoTitulo_1 {
FONT: bold 13px Arial; 
COLOR: navy;
text-align:center;
}
</STYLE>

<DIV align=center>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD class=normal>
<DIV align=center><B><font size="1">O pagamento deste boleto também poderá ser efetuado 
nos terminais de Auto-Atendimento BB.</font></B></DIV>
<!--<P><B>Retornar <a href="http://www.uerr.edu.br/vestibular">clique aqui</a></B><BR>-->
<OL>
</OL></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD class=campo width="20%"><font size="+1"><img src="../boleto/imagens/imgbb.gif" border="0" alt="Banco do Brasil"></font></TD>
<TD width=3><IMG height="22" src="../boleto/imagens/imgbrrazu.gif" width="2" border="0"></TD>
<TD class="campotitulo_1">001-9</TD>
<TD width=3><IMG height=22 
src="../boleto/imagens/imgbrrazu.gif" width=2 border=0></TD>
<TD class=campotitulo width=464 align=right><?=$dadosboleto["linha_digitavel"]?></TD></TR>
<TR>
<TD colSpan=5><IMG height=2 
src="imagens/imgpxlazu.gif" width=666 
border=0></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 border="0">
<TBODY>

<tr>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=campo vAlign=top width="0" height="0" bordercolor="#FFCC00" colspan="100%">
<div class="titulo">Local de pagamento</div>
QUALQUER BANCO ATÉ O VENCIMENTO&nbsp;</TD>
</tr>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=0 height=0 colspan="100%"><IMG height=1 
src="imagens/imgpxlazu.gif" width=100% border=0></TD>
</TR>

<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=298 height=13>Cedente</TD>
<TD class=titulo vAlign=top width=7 height=13 bordercolor="#FFCC00"></TD>
<TD class=titulo vAlign=top width=126 height=13>Agência / Código do Cedente</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=34 height=13>Espécie</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=53 height=13>Quantidade</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=120 height=13>Nosso número</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=298 height=12><? echo $dadosboleto["cedente"]; ?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=126 height=12><?=$dadosboleto["agencia_codigo"]?> 
&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["especie"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=120 
height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</TD>
</TR>

<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=298 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=298 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=126 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=126 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=34 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=34 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=53 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=53 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=120 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=120 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=113 height=13>Número do documento</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=72 height=13>Contrato</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=132 height=13>CPF/CEI/CNPJ</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=134 height=13>Vencimento</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>Valor documento</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=113 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=72 height=12><?=$dadosboleto["contrato"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=132 height=12><?=$dadosboleto["cpf_cnpj"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=134 
height=12  bgColor=#ffffcc><?=$dadosboleto["data_vencimento"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=113 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=113 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=72 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=72 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=132 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=132 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=134 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=134 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=113 height=13>(-) Desconto / 
Abatimento</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=112 height=13>(-) Outras deduções</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=113 height=13>(+) Mora / Multa</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=113 height=13>(+) Outros acréscimos</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) Valor 
cobrado</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=112 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=113 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=113 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=112 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=112 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=113 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=113 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=113 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=113 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=659 height=13>Sacado</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=659 height=12>
<?=$dadosboleto["sacado"]?><BR>
<?=$dadosboleto["endereco1"]?><BR>
<?=$dadosboleto["endereco2"]?><br/>
<? //=$dadosboleto["endereco3"]?></TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=659 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=659 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=88 height=13><font size="-2">Autentica&ccedil;&atilde;o mec&acirc;nica</font></TD></TR>
<TR>
<TD vAlign=top width=7 height=3></TD>
<TD vAlign=top width=564 height=3></TD>
<TD vAlign=top width=7 height=3></TD>
<TD vAlign=top width=88 height=3></TD></TR></TBODY></TABLE><BR><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD></TR></TBODY></TABLE><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD class=campo width="20%"><font size="+1"><img src="../boleto/imagens/imgbb.gif" border="0" alt="Banco do Brasil"></font></TD>
<TD width=3><IMG height="22" src="../boleto/imagens/imgbrrazu.gif" width="2" border="0"></TD>
<TD class=campotitulo_1>001-9</TD>
<TD width=3><IMG height=22 
src="../boleto/imagens/imgbrrazu.gif" width=2 
border=0></TD>
<TD class=campotitulo><?=$dadosboleto["linha_digitavel"]?></TD></TR>
<TR>
<TD colSpan=5><IMG height=2 
src="imagens/imgpxlazu.gif" width=666 
border=0></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=472 height=13>Local de pagamento</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 bgColor=#ffffcc 
height=13>Vencimento</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=472 height=12>QUALQUER BANCO ATÉ O 
VENCIMENTO&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
height=12><?=$dadosboleto["data_vencimento"]?>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=472 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=472 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=472 height=13>Cedente</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>Agência/Código 
cedente</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=472 height=12><?=$dadosboleto["cedente"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12><?=$dadosboleto["agencia_codigo"]?>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=472 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=472 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=93 height=13>Data do documento</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=173 height=13>N<U>o</U> documento</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=72 height=13>Espécie doc.</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=34 height=13>Aceite</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=72 height=13>Data process.</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>Nosso número</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=93 
height=12><?=$dadosboleto["data_documento"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=173 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=72 height=12><?=$dadosboleto["especie_doc"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["aceite"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=72 
height=12><?=$dadosboleto["data_processamento"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=93 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=93 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=173 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=173 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=72 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=72 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=34 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=34 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=72 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=72 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=93 bgColor=#ffffcc height=13>Uso do 
banco</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=93 height=13>Carteira</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=53 height=13>Espécie</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=133 height=13>Quantidade</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=72 height=13>x Valor</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>(=) Valor documento</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=93 bgColor=#ffffcc height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=93 height=12><?=$dadosboleto["carteira"]?><?=$dadosboleto["variacao_carteira"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["especie"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=72 height=12><?=$dadosboleto["valor_unitario"]?>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=93 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=93 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=93 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=93 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=53 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=53 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=133 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=133 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=72 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=72 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD width=7 rowSpan=5></TD>
<TD vAlign=top width=447 rowSpan=5><FONT 
class=titulo>Instruções (Texto de responsabilidade do cedente)</FONT><BR><br><FONT class=campo>
<? echo "<b>".$dadosboleto["instrucoes"]."</b>"; ?><br> 
<? echo $dadosboleto["instrucoes1"]; ?><br><br>
<? //echo $dadosboleto["instrucoes2"]; ?>
<? //echo "Cond&ccedil;&otilde;es de prova: ".$dadosboleto["instrucoes5"]; ?>
<? //echo $dadosboleto["instrucoes3"]; ?><!--em caso de duvida... -->
<? echo $dadosboleto["instrucoes4"]; ?>
</FONT></TD>
<TD align=right width=212>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=18 height=13>27</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>(-) Desconto / 
Abatimento</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3></TD>
<TD vAlign=top width=18 height=3></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" 
width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD align=right width=212>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=18 height=13>35</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>(-) Outras 
deduções</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3></TD>
<TD vAlign=top width=18 height=3></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" 
width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD align=right width=212>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=18 height=13>19</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>(+) Mora / 
Multa</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3></TD>
<TD vAlign=top width=18 height=3></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" 
width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD align=right width=212>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>(+) Outros 
acréscimos</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 
height=12>&nbsp;</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" 
width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD align=right width=212>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) 
Valor cobrado</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD vAlign=top width=666 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=666 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=659 height=13>Sacado</TD></TR>
<TR>
<TD class=campo vAlign=top width=7 height=36></TD>
<TD class=campo vAlign=top width=659 height=36><?=$dadosboleto["sacado"]?><BR><?=$dadosboleto["endereco1"]?><BR><?=$dadosboleto["endereco2"]?>&nbsp;&nbsp;
</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=659 
height=13>Sacador/Avalista</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=campo vAlign=top width=7 height=12></TD>
<TD class=campo vAlign=top width=472 height=13>&nbsp;</TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=180 height=13>Cód. baixa</TD></TR>
<TR>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=472 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=472 
border=0></TD>
<TD vAlign=top width=7 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=7 
border=0></TD>
<TD vAlign=top width=180 height=3><IMG height=1 
src="imagens/imgpxlazu.gif" width=180 
border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TBODY>
<TR>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=470 height=13></TD>
<TD class=titulo vAlign=top width=7 height=13></TD>
<TD class=titulo vAlign=top width=182 height=13>Autenticação mecânica - 
Ficha de Compensação</TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD><? fbarcode($dadosboleto["codigo_barras"]); ?></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<TBODY>
<TR>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD>
<TD width=5><IMG height=1 
src="imagens/imgpxlazu.gif" width=6 
border=0></TD>
<TD width=5></TD></TR></TBODY></TABLE>
</DIV></BODY></HTML>


