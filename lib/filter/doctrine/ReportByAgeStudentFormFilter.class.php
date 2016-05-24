<?php

/**
 * Student filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReportByAgeStudentFormFilter extends BaseStudentFormFilter
{
  /**
   * @see PersonFormFilter
   */
  public function configure()
  {
    parent::configure();

    #$this->widgetSchema['instituitions_list'] = new sfWidgetFormDoctrineChoice(array(
    #  'multiple' => true, 
    #  'model' => 'Instituition'
    #));
    
    #$option = new sfWidgetFormFilterInput();
    #$option->setOption('with_empty', false);
    #$this->setWidgets(array(
    #  'age'		=> 	new sfWidgetFormAgeRange(array(
    #    'from_date'	=> $option,
    #    #new sfWidgetFormJQueryDate(array('format'=>'%day%/%month%/%year%')),
    #    #'final_age'	=> new sfWidgetFormJQueryDate(array('format'=>'%day%/%month%/%year%')),
    #    'to_date'	=> $option
    #  ))
    #));

    #$this->setValidators(array(
    #  'age'		=> new sfValidatorAgeRange(array(
    #    'from_date'	=> 
    #    #new sfValidatorDate(),

    #      new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    #    'to_date'	=> 
    #        #new sfValidatorDate(),
    #      new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    #  ))
    #));
    

    $this->widgetSchema   ['initial_age'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['initial_age'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));
    $this->widgetSchema   ['initial_age']->setOption( 'with_empty', false ); 

    $this->widgetSchema   ['final_age'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['final_age'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));
    $this->widgetSchema   ['final_age']->setOption( 'with_empty', false ); 

  }

  public function getFields() {
    return array_merge(array(
        'initial_age'=> 'initial_age',
        'final_age'=> 'final_age',
      )#, parent::getFields()
    );
  }

  protected function addInitialAgeColumnQuery(Doctrine_Query $query, $field, $values)
  {
    #$filters = sfContext::getInstance()->getUser()->getAttributeHolder()->getAll('sf_admin/repor_by_age/filters');
    $rootAlias = $query->getRootAlias();

    #$query->addWhere("(datediff(now(), {$rootAlias}.birth) / 365) >= ?", $values['text']);
    if ($values['text']) {
      $futureDate=date('Y-m-d', strtotime("-{$values['text']} year"));
      $query->addWhere("birth <= ?", $futureDate);
      $query->addOrderBy('birth desc');
    }
  }

  protected function addFinalAgeColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();

    #$query->addWhere("(datediff(now(), {$rootAlias}.birth) / 365) <= ?", $values['text']);
    #
    if ($values['text']) {
      $futureDate=date('Y-m-d', strtotime("-{$values['text']} year"));
      $query->addWhere("birth >= ?", $futureDate);
      $query->addOrderBy('birth desc');
    }
  }

}
