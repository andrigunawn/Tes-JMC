<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->library('tampilan');        
        $this->load->Model('ModelUtama');
       
    }
	
	public function index()
	{	
		
		$data['provinsi'] = $this->ModelUtama->getData('provinsi');
		$this->tampilan->view('kabupaten/list_kabupaten',$data);
	}

	function ajax_kabupaten(){
		$postData = $this->input->post();		
		$data = array();
		$list = $this->ModelUtama->getKabupaten($postData);		
		$kab = $this->ModelUtama->getData('kabupaten');		
		$no = $_POST['start'];
		foreach ($list->result() as $key => $value) {			
		$no++;
		$row = array();
            	                         
                $row[] = $no;
                $row[] = $value->prov;
                $row[] = $value->nama;           
                $row[] = $value->jumlah_penduduk;           
                $row[] ='
                <button type="button" name="update" id="'.$value->id.'" class="btn btn-warning update">Update </button><br>
                 <button type="button" name="delete" id="'.$value->id.'" class="btn btn-danger delete">Delete </button><br>
                ';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $kab->num_rows(),
                        "recordsFiltered" => $list->num_rows(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function tambahKabupaten(){ 
		
			$nama = $this->input->post('nama');
			$kabupaten = array(
							'provinsi_id' => $this->input->post("provinsi_id"),
							'nama' => $this->input->post("nama_kab"),
							'jumlah_penduduk' => $this->input->post("jumlah"),
							
							
					 	);
			$insert = $this->ModelUtama->insertData('kabupaten',$kabupaten);
			if ($insert){
				redirect('kabupaten','refresh');
			}
				

	}
	

	public function simpanUpdate(){ 
		
			$id = $this->input->post('id');
			$kabupaten = array(
							'provinsi_id' => $this->input->post("provinsi"),
							'nama' => $this->input->post("nama"),
							'jumlah_penduduk' => $this->input->post("jumlah"),
							
					 	);
			$update = $this->ModelUtama->updateData('kabupaten',$kabupaten,$id);
			
			if ($update){
				redirect('kabupaten','refresh');
			}
		
		

	}

	public function hapusKabupaten(){
		$id = $_REQUEST['id_delete'];
		$delete = $this->ModelUtama->deleteData('kabupaten',$id);
		if ($delete){
				redirect('kabupaten');
			}
	}

	public function editKabupaten()
  	{
	    $id = $_REQUEST['id'];
	   	$data['kabupaten'] = $this->ModelUtama->getDataSatu('kabupaten',$id);
		$data['provinsi'] = $this->ModelUtama->getData('provinsi');
	    $this->load->view('kabupaten/modal_edit',$data);
  	}
}
