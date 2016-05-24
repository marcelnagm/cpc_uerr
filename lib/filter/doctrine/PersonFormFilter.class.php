<?php

/**
 * Person filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonFormFilter extends BasePersonFormFilter
{
    public function configure()
    {
        $this->widgetSchema['is_stranger'] = new sfWidgetFormChoice(array(
            'choices' => array(
                ''  => 'sim ou não',
                1   => 'sim',
                0   => 'não'),
        ));

        $this->widgetSchema['cpf']->setOption( 'with_empty', false ); 
    }
}
