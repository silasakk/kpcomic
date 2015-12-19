<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Press extends Public_Controller {

	public $table = "press";

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
		$this->template->build('press/index',$data);
		http://milin.ready.co.th/api.php?action=GetProduct&api_id=LBGuCCqmEM2lmPO7vmohk5yYqTnRwfTD&api_key=qYc8hNfMOhWhtC7PsEsW9FJeEFMdqxhj
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
			$data["data"][0]->source = null;
			$data["data"][0]->image = null;
		}
		
		$this->template->build('press/form',$data);
	}

	public function save($id=null)
	{
		
		$item = array();
		if($this->input->post('gall')){
			foreach ($_POST["gall"] as $key => $value) {
				$item[] = array("image"=>$_POST["gall"][$key]);
			}
		}
		if($id){
			$data = array(
               'name' 		=> $this->input->post('name') ,
			   'source' 	=> $this->input->post('source') ,
			   'thumbnail' 	=> $_POST["thumbnail"][0],
			   'item'		=> serialize($item)
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               'name' 		=> $this->input->post('name') ,
			   'source' 	=> $this->input->post('source') ,
			   'thumbnail' 	=> $_POST["thumbnail"][0],
			   'item'		=> serialize($item),
			   'created_at' => date("Y-m-d H:i:s")
            );
			
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}

		redirect("/admin/press/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/press/");
	}




}
