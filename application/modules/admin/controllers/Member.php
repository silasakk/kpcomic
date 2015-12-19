<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Public_Controller {

	public $table = "member";
	public $api_id;
	public $api_key;

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
		$this->api_id = $this->config->item('api_id');
		$this->api_key = $this->config->item('api_key');
	    
	}
	

	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://milin.ready.co.th/api/?action=GetMember&api_id={$this->api_id}&api_key={$this->api_key}");
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);


		$this->update_list(json_decode($output));

		$sql = "select * from member order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('member/index',$data);
	}

	public function form($id=null)
	{



		if($id){
			$sql = "select * from member where member_id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->member_id = null;
			$data["data"][0]->name = null;
			$data["data"][0]->lastname = null;
			$data["data"][0]->telephone = null;
			$data["data"][0]->password = null;
			$data["data"][0]->email = null;
			$data["data"][0]->remark = null;
			$data["data"][0]->created_at = null;
			$data["data"][0]->updated_at = null;
			$data["data"][0]->level = null;
			$data["data"][0]->facebook_id = null;

		}

		$this->template->build('member/form',$data);
	}

	public function form_address($member_id,$id=null)
	{
		if($id){
			$sql = "select * from member_address where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->member_id = $member_id;
			$data["data"][0]->current = null;
			$data["data"][0]->address = null;
		}
		$this->template->build('member/form_address',$data);
	}
	public function save_address($member_id,$id=null)
	{

		if($this->input->post("current")){
			//clear current address
			$data = array('current' => 0);
			$this->db->where('member_id', $member_id);
			$this->db->update('member_address', $data);
		}

		if($id){
			//update current address
			$data = array('current' => $this->input->post("current"),'address' => $this->input->post("address"));
			$this->db->where('id', $id);
			$this->db->update('member_address', $data);
		}else{
			//add current address
			$data = array('current' => $this->input->post("current"), 'address' => $this->input->post("address"), 'member_id' => $member_id);
			$this->db->insert('member_address', $data);

		}

		if($this->input->post("current")) {

			//send to pos
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://milin.ready.co.th/api/");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "action=UpdateMember&api_id={$this->api_id}&api_key={$this->api_key}&member_id={$member_id}&address={$data['address']}&password=");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($data);


		}


		$this->session->set_flashdata("success",true);
		redirect("/admin/member/form/".$member_id);
	}
	public function delete_member_address($member_id="",$id=""){
		if($id){
			$this->db->delete('member_address', array('id' => $id));
		}
		redirect("admin/member/form/".$member_id);
	}

	public function save($id=null)
	{
		

		if($id){

			//prepare for update user address
			$addres_id = $this->input->post("current");

			//get addres by id
			$sql = "select * from member_address where id = '{$addres_id}' ";
			$qry = $this->db->query($sql);
			$row = $qry->row();

			//clear current address
			$data = array('current' => 0);
			$this->db->where('member_id', $id);
			$this->db->update('member_address', $data);

			//update current address
			$data = array('current' => 1);
			$this->db->where('id', $addres_id);
			$this->db->update('member_address', $data);




			//prepare for update user
			$data = array(
				'name' 		=> $this->input->post('name') ,
				'lastname' 		=> $this->input->post('lastname') ,
				'telephone' 	=> $this->input->post('telephone') ,
				'email' 		=> $this->input->post('email') ,
				'remark' => $this->input->post('remark') ,
				'level' 	=> $this->input->post('level'),
				'password' 	=> $this->input->post('password'),
				'enable' 	=> $this->input->post('enable'),
            );
			$this->db->where('member_id', $id);
			$this->db->update('member', $data);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://milin.ready.co.th/api/");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"action=UpdateMember&api_id={$this->api_id}&api_key={$this->api_key}&member_id={$id}&name={$data['name']}&lastname={$data['lastname']}&telephone={$data['telephone']}&remark={$data['remark']}&password={$data['password']}");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close ($ch);
			$data = json_decode($data);
			//var_dump($data);


			$this->session->set_flashdata("success",true);

		}else{


//			$data = array(
//				'name' 		=> $this->input->post('title') ,
//				'lastname' 		=> $this->input->post('category_id') ,
//				'telephone' 	=> $this->input->post('e_date') ,
//				'email' 		=> $_POST["thumbnail"][0],
//				'remark' => $this->input->post('media_type') ,
//				'level' 	=> $this->input->post('content',false)
//			);
//
//
//			$this->db->insert($this->table, $data);
//			$id = $this->db->insert_id();
//			$this->session->set_flashdata("success",true);
		}
		//save_meta($id,$this->table);
		redirect("/admin/member/form/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete('member', array('id' => $id));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://milin.ready.co.th/api/");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"action=DeleteMember&api_id={$this->api_id}&api_key={$this->api_key}&member_id={$id}");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close ($ch);
			$data = json_decode($data);

		}
		redirect("admin/member/");
	}

	function update_list($data){


		foreach($data->customers as $value){

			//select query
			$sql = "select * from member where member_id = '{$value->id}'";
			$qry = $this->db->query($sql);
			$row = $qry->row();
			if($row){
				//update user from pos
				$arr = array(
					"member_id" => $value->id,
					"name" => $value->name,
					"lastname" => $value->lastname,
					"telephone" => $value->telephone,
					"email" => $value->email,
					"remark" => $value->remark,
					"enable" => $value->enable,
					"created_at" => $value->created_date,
					"updated_at" => $value->modified_date,

				);
				$this->db->where("member_id" , $value->id);
				$this->db->update("member",$arr);

				//update address from pos
				$arr = array(
					"member_id" => $value->id,
					"address" => $value->address,
					"created_at" => $value->created_date,
					"updated_at" => $value->modified_date,

				);
				$this->db->where("member_id" , $value->id);
				$this->db->where("pos" , 1);
				$this->db->update("member_address",$arr);
			}else{
				$arr = array(

					"member_id" => $value->id,
					"name" => $value->name,
					"lastname" => $value->lastname,
					"telephone" => $value->telephone,
					"email" => $value->email,
					"remark" => $value->remark,
					"enable" => $value->enable,
					"level" => "customers",
					"created_at" => $value->created_date,
					"updated_at" => $value->modified_date,
				);
				$this->db->insert("member",$arr);
				$arr = array(
					"member_id" => $value->id,
					"address" => $value->address,
					"pos" => 1,
					"created_at" => $value->created_date,
					"updated_at" => $value->modified_date,

				);
				$this->db->insert("member_address",$arr);
			}

		}

	}

}