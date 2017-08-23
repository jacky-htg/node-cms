<?php

namespace Models\Mauth;

use Resources,Libraries;

class Mauth 
{

    public function __construct()
    {
        $this->db  = new \Resources\Database;
    }

    public function users($email)
    {
        $query  =   $this->db->getOne(
                                    'm_users',
                                    array('email' => $email, 'flagstate' => '1'),
                                    array('iduser','nik','no_absen', 'email','first_name', 'last_name','photo','levelid','hash_')
                                );

        return (isset($query))?$query:false;
    }

    public function update_hash($email,$new_hash)
    {
        $query = $this->db->update('m_users',
                                    array('hash_' => $new_hash),
                                    array('email' => $email)
                            );
    }

    public function update_lastlogin($email)
    {
        #load
        $this->helper = new \Libraries\Helper\Helper();

        $query = $this->db->update('m_users',
                                    array('lastlogin' => date('Y-m-d H:i:s'), 'lastip' => $this->helper->getRealIp()),
                                    array('email' => $email)
                            );
    }

    public function update_lastlogout($iduser)
    {
        #load
        $this->helper = new \Libraries\Helper\Helper();

        $query = $this->db->update('m_users',
                                    array('lastlogout' => date('Y-m-d H:i:s'), 'lastip_logout' => $this->helper->getRealIp()),
                                    array('iduser' => $iduser)
                            );
    }

    public function user_menu($parent,$iduser)
    {
        $query = $this->db->results("
                                    SELECT a.*
                                    FROM m_menu a
                                    WHERE a.`flagstate` = 1 AND a.idparent = $parent AND
                                          (a.idmenu IN (SELECT b.menuid FROM s_menulevel b, m_users c WHERE b.levelid = c.levelid and c.iduser = 1) OR
                                          a.idmenu in (SELECT d.menuid FROM s_menuuser d WHERE d.userid = 1))
                                    ORDER BY idparent, `order`, idmenu ASC"
                );
        return (isset($query))?$query:false;
    }

}
