<?php

$row = 1;
if (($handle = fopen($_FILES['arquivo']['tmp_name'], "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);

        $row++;
        $insc = TbInscricaoTable::getInstance()->findOneBy('boleto', $data[0]);
        if ($insc != false) {
            echo "<p> $insc valida: <br /></p>\n";
            $gab = '';
            for ($c = 1; $c < 4; $c++) {
                $gab.=$data[$c];
                echo $data[$c] . "";
            }
            $gab = str_replace(' ', '0', $gab);

            if ($sub) {
                $correcao = TbCorrecaoTable::getInstance()->getPorProvaAndInscricao($insc)->fetchOne();
                
                if ($correcao != false) {
                    $correcao->setGabarito($gab);                    
                    $correcao->save();
                } else {
                    $correcao = new TbCorrecao();
                    $correcao->setTbInscricao($insc);
                    $correcao->setIdProva(sfContext::getInstance()->getUser()->getAttribute('prova'));
                    $correcao->setGabarito($gab);
                }
            } else {
                $correcao = new TbCorrecao();
                $correcao->setTbInscricao($insc);
                $correcao->setIdProva(sfContext::getInstance()->getUser()->getAttribute('prova'));
                $correcao->setGabarito($gab);
            }

            $correcao->save();
        }
    }
}
fclose($handle);

?><br>
  <?php echo link_to1('Voltar Lista de Cartões','correcao/index')?>
