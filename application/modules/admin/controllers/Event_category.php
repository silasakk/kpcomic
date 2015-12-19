<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_category extends Public_Controller {

	public $table = "event_category";

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}
	

	public function index()
	{
		$sql = "select * from ".$this->table." order by order_by";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('event_category/index',$data);
	}

	public function form($id=null)
	{

		

		if($id){
			$sql = "select * from ".$this->table." where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->name = null;
			$data["data"][0]->order_by = null;
			

		}

		$this->template->build('event_category/form',$data);
	}

	public function save($id=null)
	{
		
		
		if($id){
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'order_by' 	=> $this->input->post('order_by') ,
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'order_by' 	=> $this->input->post('order_by') ,
            );

			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}
		
		redirect("/admin/event_category/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/event_category/");
	}
}