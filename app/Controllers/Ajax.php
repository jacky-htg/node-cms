<?php
namespace Controllers;
use Resources, Models;

class Ajax extends Resources\Controller
{
    public function __construct() {
        parent::__construct();
        Resources\Import::composer();
    }
    public function login()
    {
        //$this->output('ajax/alogin');
    }
    
    public function kategori_child(){
        #load
        $this->db       = new \Models\MContent\Mberita();
        $this->helper   = new \Libraries\Helper\Helper();
        
        $kategori_child  = $this->db->kategori_child(json_encode((int)$_POST['idkanal']));
        echo json_encode($kategori_child);
        
    }
    
    public function getDistrict(){
        #load
        $this->muser    = new \Models\Muser(); 
        
        $query  = $this->muser->district($_GET['id_province']);
        echo json_encode($query);
    }
    
    public function getDivision(){
        #load
        $this->mkaryawan    = new \Models\Mkaryawan(); 
        
        $query  = $this->mkaryawan->district($_GET['id_division']);
        echo json_encode($query);
    }
    
    public function getDivisionByArea(){
        #load
        $this->mkaryawan    = new \Models\Mkaryawan(); 
        
        $query  = $this->mkaryawan->divisionByIdArea($_GET['id_area']);
        echo json_encode($query);
    }
    
    public function getJabatanByDivision(){
        #load
        $this->mkaryawan    = new \Models\Mkaryawan(); 
        
        $query  = $this->mkaryawan->jabatanByIdDivision($_GET['id_division']);
        echo json_encode($query);
    }
    
    public function countRegisteredEmployee(){
        #load
        $this->mkaryawan    = new \Models\Mkaryawan(); 
        
        $query  = $this->mkaryawan->countRegisteredEmployee();
        echo json_encode($query);
    }
    
    public function countActiveEmployee(){
        #load
        $this->mkaryawan    = new \Models\Mkaryawan(); 
        
        $query  = $this->mkaryawan->countActiveEmployee();
        echo json_encode($query);
    }
    
    public function ageGroup(){
        #load
        $this->mkaryawan    = new \Models\Mkaryawan(); 
        
        $query  = $this->mkaryawan->ageGroup();
        echo json_encode($query,JSON_NUMERIC_CHECK);
    }
    
    public function timeStatistic(){
        #load
        $this->mdashboard   = new \Models\Mdashboard\Mdashboard();
        
        $query  = $this->mdashboard->timeStatistic();
        echo json_encode($query,JSON_NUMERIC_CHECK);
    }
    
    
    
}
