<?php

namespace Libraries\Auth;
use Resources;

class Auth 
{

    public function __construct() 
    {
        $this->db           = new \Models\Mauth\Mauth();
        $this->session      = new \Resources\Session();
        $this->cache        = new Resources\Cache;
        $this->session_data = null;
    }

    function do_login($param)
    {
        $mode           = isset($param['mode'])?$param['mode']:'';
        $email          = isset($param['email'])?$param['email']:'';
        $password       = isset($param['password'])?$param['password']:'';
        $rememberme     = isset($param['remember_me'])?$param['remember_me']:'';

        $result = $this->db->users($email);


        if ($result != false) {
            
            $userdata = $result;

            $session_data   =   array(
                                        'iduser'        => $userdata->iduser,
                                        'nik'           => $userdata->nik,
                                        'email'         => $userdata->email,
                                        'first_name'    => $userdata->first_name,
                                        'last_name'     => $userdata->last_name,
                                        'photo'         => $userdata->photo,
                                        'levelid'       => $userdata->levelid,
                                        'iscookie'      => 0,
                                        'islogin'       => 1
                                );

            $this->db->update_lastlogin($email);

            $this->session->setValue('sessid',$session_data);

            return true;

        }else{

            return false;

        }

    }

    function do_signup($email, $password) 
    {
        #load helper
        $new_hash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
                        'email'         => $email,
                        'password'      => md5($password),
                        'hash_'         => $new_hash,
                        'flagstate'     => 1,
                        'levelid'       => 1,
                        'lastip'        => get_real_ip(),
                        'date_create'   => date('Y-m-d H:i:s')
                );
    }

    function is_logged_in() 
    {
        $sess   = $this->session->getValue('sessid');

        if ($sess['iduser']) {
            return true;
        }
        else {
            return false;
        }
    }

    function restrict() 
    {
        if (isset($_COOKIE['_cn'])) {
            return true;
        }

        if ($this->is_logged_in() == false) {
            $this->redirect('login');
        }
    }

    function cek_menu($idmenu) 
    {
        
    }

    function get_menu($parent=0,$iduser) 
    {
        $sql = $this->db->user_menu($parent,$iduser);

        if ($sql != false) {

            $data = "";

            foreach ($sql as $row) {

                if ($row->class) {
        		    $tagclosed = "</li>";
        		    $ulsubopen = "<ul class='sub'>";
        		    $ulsubclosed = "</ul>";
        		} else {
        		    $tagclosed = "";
        		    $ulsubopen = "";
        		    $ulsubclosed = "";
        		}

        		$data .= "<li $row->class><a href='".DOMAIN . strtolower($row->url_menu) . "'><span>" . $row->nama_menu . "</span></a>";
        		$data .= $ulsubopen . $this->get_menu($row->idmenu,$iduser) . $ulsubclosed;
            }

            $data .= $tagclosed;
    	    $data .= "";
            
    	    return $data;
        }
    }

    function do_logout() 
    {
        $this->db->update_lastlogout($this->session->getValue('userdata')['iduser']);

        $this->session->destroy();
    }

}
