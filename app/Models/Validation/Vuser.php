<?php

namespace Models\Validation;

use Resources;

class Vuser extends Resources\Validation {

    public function setRules() {
        return array(
                        'nik' =>  array(
                                        'rules' =>  array(
                                                            'required',
                                                            'min'       => 3,
                                                            'callback'  => 'cekNik'         
                                                    ),
                                        'label' => 'Nomor Anggota',
                                        'filter'=> array('trim','strtolower','ucwords')
                                    ),
                        'email' =>  array(
                                        'rules' =>  array(
                                                            'required',
                                                            'email',
                                                            'callback' =>   'cekEmail'    
                                                    ),
                                        'label' => 'Email',
                                        'filter'=> array('trim','strtolower')
                                        ),         
                        'password'  =>  array(
                                            'rules' => array(
                                                            'required',
                                                            'min'       => 6,
                                                            'compare'   => 'repassword'
                                                        ),
                                            'label' => 'Password'
                                        ),
                        'repassword'  =>  array(
                                                'rules' => array(
                                                                    'required',
                                                                    'min'   => 6
                                                            ),
                                                'label' => 'Retype Password'
                                        )
        );
    }
    
    public function cekNik($field,$value,$label){
        #load
        $this->db   = new \Resources\Database; 
        
        $query  = $this->db->getOne('m_users', array('nik' => $value), array('nik') );
        
        if(isset($query->nik)){
            if( $query->nik != $value ){
                return true;
            }else{
                $this->setErrorMessage($field, 'NIK already exists.');
                return false;
            }
        }else{
            return true;
        }
        
    }
    
    public function cekEmail($field,$value,$label){
        #load
        $this->db   = new \Resources\Database; 
        
        $query  = $this->db->getOne('m_users', array('email' => $value, 'flagstate' => '1'), array('email') );
        
        if(isset($query->email)){
            if( $query->email != $value ){
                return true;
            }else{
                $this->setErrorMessage($field, 'Email already exists.');
                return false;
            }
        }else{
            return true;
        }
        
    }

}