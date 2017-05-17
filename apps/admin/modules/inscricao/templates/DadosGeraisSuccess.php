<?php use_helper('I18N', 'Date') ?>
<?php include_partial('inscricao/assets') ?>

<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <h2>Concurso Público - Prefeitura Municipal de Rorainópolis</h2>
            <table>
                <tr> 
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>CURSOS/CARGOS COM INSCRIÇÕES EFETIVADAS</b></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>LOCALIDADE</b></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>INSCRITOS</b></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>ISENTOS</b></td> 
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>PAGOS</b></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>CONFIRMADOS</b></td>         
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>Nº DE VAGAS</b></td>                
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>INSCRITOS/<br>VAGAS</b></td>                
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>CONCORRÊNCIA<br>GERAL</b></td>     
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>Nº DE VAGAS<br>PNE</b></td>     
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>Nº DE PNEs<br>CONFIRMADOS</b></td>   
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>CONCORRÊNCIA<br>PNE</b></td>   
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>PRESENTES</b></td>                              
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>FALTOSOS</b></td>
                </tr>
                <?php foreach ($vagas as $vaga){
                    $q = TbInscricaoTable::getInstance()->getPorCertameAndVaga($vaga);
                    $inscritos = $q->count();
                    $q->andWhere('isento = 1');
                    $isentos =$q->count();
                    $q = TbInscricaoTable::getInstance()->getPorCertameAndVaga($vaga);
                    $q->andWhere('pago = 1 and vaga_deficiente = 0');
                    $pagos = $q->count();
                    $q = TbInscricaoTable::getInstance()->getPorCertameAndVaga($vaga);
                    $q->andWhere('vaga_deficiente = 1');
                    $pagos_pne = $q->count();
//                    
//                    ?>
                <tr> 
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $vaga->getTbCargo();?></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $vaga->getTbCidade();?></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $inscritos;?></td>                    
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $isentos;?></td>                    
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $pagos;?></td>                                        
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $pagos;?></td>                                                            
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $vaga->getQuantidade();?></td>                    
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b><?php echo number_format(($inscritos/$vaga->getQuantidade()), 2)?></b></td> 
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b><?php echo number_format(($pagos/$vaga->getQuantidade()), 2)?></b></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $vaga->getVagaDeficiente();?></td>                    
                    <td class="f11" align="center" bgcolor="#F4F4F4"><?php echo $pagos_pne;?></td>                                                            
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b><?php echo number_format(($pagos_pne/$vaga->getVagaDeficiente()), 2)?></b></td>
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>PRESENTES</b></td>                              
                    <td class="f11" align="center" bgcolor="#F4F4F4"><b>FALTOSOS</b></td>
                </tr>
                <?php }?>
            </table>
        </div>