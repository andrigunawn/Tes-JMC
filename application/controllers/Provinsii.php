<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsii extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->library('tampilan');        
        $this->load->Model('ModelUtama');
       
    }
	
	public function index()
	{	
		
		$data['provinsi'] = $this->ModelUtama->getData('provinsi');
		$this->tampilan->view('provinsii/list_provinsi',$data);
	}

	function ajax_provinsi(){
		$postData = $this->input->post();		
		$data = array();			
		$list = $this->ModelUtama->getData('provinsi');		
		$no = $_POST['start'];
		foreach ($list->result() as $key => $value) {			
		$no++;
		$row = array();
            	                         
                $row[] = $no;
                
                $row[] = $value->nama;           
                        
                $row[] ='
                <button type="button" name="update" id="'.$value->id.'" class="btn btn-warning update">Update </button><br>
                 <button type="button" name="delete" id="'.$value->id.'" class="btn btn-danger delete">Delete </button><br>
                ';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $list->num_rows(),
                        "recordsFiltered" => $list->num_rows(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function tambahProvinsi(){ 
		
			
			$provinsi = array(							
							'nama' => $this->input->post("nama_provinsi"),							
					 	);
			$insert = $this->ModelUtama->insertData('provinsi',$provinsi);
			if ($insert){
				redirect('provinsii');
			}
				

	}
	

	public function simpanUpdate(){ 
		
			$id = $this->input->post('provinsi_id');
			$provinsi = array(
							
							'nama' => $this->input->post("nama"),
							
							
					 	);
			$update = $this->ModelUtama->updateData('provinsi',$provinsi,$id);
			
			if ($update){
				redirect('provinsii');
			}
		
		

	}

	public function hapusProvinsi(){
		$id = $_REQUEST['id_delete'];
		$delete = $this->ModelUtama->deleteData('provinsi',$id);
		if ($delete){
				redirect('provinsii');
			}
	}

	public function editProvinsi()
  	{
	    $id = $_REQUEST['id'];
	   	$data['provinsi'] = $this->ModelUtama->getDataSatu('provinsi',$id);		
	    $this->load->view('provinsii/modal_edit',$data);
  	}
}
