<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_Controller
{

    public $api_id;
    public $api_key;
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('milin');
        $this->template->set_layout('index');
        $this->api_id = $this->config->item('api_id');
        $this->api_key = $this->config->item('api_key');

        if(!$this->session->userdata('user_id')){
            redirect('shop/auth/login');
        }
        //select query
        $sql = "select * from member where id = '{$this->session->userdata('user_id')}' ";
        $qry = $this->db->query($sql);
        $this->user = $qry->result();
    }

    function index(){
        $data['user'] = $this->user;
        $this->template->build('user/index',$data);
    }
    function access(){
        $data['user'] = $this->user;
        $this->template->build('user/access',$data);
    }
    function form_address($id = null){
        $data['user'] = $this->user;
        //select query
        $sql = "select * from member_address where id = '{$id}' and member_id = {$this->session->userdata('user_id')}";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        if($qry->num_rows()){
            $data['address'] = $result;
        }else{
            $data['address'][0] = new stdClass();
            $data['address'][0]->name = null;
            $data['address'][0]->address = null;
            $data['address'][0]->country = null;
            $data['address'][0]->post_code = null;
            $data['address'][0]->city = null;
            $data['address'][0]->recipient = null;
            $data['address'][0]->telephone = null;
        }
        $this->template->build('user/form_address',$data);
    }
    function save_address($id = null){

        if($id){
            $data['name']   = $this->input->post('name');
            $data['address']    = $this->input->post('address');
            $data['country']    = $this->input->post('country');
            $data['post_code']  = $this->input->post('post_code');
            $data['city']   = $this->input->post('city');
            $data['recipient']  = $this->input->post('recipient');
            $data['telephone']  = $this->input->post('telephone');


            $this->db->where('member_id' , $this->session->userdata('user_id'));
            $this->db->where('id' , $id);
            $this->db->update('member_address',$data );
            $this->session->set_flashdata('msg','Address has been updated');
        }else{

            $data['name']   = $this->input->post('name');
            $data['address']    = $this->input->post('address');
            $data['country']    = $this->input->post('country');
            $data['post_code']  = $this->input->post('post_code');
            $data['city']   = $this->input->post('city');
            $data['recipient']  = $this->input->post('recipient');
            $data['telephone']  = $this->input->post('telephone');
            $data['member_id'] = $this->session->userdata('user_id');
            $data['created_at'] = date("Y-m-d H:i:s");
            $this->db->insert('member_address',$data );
            $this->session->set_flashdata('msg','Address has been added');
        }

        redirect('shop/user/address');
    }
    function address(){
        $data['user'] = $this->user;
        $this->template->build('user/address',$data);
    }
    function delete_address($id){
        if($id){

            $this->db->delete('member_address', array('id' => $id , 'member_id' => $this->session->userdata('user_id')));
            $this->session->set_flashdata('msg','Address Deleted');
        }else{
            $this->session->set_flashdata('msg','Address Cannot delete');
        }
        redirect('shop/user/address');


    }
    function info(){
        $this->session->keep_flashdata('msg');
        $data['user'] = $this->user;
        $this->template->build('user/info',$data);
    }
    function info_save(){

        //update user
        $data = array(
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'telephone' => $this->input->post('telephone'),
            'card_id' => $this->input->post('card_id'),
            'birthday' => date("Y-m-d",strtotime($this->input->post('birthday'))),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'post_code' => $this->input->post('post_code'),
            'country' => $this->input->post('country'),
        );
        $this->db->where('id',$this->session->userdata('user_id'));
        $this->db->update('member',$data);


        $this->session->set_flashdata('msg','Account has been updated');
        redirect('shop/user/info');
    }
    function newsletter(){
        $data['user'] = $this->user;
        $this->template->build('user/newsletter',$data);
    }
    function save_newsletter(){
        //update user
        $data = array(
            'newsletter_milin' => $this->input->post('milin'),
            'newsletter_mimi' => $this->input->post('mimi')
        );
        $this->db->where('id',$this->session->userdata('user_id'));
        $this->db->update('member',$data);


        $this->session->set_flashdata('msg','Newsletter has been updated');
        redirect('shop/user/newsletter');
    }
    function order(){
        $data['user'] = $this->user;
        $this->template->build('user/order',$data);
    }
    function wishlist(){
        $data['user'] = $this->user;
        $this->template->build('user/wishlist',$data);
    }

}