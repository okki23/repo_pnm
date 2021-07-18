<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Dashboard extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_dashboard');
 	}
 

	public function index(){
		 
 	 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'dashboard/dashboard_view';

		$this->load->view('template_view',$data);
	}
}
 