<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends Public_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('admin');
        $this->template->set_layout('index');

    }

    public function index_list()
    {
        $sql = "select * from book group by code order by id DESC , lang DESC";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        $data['data'] = $result;
        $this->template->build('book/index',$data);
    }

    public function form($code=null)
    {

        $sql = "select * from book where code = '{$code}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        if($qry->num_rows()){


            $data['data'] = $result;

        }else{

            $data['data'] = "";
        }

        $this->template->append_metadata('<script type="text/javascript" src="themes/admin/assets/js/book.js" ></script>');
        $this->template->build('book/form',$data);
    }

    function save(){

        $id = $this->input->post('code');

        $sql = "select * from book where code = '{$id}'";
        $qry = $this->db->query($sql);
        $row =  $qry->row();

        if($qry->num_rows()){
            /*
             *
             *
             * Update
             *
             *
             *  */

            $code = $row->code;
            foreach($_POST['lang_name'] as $key => $value){
                if(in_array($key,$this->input->post('language'))){

                    $sql = "select * from book where code = '{$row->code}' and lang = '{$key}' ";
                    $qry = $this->db->query($sql);
                    $r =  $qry->row();
                    if($r){
                        $data = array(
                            'lang' => $key,
                            'name' => $value,
                            'tags' => serialize(@$_POST['tags']),
                        );

                        $this->db->where('lang',$key);
                        $this->db->where('code',$row->code);
                        $this->db->update('book',$data);
                    }else{

                        $data = array(
                            'code' => $row->code,
                            'lang' => $key,
                            'name' => $value,
                            'tags' => serialize(@$_POST['tags']),
                            'created_at' => date('Y-m-d H:i:s'),
                        );

                        $this->db->insert('book',$data);

                    }


                }else{
                    $this->db->where('lang',$key);
                    $this->db->where('code',$row->code);
                    $this->db->delete('book');
                }
            }


        }else{
            /*
             *
             *
             * Insert
             *
             *
             *  */
            $code = substr(str_shuffle(MD5(microtime())), 0, 5);
            foreach($_POST['lang_name'] as $key => $value){
                if(in_array($key,$this->input->post('language'))){
                    $data = array(
                        'code' => $code,
                        'lang' => $key,
                        'name' => $value,
                        'tags' => serialize(@$_POST['tags']),
                        'created_at' => date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('book',$data);
                }
            }
        }

        $this->session->set_flashdata('msg','Save data successfuly');
        redirect('admin/book/form/'.$code);

    }

    function delete($code){

        $this->db->delete('book', array('code' => $code));

        $this->session->set_flashdata('msg','Remove data successfuly');
        redirect('admin/book/index_list');
    }





}
