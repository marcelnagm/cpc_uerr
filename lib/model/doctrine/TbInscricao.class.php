<?php

/**
 * TbInscricao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbInscricao extends BaseTbInscricao
{
    public function getPagoText(){
        return $this->getPago() == 1 ? 'Sim' : 'Não';
    }
    
}
