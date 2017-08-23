<?php

namespace Controllers;
use Resources, Models, Libraries;

class User extends Resources\Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
        Resources\Import::composer();
        $this->crypt    = new Resources\Encryption(1234567890);
    }
    
    public function index($page=1) 
    {
        #load
        $this->auth     = new \Libraries\Auth\Auth();
        $this->session  = new Resources\Session; 
        $this->muser    = new \Models\Muser(); 
        $this->request  = new Resources\Request;
        $this->pagination   = new Resources\Pagination();
        
        #paging
        $page = (int) $page;
        $limit = 10;
        
        #session
        $sessid             = $this->session->getValue('sessid');
        $d['multilevel']    = $this->auth->get_menu(0, $sessid['iduser']);
        
        $d['title'] = 'Manage User';
        
        if($this->request->post('mode') != ''){
            switch ($this->request->post('mode')) {
                case 'filter':
                        $result = $this->filter();
                        $d['validation']        = $result;
                        $d['user_list']         = $result['user_list'];
                        $d['user_list_count']   = $result['user_list_count'];  
                    break;
            }
            
        }else{
            $d['user_list']         = $this->muser->userList();
            $d['user_list_count']   = $this->muser->userListCount();  
        }
        
        $d['links']     = $this->pagination
                                ->setOption(
                                            array(
                                                    'limit'     => $limit,
                                                    'base'      => DOMAIN.'user/index/%#%/',
                                                    'total'     => $d['user_list_count'],
                                                    'current'   => $page,
                                                    'noHref'    => true                     
                                            )
                                )
                                ->getUrl();
        
        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vmenu',$d);
        $this->output(THEMES.'backend/admin/vuser_list',$d);
        $this->output(THEMES.'vfooter',$d);
    }
    
    public function create()
    {
        #load
        $this->auth         = new \Libraries\Auth\Auth();
        $this->session      = new Resources\Session; 
        $this->muser        = new \Models\Muser();
        $this->request      = new Resources\Request;
        $this->validation   = new Models\Validation\Vuser();
        
        #session
        $sessid             = $this->session->getValue('sessid');
        $d['multilevel']    = $this->auth->get_menu(0, $sessid['iduser']);
        
        $d['title']         = 'Manage User / Create User';

        $d['province']          = $this->muser->province();
        
        $d['validation'] = $this->post();
        
        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vmenu',$d);
        $this->output(THEMES.'backend/admin/vuser_create',$d);
        $this->output(THEMES.'vfooter',$d); 
    }
    
    public function edit()
    {
        #load
        $this->auth         = new \Libraries\Auth\Auth();
        $this->session      = new Resources\Session; 
        $this->muser        = new \Models\Muser();
        $this->request      = new Resources\Request;
        $this->validation   = new Models\Validation\Vuser();
        
        #session
        $sessid             = $this->session->getValue('sessid');
        $d['multilevel']    = $this->auth->get_menu(0, $sessid['iduser']);
        
        $d['title']         = 'Manage User / Edit User';
        
        $d['iduser']            = ($this->uri->path(2))?$this->uri->path(2):$this->request->post("iduser");
        $d['user_data']         = $this->muser->userByID($d['iduser']);
        
        $d['province']          = $this->muser->province();
        
        $d['validation'] = $this->postUpdate();
        
        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vmenu',$d);
        $this->output(THEMES.'backend/admin/vuser_edit',$d);
        $this->output(THEMES.'vfooter',$d); 
    }
    
    public function modul()
    {
        #load
        $this->auth         = new \Libraries\Auth\Auth();
        $this->session      = new Resources\Session; 
        $this->muser        = new \Models\Muser();
        $this->request      = new Resources\Request;
        $this->validation   = new Models\Validation\Vuser();
        
        
        #session
        $sessid             = $this->session->getValue('sessid');
        $d['multilevel']    = $this->auth->get_menu(0, $sessid['iduser']);
        
        $d['title']         = 'Manage User / Modul User';
        
        $d['menu_parent']   = $this->muser->menuParent();
        
        $iduser         = $this->crypt->decrypt($this->uri->path(2));
        $d['user']      = $this->muser->userByID($iduser);
        
        $this->output(THEMES.'vheader',$d);
        $this->output(THEMES.'vmenu',$d);
        $this->output(THEMES.'backend/admin/vuser_modul',$d);
        $this->output(THEMES.'vfooter',$d); 
        
    }
    
    public function filter()
    {
        #load
        $this->request      = new Resources\Request;
        $this->validation   = new Models\Validation\Vuser_filter();
        $this->helper       = new Libraries\Helper\Helper();
        $this->muser        = new \Models\Muser();
        
        if (\Volnix\CSRF\CSRF::validate($_POST)) {
            
            if ($this->validation->validate() == true) {
                
                if($this->muser->userList(array('email'=>$this->request->post('email'))) == true){
                    return array(
                                    'user_list'       => $this->muser->userList(array('email'=>$this->request->post('email'))),
                                    'user_list_count' => $this->muser->userListCount()            
                    );   
                }else{
                    return array(
                                    'user_list'       => $this->muser->userList(),
                                    'user_list_count' => $this->muser->userListCount()            
                    );
                }
                
            }else{
                return  array(
                                'post'      => $_POST,
                                'message'   => "<div class='alert alert-block alert-danger fade in'>".$this->validation->errorMessages(false, '<li>', '</li>').$this->validation->validate()."</div>",
                                'user_list'       => $this->muser->userList(),
                                'user_list_count' => $this->muser->userListCount()            
                );
            }
            
        }
    }
    
    public function post() 
    {
        #load
        $this->request      = new Resources\Request;
        $this->validation   = new Models\Validation\Vuser();
        $this->helper       = new Libraries\Helper\Helper();
        $this->muser        = new \Models\Muser();
        
        #option image
        $option =   array(
                            'folderLocation'    => 'cdn/images/user/'.date('Y').'/'.date('m').'/'.date('d').'/',
                            'permittedFileType' => 'jpeg|png|jpg',
                            'maximumSize'       => 2000000     
                    );
        
        if (\Volnix\CSRF\CSRF::validate($_POST)) {

            if ($this->validation->validate() == true) {
                
                $this->muser->createUser($this->helper->uploadFile($option));
                
                return  array(
                                'message'   => "<div class='alert alert-block alert-success fade in'>Saved</div>"                    
                        );
            }
            else {
                    return  array(
                                'post'      => $_POST,
                                'message'   => "<div class='alert alert-block alert-danger fade in'>".$this->validation->errorMessages(false, '<li>', '</li>').$this->validation->validate()."</div>"          
                            );
            }
        }
    }
    
    public function postUpdate() 
    {
        #load
        $this->request      = new Resources\Request;
        $this->validation   = new Models\Validation\Vuser_update();
        $this->helper       = new Libraries\Helper\Helper();
        $this->muser        = new \Models\Muser();
        
        #option image
        $option =   array(
                            'folderLocation'    => 'cdn/images/user/'.date('Y').'/'.date('m').'/'.date('d').'/',
                            'permittedFileType' => 'jpeg|png|jpg',
                            'maximumSize'       => 2000000     
                    );
        
        if (\Volnix\CSRF\CSRF::validate($_POST)) {

            if ($this->validation->validate() == true) {
                
                $this->muser->updateUser($this->helper->uploadFile($option));
                $this->redirect('user');
                return  array(
                                'message'   => "<div class='alert alert-block alert-success fade in'>Saved</div>"                    
                        );
            }
            else {
                    return  array(
                                'post'      => $_POST,
                                'message'   => "<div class='alert alert-block alert-danger fade in'>".$this->validation->errorMessages(false, '<li>', '</li>').$this->validation->validate()."</div>"          
                            );
            }
        }
    }

    public function delete()
    {
        #load
        $this->request  = new Resources\Request;
        $this->muser = new \Models\Muser();

        $this->muser->deleteUser($this->request->post('iduser'));

        $data = array('status'=>'ok');
        echo json_encode($data);
    }
    

}