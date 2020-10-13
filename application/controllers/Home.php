<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->library('tampilan');
        
        $this->load->Model('ModelUtama');
       
    }
	
	public function index()
	{	
		$data["list"] = $this->ModelUtama->getData('transaksi');
		$data["pemasukan"] = $this->ModelUtama->getPemasukan();
		$data["pengeluaran"] = $this->ModelUtama->getPengeluaran();
		
		$this->tampilan->view('template/home',$data);
	}
}
