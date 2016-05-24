<?php

/**
 * Student filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReportByDocumentStudentFormFilter extends BaseStudentFormFilter
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

    $this->widgetSchema['personal_documents'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        ''   => '',
        'N'   => 'Não Possui',
        'P'   => 'Possui'),
      'expanded' => false,
      'label' => 'Documentos Pessoais',
    ));

    $this->widgetSchema['historical_school'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        ''   => '',
        'N'   => 'Não Possui',
        'P'   => 'Possui'),
      'expanded' => false,
      'label' => 'Documentos Pessoais',
    ));

    $this->widgetSchema['photo'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        ''   => '',
        'N'   => 'Não Possui',
        'P'   => 'Possui'),
      'expanded' => false,
      'label' => 'Fotografia',
    ));

    $this->widgetSchema['medical_certificate'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        ''   => '',
        'N'   => 'Não Possui',
        'P'   => 'Possui'),
      'expanded' => false,
      'label' => 'Certificado Médico',
    ));

    $this->widgetSchema['diploma'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        ''   => '',
        'N'   => 'Não Possui',
        'P'   => 'Possui'),
      'expanded' => false,
      'label' => 'Diploma',
    ));

    $this->widgetSchema['single_emancipated'] = new sfWidgetFormChoice(array(
      'choices'  => array(
        ''   => '',
        'N'   => 'Não Possui',
        'P'   => 'Possui'),
      'expanded' => false,
      'label' => 'Solteiro Emancipado',
    ));

    $this->validatorSchema['personal_documents'] = new sfValidatorPass(array('required' => false));
    $this->validatorSchema['historical_school'] = new sfValidatorPass(array('required' => false));
    $this->validatorSchema['photo'] = new sfValidatorPass(array('required' => false));
    $this->validatorSchema['medical_certificate'] = new sfValidatorPass(array('required' => false));
    $this->validatorSchema['diploma'] = new sfValidatorPass(array('required' => false));
    $this->validatorSchema['single_emancipated'] = new sfValidatorPass(array('required' => false));
  }

  public function getFields() {
    return array_merge(array(
        'personal_documents'=> 'personal_documents',
        'historical_school'=> 'historical_school',
        'photo'=> 'photo',
        'medical_certificate'=> 'medical_certificate',
        'diploma'=> 'diploma',
        'single_emancipated'=> 'single_emancipated',
      ), parent::getFields()
    );
  }

  protected function addPersonalDocumentsColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();
    $fieldName = "personal_documents";

    $query->leftJoin("{$rootAlias}.Documentations d1");

    if ($values == 'N') {
      $query->addWhere("d1.{$fieldName} IS NULL");
    } else {
      $query->addWhere("d1.{$fieldName} IS NOT NULL");
    }
  }

  protected function addHistoricalSchoolColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();
    $fieldName = "historical_school";

    $query->leftJoin("{$rootAlias}.Documentations d2");

    if ($values == 'N') {
      $query->addWhere("d2.{$fieldName} IS NULL");
    } else {
      $query->addWhere("d2.{$fieldName} IS NOT NULL");
    }
  }

  protected function addPhotoColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();
    $fieldName = "photo";

    $query->leftJoin("{$rootAlias}.Documentations d3");

    if ($values == 'N') {
      $query->addWhere("d3.{$fieldName} IS NULL");
    } else {
      $query->addWhere("d3.{$fieldName} IS NOT NULL");
    }
  }

  protected function addMedicalCertificateColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();
    $fieldName = "medical_certificate";

    $query->leftJoin("{$rootAlias}.Documentations d4");

    if ($values == 'N') {
      $query->addWhere("d4.{$fieldName} IS NULL");
    } else {
      $query->addWhere("d4.{$fieldName} IS NOT NULL");
    }
  }

  protected function addDiplomaColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();
    $fieldName = "diploma";

    $query->leftJoin("{$rootAlias}.Documentations d5");

    if ($values == 'N') {
      $query->addWhere("d5.{$fieldName} IS NULL");
    } else {
      $query->addWhere("d5.{$fieldName} IS NOT NULL");
    }
  }

  protected function addSingleEmancipatedColumnQuery(Doctrine_Query $query, $field, $values)
  {
    $rootAlias = $query->getRootAlias();
    $fieldName = "single_emancipated";

    $query->leftJoin("{$rootAlias}.Documentations d6");

    if ($values == 'N') {
      $query->addWhere("d6.{$fieldName} IS NULL");
    } else {
      $query->addWhere("d6.{$fieldName} IS NOT NULL");
    }
  }
}
