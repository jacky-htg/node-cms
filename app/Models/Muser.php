<?php

namespace Models;

use Resources,Libraries;

class Muser 
{
    
    public function __construct()
    {
        $this->db = new \Resources\Database;   
    }
    
    public function userList($param = array())
    {
        $sql    = " 
                    SELECT 
                            m_users.iduser, 
                            m_users.username,
                            m_users.first_name,
                            m_users.last_name,
                            m_users.email,
                            m_users.phone,
                            m_users.password 
                    FROM m_users 
                    LEFT JOIN t_country ON m_users.id_country   = t_country.id_country
                    LEFT JOIN t_province ON m_users.id_province = t_province.id_province
                    LEFT JOIN t_district ON m_users.id_district = t_district.id_district
                    
                ";
        if($param){
            $sql_where = " WHERE";
            $sql_where .= " email ='".$param['email']."'";
            
            $query = $this->db->results($sql.$sql_where); 
        }else{
            $query = $this->db->results($sql); 
        }
        
        
        if(isset($query)){
            return $query;
        }else{
            return false;
        }
        
    }
    
    public function userListCount()
    {
        $query  =   $this->db->row("   
                                    SELECT count(m_users.iduser) as numrecords
                                    FROM m_users 
                                    LEFT JOIN t_country ON m_users.id_country   = t_country.id_country
                                    LEFT JOIN t_province ON m_users.id_province = t_province.id_province
                                    LEFT JOIN t_district ON m_users.id_district = t_district.id_district
                    "); 
        if(isset($query->numrecords)){
            return $query->numrecords;
        }else{
            return false;
        }
    }
    
    public function userByID($iduser)
    {
       $query  =   $this->db->row("   
                                    SELECT *
                                    FROM m_users 
                                    LEFT JOIN t_country ON m_users.id_country   = t_country.id_country
                                    LEFT JOIN t_province ON m_users.id_province = t_province.id_province
                                    LEFT JOIN t_district ON m_users.id_district = t_district.id_district 
                                    WHERE iduser = $iduser
                    "); 
        if(isset($query)){
            return $query;
        }else{
            return false;
        } 
    }
    
    public function userMenuByID($iduser,$idmenu)
    {
       $query  =   $this->db->row("   
                                    SELECT *
                                    FROM s_menuuser 
                                    WHERE userid = $iduser AND menuid=$idmenu
                    "); 
        if(isset($query)){
            return $query;
        }else{
            return false;
        } 
    }
    
    public function province()
    {
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM t_province 
                                    WHERE status_province = 1
                                    ORDER BY province_name ASC
                    "); 
        return $query;
    }
    
    public function district($id_province)
    {
        if(!empty($id_province)){
            $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM t_district 
                                    WHERE id_province = $id_province
                                    ORDER BY district_name ASC
                        "); 
            return $query;
        }else{
            return false;
        }
    }
    
    public function createUser($image)
    {
        #load
        $this->request  = new Resources\Request;
        
        $img = json_decode($image['message']);
        //$img->folder.$img->name
        if(isset($img->folder)){
            $path_image = $img->folder.$img->name;
        }else{
            $path_image ='';
        }
        
        $query  =   $this->db->insert(  
                        'm_users', 
                        array(
                            'levelid'       => 1, 
                            'id_country'    => 1, 
                            'flagstate'     => 1, 
                            'date_create'   => date('Y-m-d H:i:s'),                 
                            'nik'           => $this->request->post('nik'), 
                            'email'         => $this->request->post('email',FILTER_VALIDATE_EMAIL),
                            'password'      => md5($this->request->post('password')),               
                            'hash_'         => password_hash($this->request->post('password'), PASSWORD_DEFAULT),
                            'image'         => $path_image                 
                        )
                    ); 
    }
    
    public function updateUser($image)
    {
        #load
        $this->request  = new Resources\Request;
        
        $img = json_decode($image['message']);
        //$img->folder.$img->name
        if(isset($img->folder)){
            $path_image = $img->folder.$img->name;
        }else{
            $path_image ='';
        }
        
        $query  =   $this->db->update(  
                        'm_users', 
                        array(
                            'levelid'       => 1, 
                            'id_country'    => 1, 
                            'flagstate'     => 1, 
                            'date_create'   => date('Y-m-d H:i:s'),                 
                            'nik'           => $this->request->post('nik'),  
                            'email'         => $this->request->post('email',FILTER_VALIDATE_EMAIL),
                            'password'      => md5($this->request->post('password')),               
                            'hash_'         => password_hash($this->request->post('password'), PASSWORD_DEFAULT),
                            'image'         => $path_image                 
                        ),
                        array(
                            'iduser' => $this->request->post('iduser')
                        )    
                    ); 
        
    }
    
    public function menuParent()
    {
        $query  =   $this->db->results("   
                        SELECT * 
                        FROM m_menu 
                        WHERE idparent=0 AND flagstate = 1
                    "); 
        return $query;   
    }
    
    public function menuChild($idmenu)
    {
        $query  =   $this->db->results("   
                        SELECT * 
                        FROM m_menu 
                        WHERE idparent = $idmenu  AND flagstate = 1
                    "); 
        return $query;   
    }

    public function deleteUser($iduser)
    {
        $query  =   $this->db->delete(  
                        'm_users', 
                        array('iduser' => $iduser)    
                    ); 
    }
    
}