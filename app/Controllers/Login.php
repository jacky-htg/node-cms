<?php

namespace Controllers;
use Resources, Models, Libraries;

class Login extends Resources\Controller 
{

    public function __construct() 
    {
        parent::__construct();
        Resources\Import::composer();
    }

    public function index() 
    {
        $this->auth = new \Libraries\Auth\Auth();

        if ($this->auth->is_logged_in() == false) {
            $this->secure();
        }
        else {
            $this->redirect('dashboard');
        }

    }

    public function signup()
    {
        $d['title']="Sign up";

        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vlogin_signup',$d);
        $this->output(THEMES.'vfooter',$d);
    }

    public function password_reset()
    {
        $d['title']="Password";

        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vlogin_password',$d);
        $this->output(THEMES.'vfooter',$d);
    }

    public function secure() 
    {
        #load
        $this->auth     = new \Libraries\Auth\Auth();
        $this->request  = new Resources\Request;
        $login          = new \Models\Validation\Vlogin();

        $d['title'] = 'Secure Login';

        if (\Volnix\CSRF\CSRF::validate($_POST)) {

            switch ($this->request->post('mode')) {
                case 'signin':
                    if ($login->validate() === true) {

                        if($this->auth->do_login($_POST) === true){
                            $this->redirect('dashboard');
                        }
                    }
                    break;
            }
        }

        $this->output(THEMES . 'vheader', $d);
        $this->output(THEMES . 'vlogin', array('login' => $login));
        $this->output(THEMES . 'vfooter', $d);
    }

    function registration()
    {

    }

    function do_logout() 
    {
        $this->auth = new \Libraries\Auth\Auth();

        if ($this->auth->is_logged_in() == true) {
            $this->auth->do_logout();
        }
        $this->redirect('login');
    }

}
