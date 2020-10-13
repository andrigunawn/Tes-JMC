<?php
class Tampilan{
    protected $_ci;
     
    function __construct(){
        $this->_ci = &get_instance();
    }
     
    function view($content, $data = NULL){
                    
        $data['menu']        = $this->_ci->load->view('template/menu', $data, TRUE);            
        $data['content']       = $this->_ci->load->view($content, $data, TRUE);      
        $data['footer']        = $this->_ci->load->view('template/footer', $data, TRUE);
        
        $this->_ci->load->view('template/struktur', $data);
    }
}