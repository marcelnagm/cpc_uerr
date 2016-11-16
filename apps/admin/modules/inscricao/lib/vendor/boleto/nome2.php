<? include "../conecta.php";
$acao=$_GET['acao'];
?>
<title>Busca Dinamica</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<STYLE>BODY {
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
	FONT: bold 15px Arial; COLOR: navy
}
</STYLE>
<? if($acao=='entrar'){
$v_nome1=$_GET['v_nome1'];
?>
<form name="FRM_nome" action="nome2.php?acao=listnome" method="post">
<table width="657" border="0" bgcolor="#f7f7f7" align="center">
<tr>
<td align="center" bgcolor="#CCCCCC"><strong><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&lt;- Busca Dinamica -&gt;</font></strong></td>
</tr>
<tr>
<td align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nome do candidato</strong></font>:
<input type="text" name="v_nome" size="50" value="<?=$v_nome1;?>">
</td>
</tr>
<tr>
<td align="center"><input type="submit" value="Enviar">
</td>
</tr>
<tr>
 <td align="center">Confirmação de Inscrição e Locais de Prova</td></tr>
</table>
</form>


<? }//fim da acao nome 
if($acao=='listnome'){
$v_nome=$_POST['v_nome'];

$sql_nome = "select a.id_can, rtrim(ltrim(upper(a.nome_can))) as nome_can, a.cod_banc_can, a.salaprova, b.nome_cargo, c.nome_local, d.nome_municipio
from tb_cadastro a, tb_cargo b, tb_locais c, tb_municipio d
where rtrim(ltrim(upper(a.nome_can))) like rtrim(ltrim(upper('$v_nome%'))) and a.pg_can=1 and a.id_cargo=b.id_cargo and a.localprova=c.id_local and a.id_municipio=d.id_municipio";

$sql_nome = mysql_query($sql_nome);

if(mysql_num_rows($sql_nome) > 0) { 
?>
<table align="center" width="70%" cellpadding="0" cellspacing="0" border="0">
<tr align="center">
    <td colspan="2"><div align="center">
      <p><span class="style10"><strong>GOVERNO DO ESTADO DE RORAIMA</strong><br />
          <strong>UNIVERSIDADE ESTADUAL  DE RORAIMA</strong><br />
          <em>"AMAZ&Ocirc;NIA: PATRIM&Ocirc;NIO DOS  BRASILEIROS"</em></span> </p>
      <p class="style10"><strong>VESTIBULAR 2009.2</strong><BR />
        <strong>C.P.C.V.</strong></p>
       
    </div></td>
  </tr>
 <tr>
   <td colspan="2" align="center"><font size="+1">Confirmação de Local de Prova</font></td>
 </tr>
  <tr>
   <td colspan="2" align="center"><font size="4">Clique no seu nome para verificação do comprovante de inscrição</font></td>
 </tr>
 <?
 
echo "<table width=100% border=1 bgcolor=#f7f7f7 align=center>";
echo "<tr><td align=center><b>Nome do Candidato</b></td><td align=center><b>Curso</b></td><td align=center><b>Local da Prova</b></td><td align=center><b>Sala da Prova</b></td></tr>";
while($array_nome=mysql_fetch_object($sql_nome)){
$v_id=$array_nome->id_can;
$v_nome=$array_nome->nome_can;
$v_sala=$array_nome->salaprova;
$v_cargo=$array_nome->nome_cargo;
$v_local=$array_nome->nome_local;
$v_muni=$array_nome->nome_municipio;
//echo $nr1_boleto;
echo "<tr><td>";

echo "<a href=nome2.php?acao=dados&id_can=$v_id>".$v_nome."</a></td>";

echo "<td align=center>".$v_cargo."</td>";

echo "<td> Em: <b>".$v_muni."</b><br>Na Escola: <b>".$v_local."</b></td>";

echo "<td align=center>".$v_sala."</td>";

echo "</td></tr>";

}
echo "</table>";

}else{echo "<center><font size=3>Candidato Não encontrado ou Boleto Bancário não pago, tente novamente<br><a href=nome2.php?acao=entrar>Clique aqui para retornar</a></font>";}
}//fim da acao nome


