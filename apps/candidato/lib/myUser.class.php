<?php

class myUser extends sfGuardSecurityUser
{
    public function getId(){
        return $this->getGuardUser()->getIncremented();
    }
    
    public function isProfessor(){
        return $this->hasGroup('Professor');
    }
    
    public function isCoordinator(){
        return $this->hasGroup('Coordenador');
    }
    
    public function isStudent(){
        return $this->hasGroup('aluno');
    }
    
    public function isAdmin(){
        return $this->hasGroup('admin1') || $this->hasGroup('admin2') || $this->hasGroup('admin3') || $this->hasGroup('super admin');
    }
    
    public function getTbCandidato(){
        return TbCandidatoTable::getInstance()->findOneBy('user_id', $this->getId());
    }
 
    
}