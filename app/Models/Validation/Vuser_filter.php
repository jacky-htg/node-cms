<?php

namespace Models\Validation;

use Resources;

class Vuser_filter extends Resources\Validation {

    public function setRules() {
        return array(
                        
                        'email' =>  array(
                                            'rules' =>  array('email'),
                                            'label' => 'Email',
                                            'filter'=> array('trim','strtolower')
                                    )        
        );
    }

}