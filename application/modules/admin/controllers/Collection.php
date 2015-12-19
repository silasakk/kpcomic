<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends Public_Controller {

	public $table = "collections";

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
		$this->template->build('collection/index',$data);
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
			$data["data"][0]->showname1 = null;
			$data["data"][0]->showname2 = null;
			$data["data"][0]->showname3 = null;
			$data["data"][0]->season = null;
			$data["data"][0]->background = null;
			$data["data"][0]->brand = null;
			$data["data"][0]->story_exc = null;
			$data["data"][0]->story = null;
			$data["data"][0]->item = null;

		}
		
		$this->template->build('collection/form',$data);
	}

	public function save($id=null)
	{
		
		$item = array();
		if($this->input->post('image')){
			foreach ($_POST["image"] as $key => $value) {
				$item[] = array(
					"image"=>$_POST["image"][$key],
					"pd"=>array(
							"name" => $_POST["pd_name"][$key],
							"url" => $_POST["pd_url"][$key],
						)
					);
			}
		}
		//var_dump($item);die;

		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		if($id){
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'showname1' 		=> $this->input->post('showname1') ,
               'showname2' 		=> $this->input->post('showname2') ,
               'showname3' 		=> $this->input->post('showname3') ,
               'slug'		=> $slug ,
               'season' 	=> $this->input->post('season') ,
				'background' => $_POST['thumbnail'][0],
				'brand' => $_POST['brand'],
               'story_exc' 	=> $this->input->post('story_exc',false) ,
               'story' 		=> $this->input->post('story',false) ,
               'item'		=> serialize($item)
               
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data); 
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               'name' 		=> $this->input->post('name') ,
               'showname1' 		=> $this->input->post('showname1') ,
               'showname2' 		=> $this->input->post('showname2') ,
               'showname3' 		=> $this->input->post('showname3') ,
               'slug'		=> $slug ,
				'background' => $_POST['thumbnail'][0],
				'brand' => $_POST['brand'],
               'season' 	=> $this->input->post('season') ,
               'story_exc' 	=> $this->input->post('story_exc',false) ,
               'story' 		=> $this->input->post('story',false) ,
               'item'		=> serialize($item),
			   'created_at' => date("Y-m-d H:i:s")
            );
			
			$this->db->insert($this->table, $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}

		redirect("/admin/collection/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/collection/");
	}




}
 