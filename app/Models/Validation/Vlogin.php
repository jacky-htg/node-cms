<?php

namespace Models\Validation;

use Resources;

class Vlogin extends Resources\Validation 
{

    public function setRules() 
    {
        return array(
                     'email'    => array(
                                              'rules'  => array(
                                                                       'required',
                                                                       'min' => 3,
                                                                       'email'
                                              ),
                                              'label'  => 'Email',
                                              'filter' => array(
                                                                       'trim',
                                                                       'strtolower'
                                              )
                     ),
                     'password' => array(
                                              'rules' => array(
                                                                       'required',
                                                                       'min' => 5
                                              ),
                                              'label' => 'Password'
                     )
        );
    }

}
