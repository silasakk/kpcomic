<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('milin');
        $this->template->set_layout('index');
	    
	}

	public function index()
	{
		//------------slide------------
		$sql ="select * from home_slide order by id DESC";
		$qry = $this->db->query($sql);
		$data["slide"] = $qry->result();

		//-------------grid------------
		$sql ="select * from layouts where grid_selected = 1";
		$qry = $this->db->query($sql);
		$data["grid"] = $qry->result();

		//-------------banner----------
		$sql = "select * from home_banner where size != ''";
		$qry = $this->db->query($sql);
		$data["banner"] = $qry->result();
		
		$this->template->build('index',$data);


	}
	public function lookbook($slug)
	{
		//------------content------------
		$sql ="select * from collections where slug = '$slug'";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();


		$this->template->build('lookbook',$data);


	}

	public function press()
	{
		//------------slide------------
		$sql ="select * from press order by created_at DESC limit 0,10 ";
		$qry = $this->db->query($sql);
		$data["num_rows"] = $qry->num_rows();
		$data["data"] = $qry->result();


		$this->template->build('press',$data);


	}
	public function press_api($offset)
	{
		//------------slide------------
		$sql ="select * from press order by created_at DESC  LIMIT  ".(($offset-1)*10).",10 ";
		$qry = $this->db->query($sql);
		$data = $qry->result();


		foreach ($data as $key => $value) {
			$g = "";
			foreach (unserialize($value->item) as  $v) :
                $g .= '<a class="fresco" data-fresco-group="gp'.$key.'" href="./uploads/'.$v['image'].'"></a>';
            endforeach;

			echo    '<div class="col-sm-4 block-item">
		                <div>
		                    <a class="fresco" data-fresco-group="gp'.$key.'" href="./uploads/'.$value->thumbnail.'"> <img src="./uploads/'.$value->thumbnail.'" alt="" class="img-responsive thumbnail">
		                        <div class="thumbnail-overlay"><!-- [] --></div>
		                        <h4 class="text-uppercase">'.$value->name.'</h4>
		                        <p>'.$value->source.'</p></a>
		                    '.$g.'
		                </div>
		            </div>';
		}


	}
	public function brand()
	{
		//------------slide------------
		$sql ="select * from page_settings";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();


		$this->template->build('brand',$data);


	}

	public function contact()
	{
		//------------slide------------
		$sql ="select * from page_settings";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();

		if($this->input->post('name')){
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'smtp.mandrillapp.com',
			    'smtp_port' =>  '587',
			    'smtp_user' => 'pj@twentysix.co.th',
			    'smtp_pass' => 'kuIDKDMi1AAq-0_R0Fq7aQ',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			$this->email->from($data["data"][0]->contact_email);
	        $this->email->to($data["data"][0]->contact_email); 

	        $this->email->subject('Web Contact By '.$this->input->post('name'). " ".date("Y-m-d H:i:s"));
	        $this->email->message('
	        <h2>Contact from Customer</h2>
			<p><strong>Name : <strong>'.$this->input->post('name').'</p>
			<p><strong>Email : <strong>'.$this->input->post('email').'</p>
			<p><strong>Type : <strong>'.$this->input->post('dept').'</p>
			<p><strong>Msg : <strong>'.$this->input->post('msg').'</p>
	        ');  

			// Set to, from, message, etc.

			$result = @$this->email->send();
			//echo $this->email->print_debugger();die;
		}
		$this->template->build('contact',$data);


	}

	public function biography($slug = null)
	{
		//------------list------------
		$sql ="select * from biographies order by name";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();

		//------------person------------
		if($slug){
			$sql ="select * from biographies where slug = '".$slug."' ";
		}else{
			$sql ="select * from biographies limit 1 ";
		}
		$qry = $this->db->query($sql);
		$data["person"] = $qry->result();


		$this->template->build('bio',$data);


	}
	public function store($slug = null)
	{
		//------------list------------
		$sql ="select * from store order by name";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();

		//------------person------------
		if($slug){
			$sql ="select * from store where slug = '".urldecode($slug)."' ";
		}else{
			$sql ="select * from store order by name limit 1  ";
		}
		$qry = $this->db->query($sql);
		$data["store"] = $qry->result();


		$this->template->build('store',$data);


	}
	public function event($category=null)
	{
		$where = "";
		if($category){
			$where = "where category_id = '".$category."'";
		}
		//------------category------------
		$sql ="select * from event_category order by name";
		$qry = $this->db->query($sql);
		$data["category"] = $qry->result();

		//------------Event------------
		$sql ="select * from event ".$where." order by created_at DESC limit 0, 10";
		$qry = $this->db->query($sql);
		$data["event"] = $qry->result();


		$this->template->build('event',$data);
	}
	public function event_api($category,$offset=1)
	{
		$where = "";
		if($category != all){
			$where = "where category_id = '".$category."'";
		}
		//------------category------------
		$sql ="select * from event_category order by name";
		$qry = $this->db->query($sql);
		$data["category"] = $qry->result();

		//------------Event------------
		$sql ="select * from event $category order by created_at DESC limit ".( ($offset-1) * 10 ).", 10";
		$qry = $this->db->query($sql);
		$data["event"] = $qry->result();


		$this->template->build('event',$data);
	}
}