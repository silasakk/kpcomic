<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Public_Controller {

	public $table = "page_settings";

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}

	public function index_contact()
	{
		redirect("admin/setting/form_contact");
	}
	public function index_brand()
	{
		redirect("admin/setting/form_brand");
	}

	public function form_contact($id=1)
	{
		if($id){
			$sql = "select * from ".$this->table." where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->address = null;
			$data["data"][0]->tel = null;
			$data["data"][0]->fax = null;
			$data["data"][0]->email = null;
			$data["data"][0]->contact_email = null;
		}
		
		$this->template->build('setting/form_contact',$data);
	}
	public function form_brand($id=1)
	{
		if($id){
			$sql = "select * from ".$this->table." where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->brand1 = null;
			$data["data"][0]->brand2 = null;
		}
		
		$this->template->build('setting/form_brand',$data);
	}
	public function save_contact($id=1)
	{
		
		
		if($id){
			$data = array(
               
               'address' 		   	=> $this->input->post('address',false) ,
               'tel' 			   	=> $this->input->post('tel') ,
               'fax' 			   	=> $this->input->post('fax') ,
               'email' 				=> trim($this->input->post('email')) ,
               'contact_email' 		=> $this->input->post('contact_email') ,
              
			   
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               
               'address' 		   	=> $this->input->post('address',false) ,
               'tel' 			   	=> $this->input->post('tel') ,
               'fax' 			   	=> $this->input->post('fax') ,
               'email' 				=> trim($this->input->post('email')) ,
               'contact_email' 		=> $this->input->post('contact_email') ,
              
			   
            );
			
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}

		redirect("/admin/setting/form_contact/".$id);
	}

	public function save_brand($id=1)
	{
		
		
		if($id){
			$data = array(

               'brand1' 			=> $this->input->post('brand1',false) ,
               'brand2' 			=> $this->input->post('brand2',false) ,
			   
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(

               'brand1' 			=> $this->input->post('brand1',false) ,
               'brand2' 			=> $this->input->post('brand2',false) ,
			   
            );
			
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}

		redirect("/admin/setting/form_brand/".$id);
	}



}
