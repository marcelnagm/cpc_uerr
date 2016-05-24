<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());
$browser->get('/')
        ->setField('signin[username]', 'admin')
        ->setField('signin[password]', '123')                
         ->click('Entrar');

echo "Testando index de matricula \n";
$browser->
  get('/matricula')->
  with('request')->begin()->
    isParameter('module', 'matriculation')->
    isParameter('action', 'index')->
  end()->
  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Lista de Matrículas/')->
  end();


echo "Testando Declaração  \n";
$browser->
  get('/matricula/2/ListViewDeclaration')->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Declaro para os devidos fins que se fizeram/')->
  end();

echo "Testando Disciplina Pendentes  \n";
$browser->
  get('matricula/2/ListPendentDisciplines')->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Auditoria Pública/')->
  end();

 $browser->
  get('/matricula/2/ListMatriculation')->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Requisição de Disciplina/')->
  end();
 
 echo "Testando Requisição de Disciplina \n";
 $matriculation = Doctrine_Core::getTable('Matriculation')->find(2);
 
 $semester = new Semester();
 $semester = Doctrine_Core::getTable('Semester')->getActiveSemesterToMatriculation($matriculation->getCourse());
 

 echo $semester."\n";    
$browser->post('matricula/disciplinas',array('semester_matriculation[semester_id]' => $semester->getIncremented(),'semester_matriculation[choice]'=> 1,'commit' => 'Solicitar'))
    ->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Requisição de Disciplinas/')->
  end();
        ;

 echo "Testando Requisição de Disciplina com semestre trancado \n";
 
 $browser->get('/guard/logout')->get('/')
        ->setField('signin[username]', '12695277')
        ->setField('signin[password]', '123')                
         ->click('Entrar');

 
 $browser->
  get('/aluno/matricula')->followRedirect()->with('response')->begin()->
    isStatusCode(200)->
//    checkElement('body', '/Requisição de Disciplina/')->
    checkElement('body', '/Avisos/')->
  end();
 
 echo "Testando comprovante férias não trancado\n";
 
 $browser->
  get('/matricula/698/ListComprovanteMatricula?tipo=ferias')->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Comprovante de Matricula/')->
  end();
 
 echo "Testando comprovante trancado\n";
 $browser->
  get('/matricula/698/ListComprovanteMatricula?tipo=regular')->followRedirect()->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Avisos/')->
  end();
 
echo "Testando Requisição de Disciplina sem semestre trancado \n";

$browser->get('/guard/logout')->get('/')
        ->setField('signin[username]', '12696111')
        ->setField('signin[password]', '123')                
         ->click('Entrar');

$browser->
  get('/aluno/matricula')->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Requisição de Disciplina/')->
  end();

$browser->
  get('/matricula/743/ListComprovanteMatricula?tipo=regular')->with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Comprovante de Matricula/')->
  end();