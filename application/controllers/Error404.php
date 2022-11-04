<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');

//class Error404 extends CI_Controller { 
//   public function index(){
//      echo 'Error 404. Usted está intentando acceder a una página que no existe.'
//   }
//}

class Error404 extends CI_Controller { 
    
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Pagina_web_model');
        //$this->load->model('Producto_model');
        $this->load->model('Prueba_model');
        $this->load->model('Empresa_model');
        $this->load->helper('cookie');
    }            

    function index()
    {
      
        
//        $data['_view'] = 'login';
//        $this->load->view('layouts/404',$data);
        
        $data['_view'] = 'layouts/404';
        $this->load->view('layouts/main',$data);     
        
    }

}