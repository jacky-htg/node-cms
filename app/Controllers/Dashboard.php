<?php 

namespace Controllers;
use Resources, Models, Libraries;

class Dashboard extends Resources\Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
        Resources\Import::composer();
    }

    public function index() 
    {
        #load
        $this->auth = new \Libraries\Auth\Auth();
        $this->session = new Resources\Session; 
        $this->mdashboard = new \Models\Mdashboard\Mdashboard();

        $d['title']='Dashboard';
        
        $sessid = $this->session->getValue('sessid');
        $d['multilevel'] = $this->auth->get_menu(0,$sessid['iduser']);
        
        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vmenu',$d);
        $this->output(THEMES.'vdashboard',$d);
        $this->output(THEMES.'vfooter',$d);
    }
    
    
}