if($acao=='dados'){
$v_id_can=$_GET['id_can'];
//$sql_sec = "select upper(a.nome_can) as nome_can, a.cpf_can, a.rg_can, a.end_can, a.bairro_can, a.salaprova_can, a.cidade_can, a.uf_can, a.cep_can, b.nome_cargo, b.valor_cargo, b.turno_cargo, a.vgrupo, c.nome_local \\
$sql_sec = "select upper(a.nome_can) as nome_can, a.cpf_can, a.rg_can, a.end_can, a.bairro_can, a.salaprova, a.cidade_can, a.uf_can, a.cep_can, b.nome_local, b.end_local, c.nome_municipio, d.nome_cargo, d.abrev_curso
from tb_cadastro a, tb_locais b, tb_municipio c, tb_cargo d
where a.localprova=b.id_local and pg_can=1 and a.id_can='$v_id_can' and a.id_municipio=c.id_municipio and a.id_cargo=d.id_cargo";
//echo $sql_sec;
$sql_sec = mysql_query($sql_sec);
$array_sec=mysql_fetch_object($sql_sec);
$nome=$array_sec->nome_can;//nome do candidato
$cargo=$array_sec->abrev_curso;//nome do candidato
$local=$array_sec->nome_local;
$endlocal=$array_sec->end_local;
$sala=$array_sec->salaprova;
$municipio=$array_sec->nome_municipio;
?>
 
<table align="center" width="70%" cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <td colspan="2"><div align="center">
      <p><span class="style10"><strong>GOVERNO DO ESTADO DE RORAIMA</strong><br />
          <strong>UNIVERSIDADE ESTADUAL  DE RORAIMA</strong><br />
          <em>"AMAZ&Ocirc;NIA: PATRIM&Ocirc;NIO DOS  BRASILEIROS"</em></span> </p>
      <p class="style10"><strong>VESTIBULAR 2009.2</strong><BR />
        <strong>C.P.C.V.</strong></p>
       
    </div></td>
  </tr>
 <tr>
   <td colspan="2" align="center"><font size="+3">Confirmação de Local de Prova</font></td>
 </tr>

 <tr>
   <td><font size="2">Candidato</font></td>
   <td><font size="+2"><?=$nome;?></font></td>
 </tr>
 <tr>
   <td><font size="2">Curso</font></td>
   <td><font size="+2"><?=$cargo;?></font></td>
 </tr>
 <tr>
   <td><font size="2">Localidade da Prova</font></td>
   <td><font size="+2"><?=$municipio;?></font></td>
 </tr>

 <tr>
   <td><font size="2">Escola / Sala</font></td>
   <td><font size="+2"><?=$local;?>&nbsp; / &nbsp;<?=$sala; if($sala==0){echo "&nbsp;Sala Especial";}?></font></td>
 </tr>
 <tr>
   <td><font size="2">Data da Prova</font></td>
   <td><font size="+2">12/07/2009</font></td>
 </tr>
 <tr>
   <td><font size="2">Turno da Prova</font></td>
   <td><font size="+2">Matutino</font></td>
 </tr>
 <tr>
   <td><font size="2">Horário da Prova</font></td>
   <td><font size="+2">08:00 às 12:00</font></td>
 </tr>
 <tr>
   <td colspan="2" align="center"><font size="+2">Observações conforme Edital 019/2009</font></td>
 </tr>
 <tr>
   <td colspan="2"><font size="+1">O candidato deverá chegar ao local de realização das provas, no mínimo, 1 (uma) hora antes do horário marcado para seu início, munido do comprovante de inscrição, documento de identidade original, apresentado no ato de inscrição e caneta esferográfica com tinta na cor preta ou azul;</font></td>
 </tr>
 <? if($v_id_can=='4423'){?>
<tr>
 <td colspan="2">
 <font size="+2" color="#FF0000"><center>
Obs.: a candidata deve comparecer a CPC na Universidade Estadual de Roraima, com urgencia, ou pelo telefone: 2121-0931
</center></font>
</td>
</tr>
<? } ?>
</table></font>
<?
echo "<center><font size=3><a href=nome2.php?acao=entrar>Clique aqui para retornar</a></font>";
}

