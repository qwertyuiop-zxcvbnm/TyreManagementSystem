<?php
class Dashboard extends CI_Controller
{

	function __construct()
	{
	parent::__construct();
	  $this->load->helper('url');
	  $this->load->model('EventsModel','em');
	  $this->load->model('Upload_Model','um');
	  $this->load->database();
	  $this->load->helper('db_functions');
	  $this->load->helper('functions');
 
 
	}


   public function Reports()
   {
	$data['head']=$this->load->view('templates/head',null,true);
	$data['left_panel']=$this->load->view('templates/left_panel',null,true);
	$data['right_panel']=$this->load->view("templates/right_panel",null,true);
	$data['foot']=$this->load->view('templates/foot',null,true);
	$this->load->view('Admin/Reports',$data);
   }
}
