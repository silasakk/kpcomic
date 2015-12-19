<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {


	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}

	
	public function index_banner()
	{
		$sql = "select * from home_banner order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('home/index_banner',$data);
	}
	public function index_slide()
	{
		$sql = "select * from home_slide order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('home/index_slide',$data);
	}

	public function form_banner($id=null)
	{
		$sql = "select * from layouts where grid_selected = '1'";
		$qry = $this->db->query($sql);
		$data["grid"] = $qry->result();

		$sql = "select * from home_banner where size != ''";
		$qry = $this->db->query($sql);
		$data["banner"] = $qry->result();

		if($id){
			$sql = "select * from home_banner where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->media_type = null;
			$data["data"][0]->size = null;
			$data["data"][0]->link = null;
			$data["data"][0]->image = null;
			$data["data"][0]->image_tablet = null;
			$data["data"][0]->v_url = null;
			$data["data"][0]->v_type = null;

		}
		$this->template->build('home/form_banner',$data);
	}
	public function form_slide($id=null)
	{
		if($id){
			$sql = "select * from home_slide where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->link = null;
			$data["data"][0]->image = null;
			

		}
		$this->template->build('home/form_slide',$data);
	}
	public function setting_index()
	{
		$sql = "select * from layouts";
		$qry = $this->db->query($sql);
		$data['layouts'] = $qry->result();
		$this->template->set_theme('admin');
        $this->template->set_layout('index');
		$this->template->build('home/setting_index',$data);
	}
	public function setting($id=null)
	{
		$data['layout'] = null;
		if($id){
			$sql = "select * from layouts where id = '$id'";
			$qry = $this->db->query($sql);
			$data['layout'] = $qry->result();

		}
		$this->template->set_theme('admin');
        $this->template->set_layout('index');
		$this->template->build('home/setting',$data);
	}
	public function del_grid($id)
	{
		if($id){
			$this->db->delete('layouts', array('id' => $id)); 
		}
		redirect("admin/home/setting_index");
	}
	public function delete_slide($id)
	{
		if($id){
			$this->db->delete('home_slide', array('id' => $id)); 
		}
		redirect("admin/home/index_slide");
	}
	public function delete_banner($id)
	{
		if($id){
			$this->db->delete('home_banner', array('id' => $id)); 
		}
		redirect("admin/home/index_banner");
	}
	public function save_setting($id=null){

		$eleindex = $this->input->post('eleindex');
		$elewidth = $this->input->post('elewidth');
		$eleheight = $this->input->post('eleheight');

		//prepare data to serialize
		foreach ($eleindex as $key => $value) {
			$context[] = array(
				"index" => $eleindex[$key],
				"width" => $elewidth[$key],
				"height" => $eleheight[$key],
			);
		}
		$enc = serialize($context);

		//active record
		if($id){
			$data = array('layout_context' => $enc);
			$this->db->where('id', $id);
			$this->db->update("layouts", $data); 
		}else{
			$data = array(
			   'layout_context'    => $enc,
			   'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert("layouts", $data); 
		}
	}
	public function save_slide($id=null){
		//active record
		if($id){
			$data = array(
				'link' => $_POST["link"],
				'image' => $_POST["thumbnail"][0]
			);
			$this->db->where('id', $id);
			$this->db->update("home_slide", $data); 
			$this->session->set_flashdata("success",true);
		}else{
			$data = array(
				'link' => $_POST["link"],
				'image' => $_POST["thumbnail"][0],
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert("home_slide", $data); 
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}
		redirect("/admin/home/form_slide/".$id);
	}




	public function save_banner($id=null){

		//active record
		if($id){
			$data = array(
				'media_type' => @$_POST["media_type"],
				'size' 		 => @$_POST["gid"],
				'link' 		 => @$_POST["link"],
				'image' 	 => @$_POST["thumbnail"][0],
				'image_tablet' 	 => @$_POST["thumbnail_tablet"][0],
				'v_url' 	 => (@$_POST["v_type"]=="youtube")? @$_POST["v_url"]["youtube"]:@$_POST["v_url"]["vimeo"] ,
				'v_type' 	 => @$_POST["v_type"],
			);

			$this->db->where('id', $id);
			$this->db->update("home_banner", $data); 
			$this->session->set_flashdata("success",true);
		}else{
			$data = array(
				'media_type' => @$_POST["media_type"],
				'size' 		 => @$_POST["gid"],
				'link' 		 => @$_POST["link"],
				'image' 	 => @$_POST["thumbnail"][0],
				'image_tablet' 	 => @$_POST["thumbnail_tablet"][0],
				'v_url' 	 => (@$_POST["v_type"]=="youtube")? @$_POST["v_url"]["youtube"]:@$_POST["v_url"]["vimeo"] ,
				'v_type' 	 => @$_POST["v_type"],
				'created_at' => date("Y-m-d H:i:s")
			);
			
			$this->db->insert("home_banner", $data); 
			$id = $this->db->insert_id();

			$this->session->set_flashdata("success",true);
		}
	
		redirect("/admin/home/form_banner/".$id);
	}


	public function save_gds(){

		$data = array(
			'grid_selected' => 0,
			
		);

		
		$this->db->update("layouts", $data); 


		$data = array(
			'grid_selected' => 1,
			
		);

		$this->db->where('id', @$_POST["select-grid"]);
		$this->db->update("layouts", $data); 
		redirect("/admin/home/setting_index");
	}
	
}
