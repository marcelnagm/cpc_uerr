<?php

class DecimalValidatorSchema extends sfValidatorNumber
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);
  }

  protected function doClean($value)
  {
    $value = str_replace(',', '.', $value);
    return parent::doClean($value);
  }
}
