<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller
{

    public $api_id;
    public $api_key;

    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('milin');
        $this->template->set_layout('index');
        $this->api_id = $this->config->item('api_id');
        $this->api_key = $this->config->item('api_key');
    }

    function index(){
        $this->session->keep_flashdata("msg");
        $this->template->build('auth');
    }
    function post_login(){

        $email = addslashes($this->input->post('email'));
        $password = addslashes($this->input->post('password'));

        $sql = "select * from member where email = '{$email}' and password = '".md5($password)."' ";
        $qry = $this->db->query($sql);
        $result = $qry->row();


        if(@$result->id){
            $this->session->set_userdata('user_id',$result->id);
            redirect('shop');
        }else{
            $this->session->set_flashdata("msg","Sorry, the email or password is incorrect");
            redirect('shop/auth');
        }


    }
    function register(){
        if($this->session->userdata("user_id"))
            redirect('shop');
        $this->template->build('register');
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('shop');
    }

    function post_register(){
        //prepare for update user
        $data = array(
            'name' 		    => $this->input->post('firstname') ,
            'lastname' 		=> $this->input->post('lastname') ,
            'telephone' 	=> $this->input->post('telephone') ,
            'email' 		=> $this->input->post('email') ,
            'password' 	    => md5($this->input->post('password')),
            'card_id' 	    => $this->input->post('card_id'),
            'level' 	    => 'customers',
            'enable' 	    => 1,
            'created_at' => date("Y-m-d H:i:s")
        );

        $insert_id = $this->db->insert('member', $data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://milin.ready.co.th/api/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"action=AddMember&api_id={$this->api_id}&api_key={$this->api_key}&name={$data['name']}&lastname={$data['lastname']}&telephone={$data['telephone']}&email={$data['email']}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data_re = curl_exec($ch);
        curl_close ($ch);
        $data_re = json_decode($data_re);




        require_once APPPATH.'libraries/mandrill-api-php/src/Mandrill.php'; //Not required with Composer

        $mandrill = new Mandrill('2ICrBUfiFK85I4TEoVhTYQ');
        $template_name = 'Milin Registered';
        $template_content = array(
            array(
                'name' => 'email',
                'content' => $data['email']
            ),
            array(
                'name' => 'fullname',
                'content' => $data['name']." ".$data['lastname']
            ),
            array(
                'name' => 'telephone',
                'content' => $data['telephone']
            )
        );
        $message = array(
            'subject' => 'Milin Thank you for resgister',
            'from_email' => 'info@milin.com',
            'text' => 'now you can shopping in milin.com',
            'from_name' => 'Milin ',
            'to' => array(
                array(
                    'email' => $data['email'],
                    'name' => $data['name']." ".$data['lastname'],
                    'type' => 'to'
                )
            )
        );
        $async = false;
        $ip_pool = 'Main Pool';

        $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);



        $this->session->set_flashdata("msg","Register successfully");
        redirect('shop/auth');
        flush();
        //$this->db->where('id', $insert_id);
        //$this->db->update('member', array('member_id',$data->id));
    }

}