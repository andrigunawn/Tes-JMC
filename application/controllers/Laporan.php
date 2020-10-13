<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->library('tampilan');        
        $this->load->Model('ModelUtama');
       
    }
	
	public function index()
	{			
		$data['penduduk'] = $this->ModelUtama->getPenduduk_prov();		
		$this->tampilan->view('laporan/per_provinsi',$data);
	}

	public function print()
	{			
		$data['penduduk'] = $this->ModelUtama->getPenduduk_prov();		
		$this->tampilan->view('laporan/print',$data);
	}

	public function perKabupaten()
	{			
		$data['provinsi'] = $this->ModelUtama->getData('provinsi');
		$this->tampilan->view('laporan/per_kabupaten',$data);
	}

	function ajax_kabupaten(){
		$postData = $this->input->post();		
		$data = array();
		$list = $this->ModelUtama->getPendudukKabupaten($postData);		
		$kab = $this->ModelUtama->getData('kabupaten');		
		$no = $_POST['start'];
		foreach ($list->result() as $key => $value) {			
		$no++;
		$row = array();
            	                         
                $row[] = $no;
                $row[] = $value->prov;
                $row[] = $value->nama;           
                $row[] = $value->jumlah_penduduk;           
                
 
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

	

	 public function ajax_print()
    {        
        $provinsi = $this->input->get('provinsi');		
		$data['list'] = $this->ModelUtama->getPrint($provinsi);		      
        //output to json format
        $this->tampilan->view('laporan/print2',$data);
        //$this->exportexcel($list);
        //$this->excel_x($list);
    }

	

	
}
