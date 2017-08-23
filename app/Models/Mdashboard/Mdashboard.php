<?php

namespace Models\Mdashboard;

use Resources,Libraries;

class Mdashboard 
{
    
    public function __construct()
    {
        $this->db = new \Resources\Database;   
    }
    
    public function areaList()
    {
        $sql    = " SELECT *
                    FROM hris_karyawan_area
                  ";
        
            $query = $this->db->results($sql); 
        
        if(isset($query)){
            return $query;
        }else{
            return false;
        }
        
    }
    
    public function areaCount($id_area)
    {
        $query  =   $this->db->row("   
                                    SELECT count(id_area) as numrecords
                                    FROM m_users WHERE id_area=".$id_area
                    ); 
        if(isset($query->numrecords)){
            return $query->numrecords;
        }else{
            return false;
        }
    }
    
    public function departmentList()
    {
        $sql    = " SELECT *
                    FROM hris_karyawan_division 
                  ";
        
            $query = $this->db->results($sql); 
        
        if(isset($query)){
            return $query;
        }else{
            return false;
        }
        
    }
    
    public function departmentCount($id_division)
    {
        $query  =   $this->db->row("   
                                    SELECT count(id_division) as numrecords
                                    FROM m_users WHERE id_division=".$id_division 
                    ); 
        if(isset($query->numrecords)){
            return $query->numrecords;
        }else{
            return false;
        }
    }
    
    public function areaListCount()
    {
        $query  =   $this->db->row("   
                                    SELECT count(id_area) as numrecords
                                    FROM hris_karyawan_area 
                    "); 
        if(isset($query->numrecords)){
            return $query->numrecords;
        }else{
            return false;
        }
    }
    
    public function areaByID($id_area)
    {
       $query  =   $this->db->row("   
                                    SELECT *
                                    FROM hris_karyawan_area 
                                    WHERE id_area = $id_area
                    "); 
        if(isset($query)){
            return $query;
        }else{
            return false;
        } 
    }
    
    public function createKaryawanArea()
    {
        #load
        $this->request  = new Resources\Request;
        
        $query  =   $this->db->insert(  'hris_karyawan_area', 
                                        array(
                                                'name_area'         => $this->request->post('name_area'),
                                                'description_area'  => $this->request->post('description_area')
                                        )
                    ); 
    }
    
    public function divisionList($param = array())
    {
        $sql    = " SELECT *
                    FROM hris_karyawan_division 
                  ";
        if($param){
            $sql_where = " WHERE";
            $sql_where .= " id_division ='".$param['id_division']."'";
            
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
    
    public function divisionListCount()
    {
        $query  =   $this->db->row("   
                                    SELECT count(id_division) as numrecords
                                    FROM hris_karyawan_division 
                    "); 
        if(isset($query->numrecords)){
            return $query->numrecords;
        }else{
            return false;
        }
    }
    
    public function divisionByID($id_division)
    {
       $query  =   $this->db->row("   
                                    SELECT *
                                    FROM hris_karyawan_division 
                                    WHERE id_division = $id_division
                    "); 
        if(isset($query)){
            return $query;
        }else{
            return false;
        } 
    }
    
    public function createKaryawanDivision()
    {
        #load
        $this->request  = new Resources\Request;
        
        $query  =   $this->db->insert(  'hris_karyawan_division', 
                                        array(
                                                'name_division'         => $this->request->post('name_division')
                                        )
                    ); 
    }
    
    public function editKaryawanDivision()
    {
        #load
        $this->request  = new Resources\Request;
        $query  =   $this->db->update(  'hris_karyawan_division', 
                                        array(
                                                'name_division'         => $this->request->post('name_division')
                                        ),
                                        array(
                                                'id_division'         => $this->request->post('id_division')
                                        )    
                    ); 
    }
    
    public function deleteKaryawanDivision()
    {
        #load
        $this->request  = new Resources\Request;
        $query  =   $this->db->delete(  'hris_karyawan_division', 
                                        array(
                                                'id_division'         => $this->request->post('id_division')
                                        )    
                    ); 
    }
    
    #####
    public function jabatanList($param = array())
    {
        $sql    = " SELECT *
                    FROM hris_karyawan_jabatan 
                  ";
        if($param){
            $sql_where = " WHERE";
            $sql_where .= " id_jabatan ='".$param['id_jabatan']."'";
            
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
    
    public function jabatanListCount()
    {
        $query  =   $this->db->row("   
                                    SELECT count(id_jabatan) as numrecords
                                    FROM hris_karyawan_jabatan
                    "); 
        if(isset($query->numrecords)){
            return $query->numrecords;
        }else{
            return false;
        }
    }
    
    public function jabatanByID($id_jabatan)
    {
       $query  =   $this->db->row("   
                                    SELECT *
                                    FROM hris_karyawan_jabatan
                                    WHERE id_jabatan = $id_jabatan
                    "); 
        if(isset($query)){
            return $query;
        }else{
            return false;
        } 
    }
    
    public function createKaryawanJabatan()
    {
        #load
        $this->request  = new Resources\Request;
        
        $query  =   $this->db->insert(  'hris_karyawan_jabatan', 
                                        array(
                                                'name_jabatan'         => $this->request->post('name_jabatan')
                                        )
                    ); 
    }
    
    public function editKaryawanJabatan()
    {
        #load
        $this->request  = new Resources\Request;
        $query  =   $this->db->update(  'hris_karyawan_jabatan', 
                                        array(
                                                'name_jabatan'         => $this->request->post('name_jabatan')
                                        ),
                                        array(
                                                'id_jabatan'         => $this->request->post('id_jabatan')
                                        )    
                    ); 
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
    
    public function division(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_karyawan_division
                                    ORDER BY name_division ASC
                    "); 
        return $query;
    }
    
    public function jabatan(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_karyawan_jabatan
                                    ORDER BY name_jabatan ASC
                    "); 
        return $query;
    }
    
    public function area(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_karyawan_area
                                    ORDER BY name_area ASC
                    "); 
        return $query;
    }
    
    public function golongan(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_golongan_darah
                                    ORDER BY name_golongan ASC
                    "); 
        return $query;
    }
    
    public function sim(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_sim
                                    ORDER BY name_sim ASC
                    "); 
        return $query;
    }
    
    public function agama(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_agama
                                    ORDER BY name_agama ASC
                    "); 
        return $query;
    }
    
    public function kawin(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_kawin
                                    ORDER BY name_kawin ASC
                    "); 
        return $query;
    }
    
    public function karyawanStatus(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_karyawan_status
                                    ORDER BY name_status ASC
                    "); 
        return $query;
    }
    
    public function bank(){
        $query  =   $this->db->results("   
                                    SELECT * 
                                    FROM hris_bank
                                    ORDER BY name_bank ASC
                    "); 
        return $query;
    }
    
    public function district($id_province){
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
    
    public function timeStatistic()
    {
        $query  =   $this->db->results("   
                                        select 
                                            case
                                              when clock_in between '01:00:00' and '09:00:00' then 'before 09:00'
                                              when clock_in between '09:00:00' and '11:00:00' then '09:00-11:00'
                                         else 'after 11:00'
                                            end as label,
                                            count(id) as data
                                          from hris_master_absensi_new
                                          group by label
                    "); 
        return $query;  
    }
    
}