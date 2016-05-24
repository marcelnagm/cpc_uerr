<?php

/**
 * Semester filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SemesterFormFilter extends BaseSemesterFormFilter
{
    public function configure()
    {
        $this->widgetSchema['year']->setOption( 'with_empty', false ); 


        $this->widgetSchema['period'] = new sfWidgetFormChoice(
          array(
            'choices' => array('' => '', 1 => 1, 2 => 2, 3 => 3,4 => 4,5 => 5,6 => 6,7 => 7,8 => 8,9 => 9,10 => 10,11 => 11,12 => 12),
          )
        );
    }
}
