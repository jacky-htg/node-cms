<?php

namespace Models\Validation;

use Resources;

class Vuser_update extends Resources\Validation {

    public function setRules() {
        return array(
                        'nik' =>  array(
                                            'rules' =>  array(
                                                                'required',
                                                                'min'       => 3,
                                                                'callback' => 'cekNik'     
                                                        ),
                                            'label' => 'NIK',
                                            'filter'=> array('trim','strtolower','ucwords')
                                    ),
                        'firstname' =>  array(
                                            'rules' =>  array(
                                                                'required',
                                                                'min'       => 5,
                                                        ),
                                            'label' => 'Nama Karyawan',
                                            'filter'=> array('trim','strtolower','ucwords')
                                    ),
                        'area' =>  array(
                                            'rules' =>  array(
                                                                'required'
                                                        ),
                                            'label' => 'Area'
                                    ),
                        'division' =>  array(
                                            'rules' =>  array(
                                                                'required'
                                                        ),
                                            'label' => 'Division'
                                    ),
                        'kota' =>  array(
                                            'rules' =>  array(
                                                                'required'
                                                        ),
                                            'label' => 'Kota'
                                        ),            
                        'email' =>  array(
                                            'rules' =>  array(
                                                                'required',
                                                                'email'
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
                                        ), 
                        'phone'  =>  array(
                                                'rules' =>  array(
                                                                    'numeric',
                                                                    'min' => 5
                                                            ),
                                                'label' => 'Phone'
                                        ),          
                        //'my_file' =>  array(
                        //                    'rules' => array('file'),
                        //                    'label' => 'Photo'
                        //            ),
                        'kode_pos' =>  array(
                                            'rules' => array('numeric'),
                                            'label' => 'Kode Pos'
                                    ),
                        'alamat' =>  array(
                                            'rules' =>  array('min'=>5),
                                            'label' => 'Alamat',
                                            'filter' => array('trim')    
                                    )         
        );
    }
    
    public function cekNik($field,$value,$label){
        #load
        $this->db   = new \Resources\Database; 
        $this->request  = new Resources\Request;
        
        
        $query  = $this->db->select('nik')
                    ->from('m_users')
                    ->where('iduser', '!=', $this->request->post('iduser'))
                    ->where('AND nik', '=', $value)
                    ->getOne(); 
        
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