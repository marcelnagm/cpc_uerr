<?php
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
