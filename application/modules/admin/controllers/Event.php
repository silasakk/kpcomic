<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Public_Controller {

	public $table = "event";

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}
	

	public function index()
	{
		$sql = "select * from event order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('event/index',$data);
	}

	public function form($id=null)
	{

		$data["meta"] = load_meta($id,$this->table);

		if($id){
			$sql = "select * from event where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->category_id = null;
			$data["data"][0]->title = null;
			$data["data"][0]->e_date = null;
			$data["data"][0]->media_type = null;
			$data["data"][0]->content = null;
			$data["data"][0]->link = null;
			$data["data"][0]->image = null;
			$data["data"][0]->v_url = null;
			$data["data"][0]->v_type = null;

		}

		$this->template->build('event/form',$data);
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
               'title' 		=> $this->input->post('title') ,
               'category_id' 		=> $this->input->post('category_id') ,
               'e_date' 	=> $this->input->post('e_date') ,
               'image' 		=> $_POST["thumbnail"][0],
               'media_type' => $this->input->post('media_type') ,
               'content' 	=> $this->input->post('content',false) ,
               'v_url' 		=> (@$_POST["v_type"]=="youtube")? @$_POST["v_url"]["youtube"]:@$_POST["v_url"]["vimeo"] ,
               'v_type' 	=> $this->input->post('v_type') ,
			   'gallery'	=> serialize($item)
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               'title' 		=> $this->input->post('title') ,
               'category_id' 		=> $this->input->post('category_id') ,
               'e_date' 	=> $this->input->post('e_date') ,
               'image' 		=> $_POST["thumbnail"][0],
               'media_type' => $this->input->post('media_type') ,
               'content' 	=> $this->input->post('content',false) ,
               'v_url' 		=> (@$_POST["v_type"]=="youtube")? @$_POST["v_url"]["youtube"]:@$_POST["v_url"]["vimeo"] ,
               'v_type' 	=> $this->input->post('v_type') ,
			   'gallery'	=> serialize($item),
			   'created_at' => date("Y-m-d H:i:s")
            );
			
			
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}
		save_meta($id,$this->table);
		redirect("/admin/event/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/event/");
	}
}