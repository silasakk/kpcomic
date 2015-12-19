<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends Public_Controller {

	public $table = "store";

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}

	public function index()
	{
		$sql = "select * from ".$this->table." order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('store/index',$data);
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
			$data["data"][0]->address = null;
			$data["data"][0]->tel = null;
			$data["data"][0]->lat = null;
			$data["data"][0]->lng = null;
			$data["data"][0]->store_time = null;
			$data["data"][0]->hh = null;
			$data["data"][0]->mm = null;
		}
		
		$this->template->build('store/form',$data);
	}

	public function save($id=null)
	{
		
		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		if($id){
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'slug'		=> $slug,
               'address' 	=> $this->input->post('address',false) ,
               'tel' 		=> $this->input->post('tel') ,
               'lat' 		=> trim($this->input->post('lat')) ,
               'lng' 		=> trim($this->input->post('lng')) ,
               'name' 		=> $this->input->post('name') ,
			   'store_time' => serialize($this->input->post('store_time')) ,
			   'hh' 		=> serialize($this->input->post('hh')),
			   'mm' 		=> serialize($this->input->post('mm'))
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'slug'		=> $slug,
               'address' 	=> $this->input->post('address',false) ,
               'tel' 		=> $this->input->post('tel') ,
               'lat' 		=> trim($this->input->post('lat')) ,
               'lng' 		=> trim($this->input->post('lng')) ,
               'name' 		=> $this->input->post('name') ,
			   'store_time' => serialize($this->input->post('store_time')) ,
			   'hh' 		=> serialize($this->input->post('hh')),
			   'mm' 		=> serialize($this->input->post('mm')),
			   'created_at' => date("Y-m-d H:i:s")
            );
			
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}

		redirect("/admin/store/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/store/");
	}




}