if($acao=='codigo'){
$v_id_can=$_GET['id_can'];
$v_id_cargo=$_GET['v_id_cargo'];
$sql_sec = "select a.id_can, upper(a.nome_can) as nome_can, a.cpf_can, a.rg_can, a.end_can, a.bairro_can, a.cidade_can, a.uf_can, a.cep_can, b.nome_cargo  
from tb_cadastro a, tb_cargo b 
where a.id_can='$v_id_can' and a.id_cargo='$v_id_cargo' and a.id_cargo=b.id_cargo";
//echo $sql_sec;
$sql_sec = mysql_query($sql_sec);
$array_sec=mysql_fetch_object($sql_sec);
//$v_id_cargo=$array_sec->id_cargo;
$v_cargo=$array_sec->nome_cargo;
$v_id_can2=$array_sec->id_can;

//identificador de concurso de Pacaraima

$xt=str_pad($v_id_can,5,"0",STR_PAD_LEFT);
$edital="712";
$id_boleto=$edital.substr($v_id_cargo,3,2).$xt;

//if(nosso_numer<>$v_nosso_)

//$nosso_numero='1249493'.substr($nosso_numero,0,10);
//$nosso_numero='1394897'.substr($nosso_numero,0,10);
$nosso_numero='1394897'.$id_boleto;

//$nosso_numero='13948970000001016';
$nome=$array_sec->nome_can;//nome do candidato
$cpf=$array_sec->cpf_can;//cpf do candidato
$c_valor='60,00';//valor do boleto
//$c_valor='50,00';
//$nome=$nome."   CPF: ".$cpf;
$nome=$nome;
$endereco=$array_sec->end_can;//endereco do candidato
$bairro=$array_sec->bairro_can;//bairro do candidato
$cidade=$array_sec->cidade_can;//cidade do candidato
$cep=$array_sec->cep_can;//cep do candidato
$cargo='Vestibular 2009.2';//nome do candidato
$municipio="Boa Vista - RR";//nome do candidato



$dadosboleto["data_vencimento"] = "30/06/2009"; // Data de Vencimento do Boleto
$dadosboleto["data_documento"] = date('d/m/Y'); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date('d/m/Y');; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $c_valor; 	// Valor do Boleto, com vírgula, sempre com duas casas depois da virgula

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
$dadosboleto["endereco"] = "Av Sete de Setembro 231";
$dadosboleto["cidade"] = "Boa Vista - RR";
$dadosboleto["cedente"] = "Universidade Estadual de Roraima - UERR";

/*
DADOS DO SEU CLIENTE
*/
$dadosboleto["sacado"] = $nome;
$dadosboleto["endereco1"] = $endereco;
$dadosboleto["endereco2"] = "Bairro ".$bairro." CEP ".$cep;

/*
INSTRUÇÕES PARA O CLIENTE
*/
$dadosboleto["instrucoes"] = "Vestibular 2009.2";
$dadosboleto["instrucoes1"] = $v_cargo; 
$dadosboleto["instrucoes2"] = $v_local;
$dadosboleto["instrucoes3"] = "- Sr. Caixa, não receber após o vencimento";
$dadosboleto["instrucoes4"] = "- Em caso de dúvidas entre em contato conosco: prodes@uerr.edu.br";

//SÓ MEXA DEPOIS DISSO SE VOCÊ FOR EXPERIENTE EM PHP
//echo "<center><font color=read size=+2><a href='../opcoes.php'><< Menu Principal</a></font>";
//include("include/funcoesbb.php"); 
//include("include/layoutbbhtml.php");
include("include/funcoesbb_02.php"); 
?>
<table align="center" cellpadding="0" cellspacing="0" border="0" width="70%">
 <tr>
   <td colspan="2" align="center"><font size="+2">Universidade Estadual de Roraima - UERR</font> <br> <font size="+1">Vestibular 2009.2 </font><br> Pagamento sem c&oacute;digo de Barras</td>
 </tr>
 <tr>
   <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
   <td colspan="2"><b><font size="+2">Banco do Brasil</font></b></td>
 </tr>

 <tr>
   <td>Inscri&ccedil;&atilde;o:</td>
   <td><b><?=$id_boleto;?></b></td>
 </tr>
 <tr>
   <td>Candidato:</td>
   <td><b><?=$dadosboleto["sacado"];?></b></td>
 </tr>
 <tr>
   <td>Curso:</td>
   <td><b><?=$dadosboleto["instrucoes1"];?></b></td>
 </tr> 
 <tr>
   <td>Data Vencimento:</td>
   <td><b><?=$dadosboleto["data_vencimento"];?></b></td>
 </tr> 
  <tr>
   <td>Data Processamento:</td>
   <td><b><?=$dadosboleto["data_processamento"];?></b></td>
 </tr> 
   <tr>
   <td>Valor:</td>
   <td><b><?=$dadosboleto["valor_boleto"];?></b></td>
 </tr> 
    <tr>
   <td>Digitação do código de barras:</td>
   <td><b><?=$dadosboleto["linha_digitavel"];?></b></td>
 </tr> 
</table>


<?

}//fim da acao codigo


