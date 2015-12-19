<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bio extends Public_Controller {

	public $table = "biographies";

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
		$data["bio"] = $qry->result();
		$this->template->build('bio/index',$data);
	}
	public function form($id=null)
	{
		if($id){
			$sql = "select * from ".$this->table." where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["bio"] = $qry->result();
		}else{
			$data["bio"][0] = new stdClass();
			$data["bio"][0]->id = null;
			$data["bio"][0]->name = null;
			$data["bio"][0]->position = null;
			$data["bio"][0]->detail = null;
			$data["bio"][0]->image = null;
		}
		
		$this->template->build('bio/form',$data);
	}

	public function save($id=null)
	{
		
		$slug = url_title($this->input->post('name'), 'dash', TRUE);
		if($id){
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'slug'		=> $slug,
			   'position' 	=> $this->input->post('position') ,
			   'detail' 	=> $this->input->post('detail',false),
			   'image' 		=> @$_POST['gall'][0]
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
			   'name' 		=> $this->input->post('name') ,
			   'slug'		=> $slug,
			   'position' 	=> $this->input->post('position') ,
			   'detail' 	=> $this->input->post('detail',false),
			   'image' 		=> @$_POST['gall'][0],
			   'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}

		redirect("/admin/bio/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/bio/");
	}




}
