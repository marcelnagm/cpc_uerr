<?php

/**
 * Student filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReportBySexStudentFormFilter extends BaseStudentFormFilter
{
  /**
   * @see PersonFormFilter
   */
  public function configure()
  {
    parent::configure();

    $this->widgetSchema['instituitions_list'] = new sfWidgetFormDoctrineChoice(array(
      'multiple' => true, 
      'model' => 'Instituition'
    ));

    $this->widgetSchema['sex'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        '' => '',
        'M'   => 'Masculino',
        'F'   => 'Feminino'),
      'expanded' => false,
      'label' => 'Sexo',
      'renderer_class' => 'sfWidgetFormFilterSelect',
    ));
  }
}
