<?php

namespace Models\Mlog;

use Resources,Libraries;

class Mlog {
    
    public function __construct(){
        $this->db = new \Resources\Database;   
    }
    
    public function insertLog(){
        #load
        $this->helper = new \Libraries\Helper\Helper();
        
        $query  =   $this->db->insert(  'm_log', 
                                        array(
                                                'iduser'        => $this->session->getValue('userdata')['email'], 
                                                'ip'            => $this->helper->getRealIp(),
                                                'date'          => date('Y-m-d H:i:s'),
                                                'page_url'      => '1',
                                                'action'        => '',
                                                'description'   => ''                 
                                        )
                    );
    }
    
}