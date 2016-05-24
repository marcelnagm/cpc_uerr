<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

//fazer login
$browser->get('/')->
setField('signin[username]', 'admin')
        ->setField('signin[password]', '123')        
         ->click('Entrar')
    
//inicia o teste        
->get('/professor')->
  with('request')->begin()->
    isParameter('module', 'professor')->
    isParameter('action', 'index')->
  end()->
  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Lista de/')->
  end();
