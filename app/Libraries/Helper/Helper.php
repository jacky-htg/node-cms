<?php
namespace Libraries\Helper;
use Resources;

class Helper 
{
    
    public function getRealIp() 
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    public function sort($string)
    {
            switch ($string) {
            case "asc":
                return 'desc';
            case "desc":
                return  'asc';
        }
    }
    
    public function uploadFile($option = array()) 
    {
        #load
        $this->upload = new Resources\Upload();
        
        #setting
        $this->upload->setOption('folderLocation', $option['folderLocation'])
                        ->setOption('permittedFileType', $option['permittedFileType'])
                        ->setOption('autoRename', true)
                        ->setOption('maximumSize', $option['maximumSize']); //maximal size 2MB
        
        if (isset($_FILES['my_file'])) {

            $file   = $this->upload->now($_FILES['my_file']);

            if ($file) {
                return  array(
                                "status"    => "sukses",
                                "message"   => json_encode($this->upload->getFileInfo()) 
                        );
            }
            else {
                return  array(
                                "status"    => "gagal",
                                "message"   => json_encode($this->upload->getError('message'))
                        );
            }
        }
    }
    
    public function dateFormat()
    {
        
    }
    
    public function intToMonth($date_start,$date_end)
    {
        $datetime1 = new DateTime($date_start);
        $datetime2 = new DateTime($date_end);
        $interval = $datetime1->diff($datetime2);
    }
    
   public function getWebServer($function_name='getallheaders')
   {

        $all_headers = array();

        if(function_exists($function_name)){

            $all_headers = $function_name();
          
        }
        else{

            foreach($_SERVER as $name => $value){

                if(substr($name,0,5)=='HTTP_'){
              
                    $name = substr($name,5);
                    $name = str_replace('_',' ',$name);
                    $name = strtolower($name);
                    $name = ucwords($name);
                    $name = str_replace(' ', '-', $name);

                    $all_headers[$name] = $value;
                }
                elseif($function_name ==  'apache_request_headers'){

                    $all_headers[$name] = $value;
                }
            }
        }

        return $all_headers;
        
    }
      
}

