<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUtama extends CI_Model {

    public function getData($tabel){
        return $this->db->get($tabel);
    }
    public function getDataSatu($tabel,$id){
            $this->db->where('id',$id);
        return $this->db->get($tabel)->row();
    }
    
    public function getkabupaten($postData=''){
        $provinsi_id    = $postData['provinsi_id'];
        $nama    = $postData['pencarian'];
         $this->db->select('k.*,p.nama as prov');
         $this->db->from('kabupaten as k');
         $this->db->join('provinsi as p','p.id = k.provinsi_id','left');
         if ($provinsi_id) {
            $this->db->where('k.provinsi_id',$provinsi_id);
         }

         if ($nama) {            
            $this->db->like('k.nama',$nama);
            
            
         }
        return $this->db->get();
    }
     public function getPendudukKabupaten($postData=''){
        $provinsi_id    = $postData['provinsi_id'];
       
         $this->db->select('k.*,p.nama as prov');
         $this->db->from('kabupaten as k');
         $this->db->join('provinsi as p','p.id = k.provinsi_id','left');
         if ($provinsi_id) {
            $this->db->where('k.provinsi_id',$provinsi_id);
         }
        
        return $this->db->get();
    }
    public function getPrint($provinsi_id=''){
        
       
         $this->db->select('k.*,p.nama as prov');
         $this->db->from('kabupaten as k');
         $this->db->join('provinsi as p','p.id = k.provinsi_id','left');
         if ($provinsi_id) {
            $this->db->where('k.provinsi_id',$provinsi_id);
         }
        
        return $this->db->get();
    }

    public function getPenduduk_prov(){
        
        $query = $this->db->query("SELECT p.*,SUM(k.jumlah_penduduk) as total_penduduk FROM kabupaten k left join provinsi p ON p.id = k.provinsi_id GROUP BY provinsi_id");         
        return $query->result();
    }
    public function insertData($tabel,$data){
        return $this->db->insert($tabel, $data);
    }

    public function updateData($tabel,$data,$id){
        $this->db->where('id', $id);
        return $this->db->update($tabel, $data);
    }

    public function deleteData($tabel,$id){
        $this->db->where('id', $id);
        return $this->db->delete($tabel);
    }

    

    
 
   
}