if($acao=='boleto'){
$v_id_can=$_GET['id_can'];

$nosso_numero=$v_id_can;
//$nosso_numero=$nosso_numero."111";
//$nosso=$nosso_numero;
//echo $nosso;

//$sql_atua="update pessoa set boleto_banco='$nosso_numero' where nosso_numero='$nosso_numero'";
//$sql_atua=mysql_query($sql_atua);
//$nosso_numero='12494930000020115';
//echo "-";






$sql_sec = "select upper(a.nome_can) as nome_can, a.cpf_can, a.rg_can, a.end_can, a.bairro_can, a.cidade_can, a.uf_can, a.cep_can, b.nome_cargo  
from tb_cadastro a, tb_cargo b 
where a.id_can='$v_id_can' and a.id_cargo=b.id_cargo";
//echo $sql_sec;
$sql_sec = mysql_query($sql_sec);
$array_sec=mysql_fetch_object($sql_sec);
$v_id_cargo=$array_sec->id_cargo;
$v_cargo=$array_sec->nome_cargo;

if($v_id_cargo>=1||$v_id_cargo<=13){
 $v_local=" Local das Prova conforme item 7.1.7. do Edital 019/2009.";
 }
else{
$v_local="Por favor verifique sua inscrição ocorreu algum tipo de erro... ligue para 2121-0940.";
}


//identificador de concurso de Pacaraima
$v_idconc='71';
//codigo do municipio Boa Vista (1) Pacaraima (2)
$v_mun='2';
$nosso_numero=$v_idconc.$v_mun.substr($v_id_can,3,10);

//if(nosso_numer<>$v_nosso_)

//$nosso_numero='1249493'.substr($nosso_numero,0,10);
$nosso_numero='1394897'.substr($nosso_numero,0,10);
//$nosso_numero='13948970000001016';
$nome=$array_sec->nome_can;//nome do candidato
$cpf=$array_sec->cpf_can;//cpf do candidato
$c_valor='60,00';//valor do boleto
//$c_valor='50,00';
//$nome=$nome."   CPF: ".$cpf;
$nome=$nome;
$endereco=$array_sec->end_can;//endereco do candidato
$bairro=$array_sec->bairro_can;//bairro do candidato
$cidade=$array_sec->cidade_can;//cidade do candidato
$cep=$array_sec->cep_can;//cep do candidato
$cargo='Vestibular 2009.2';//nome do candidato
$municipio="Boa Vista - RR";//nome do candidato



$dadosboleto["data_vencimento"] = "30/06/2008"; // Data de Vencimento do Boleto
$dadosboleto["data_documento"] = date('d/m/Y'); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date('d/m/Y');; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $c_valor; 	// Valor do Boleto, com vírgula, sempre com duas casas depois da virgula

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
$dadosboleto["endereco"] = "Av Sete de Setembro 231";
$dadosboleto["cidade"] = "Boa Vista - RR";
$dadosboleto["cedente"] = "Universidade Estadual de Roraima - UERR";

/*
DADOS DO SEU CLIENTE
*/
$dadosboleto["sacado"] = $nome;
$dadosboleto["endereco1"] = $endereco;
$dadosboleto["endereco2"] = "Bairro ".$bairro." CEP ".$cep;

/*
INSTRUÇÕES PARA O CLIENTE
*/
$dadosboleto["instrucoes"] = "Vestibular 2009.2";
$dadosboleto["instrucoes1"] = $v_cargo; 
$dadosboleto["instrucoes2"] = $v_local;
$dadosboleto["instrucoes3"] = "- Sr. Caixa, não receber após o vencimento";
$dadosboleto["instrucoes4"] = "- Em caso de dúvidas entre em contato conosco: prodes@uerr.edu.br";

//SÓ MEXA DEPOIS DISSO SE VOCÊ FOR EXPERIENTE EM PHP
//echo "<center><font color=read size=+2><a href='../opcoes.php'><< Menu Principal</a></font>";
include("include/funcoesbb.php"); 
include("include/layoutbbhtml.php");
include("include/funcoesbb.php"); 
?>

<P><BR>
<DIV align=center>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=normal>
      <DIV align=center><B>O pagamento deste boleto também poderá ser efetuado 
      nos terminais de Auto-Atendimento BB.</B></DIV>
      <P><B>Retornar <a href="http://www.uerr.edu.br/paginas/diversas/pacaraima.php">clique aqui</a></B><BR>
      <OL>
      </OL></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD></TR></TBODY></TABLE><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=campo width=150><IMG height=22 
      src="boleto/imagens/imgbb.gif" width=150 
      border=0></TD>
    <TD width=3><IMG height=22 
      src="boleto/imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=middle width=46>001-9</TD>
    <TD width=3><IMG height=22 
      src="boleto/imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=right width=464><?=$dadosboleto["linha_digitavel"]?> &nbsp;&nbsp;&nbsp; </TD></TR>
  <TR>
    <TD colSpan=5><IMG height=2 
      src="boleto/imagens/imgpxlazu.gif" width=666 
      border=0></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=298 height=13>Cedente</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=126 height=13>Agência / Código do Cedente</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=34 height=13>Espécie</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=53 height=13>Quantidade</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=120 height=13>Nosso número</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=298 height=12><? echo $dadosboleto["cedente"]; ?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=126 height=12><?=$dadosboleto["agencia_codigo"]?> 
    &nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["especie"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=120 
    height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=298 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=298 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=126 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=126 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=34 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=34 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=53 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=53 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=120 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=120 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>Número do documento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>Contrato</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=132 height=13>CPF/CEI/CNPJ</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=134 height=13>Vencimento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Valor documento</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=113 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=72 height=12><?=$dadosboleto["contrato"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=132 height=12><?=$dadosboleto["cpf_cnpj"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=134 
    height=12><?=$dadosboleto["data_vencimento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
  height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=132 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=132 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=134 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=134 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>(-) Desconto / 
    Abatimento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=112 height=13>(-) Outras deduções</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>(+) Mora / Multa</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=113 height=13>(+) Outros acréscimos</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) Valor 
      cobrado</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=112 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=113 height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
    height=12>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=112 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=112 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=113 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=113 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=659 height=13>Sacado</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=659 height=12><?=$dadosboleto["sacado"]?> 
    &nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=659 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=659 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13></TD>
    <TD class=titulo vAlign=top width=7 height=13></TD>
    <TD class=titulo vAlign=top width=88 height=13>Autenticação mecânica</TD></TR>
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
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD></TR></TBODY></TABLE><BR><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=campo width=150><IMG height=22 
      src="boleto/imagens/imgbb.gif" width=150 
      border=0></TD>
    <TD width=3><IMG height=22 
      src="boleto/imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=middle width=46>001-9</TD>
    <TD width=3><IMG height=22 
      src="boleto/imagens/imgbrrazu.gif" width=2 
      border=0></TD>
    <TD class=campotitulo align=right width=464><?=$dadosboleto["linha_digitavel"]?> &nbsp;&nbsp;&nbsp; </TD></TR>
  <TR>
    <TD colSpan=5><IMG height=2 
      src="boleto/imagens/imgpxlazu.gif" width=666 
      border=0></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=472 height=13>Local de pagamento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 bgColor=#ffffcc 
    height=13>Vencimento</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=472 height=12>QUALQUER BANCO ATÉ O 
      VENCIMENTO&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
      height=12><?=$dadosboleto["data_vencimento"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=472 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=472 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=472 height=13>Cedente</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Agência/Código 
  cedente</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=472 height=12><?=$dadosboleto["cedente"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
      height=12><?=$dadosboleto["agencia_codigo"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=472 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=472 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=93 height=13>Data do documento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=173 height=13>N<U>o</U> documento</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>Espécie doc.</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=34 height=13>Aceite</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>Data process.</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Nosso número</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=93 
    height=12><?=$dadosboleto["data_documento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=173 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=72 height=12><?=$dadosboleto["especie_doc"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["aceite"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=72 
    height=12><?=$dadosboleto["data_processamento"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
    height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=93 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=93 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=173 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=173 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=34 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=34 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=93 bgColor=#ffffcc height=13>Uso do 
    banco</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=93 height=13>Carteira</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=53 height=13>Espécie</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=133 height=13>Quantidade</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=72 height=13>x Valor</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>(=) Valor documento</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=93 bgColor=#ffffcc height=12>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=93 height=12><?=$dadosboleto["carteira"]?><?=$dadosboleto["variacao_carteira"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["especie"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=72 height=12><?=$dadosboleto["valor_unitario"]?>&nbsp;</TD>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top align=right width=180 
  height=12><?=$dadosboleto["valor_boleto"]?>&nbsp;</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=93 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=93 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=93 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=93 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=53 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=53 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=133 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=133 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=72 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=72 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=7 rowSpan=5></TD>
    <TD vAlign=top width=447 rowSpan=5><FONT 
      class=titulo>Instruções (Texto de responsabilidade do cedente)</FONT><BR><br><FONT class=campo>
		<? echo $dadosboleto["instrucoes"]; ?><br> 
		<? echo $dadosboleto["instrucoes1"]; ?><br>
		<? echo $dadosboleto["instrucoes2"]; ?><br>
		<? echo $dadosboleto["instrucoes3"]; ?><br> 
		<? echo $dadosboleto["instrucoes4"]; ?><br>
	  </FONT></TD>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13></TD>
          <TD class=titulo vAlign=top width=18 height=13>27</TD>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(-) Desconto / 
            Abatimento</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12></TD>
          <TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3></TD>
          <TD vAlign=top width=18 height=3></TD>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13></TD>
          <TD class=titulo vAlign=top width=18 height=13>35</TD>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(-) Outras 
          deduções</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12></TD>
          <TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3></TD>
          <TD vAlign=top width=18 height=3></TD>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13></TD>
          <TD class=titulo vAlign=top width=18 height=13>19</TD>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(+) Mora / 
        Multa</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12></TD>
          <TD class=campo vAlign=top width=18 height=12>&nbsp;</TD>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3></TD>
          <TD vAlign=top width=18 height=3></TD>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 height=13>(+) Outros 
          acréscimos</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 
        height=12>&nbsp;</TD></TR>
        <TR>
          <TD vAlign=top width=7 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" width=7 
            border=0></TD>
          <TD vAlign=top width=180 height=3><IMG height=1 
            src="boleto/imagens/imgpxlazu.gif" 
            width=180 border=0></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=right width=212>
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) 
            Valor cobrado</TD></TR>
        <TR>
          <TD class=campo vAlign=top width=7 height=12><IMG height=12 
            src="boleto/imagens/imgbrrlrj.gif" width=5 
            border=0></TD>
          <TD class=campo vAlign=top align=right width=180 bgColor=#ffffcc 
          height=12>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width=666 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=666 
      border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=659 height=13>Sacado</TD></TR>
  <TR>
    <TD class=campo vAlign=top width=7 height=36><IMG height=36 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=659 height=36><?=$dadosboleto["sacado"]?><BR><?=$dadosboleto["endereco1"]?><BR><?=$dadosboleto["endereco2"]?>&nbsp;&nbsp;
	</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=659 
  height=13>Sacador/Avalista</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=campo vAlign=top width=7 height=12><IMG height=12 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=campo vAlign=top width=472 height=13>&nbsp;</TD>
    <TD class=titulo vAlign=top width=7 height=13><IMG height=13 
      src="boleto/imagens/imgbrrlrj.gif" width=5 
      border=0></TD>
    <TD class=titulo vAlign=top width=180 height=13>Cód. baixa</TD></TR>
  <TR>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=472 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=472 
      border=0></TD>
    <TD vAlign=top width=7 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=7 
      border=0></TD>
    <TD vAlign=top width=180 height=3><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=180 
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
    <TD><? //fbarcode($dadosboleto["codigo_barras"]); ?></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD class=titulo width=666>Corte na linha pontilhada</TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
  <TBODY>
  <TR>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD>
    <TD width=5><IMG height=1 
      src="boleto/imagens/imgpxlazu.gif" width=6 
      border=0></TD>
    <TD width=5></TD></TR></TBODY></TABLE><BR><BR></DIV>
<?

}//fim da acao boleto


?>
</body>
</html>