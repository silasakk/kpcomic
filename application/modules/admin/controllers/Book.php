<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends Public_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('admin');
        $this->template->set_layout('index');

    }

    public function form($id=null)
    {
        $this->template->append_metadata('<script type="text/javascript" src="themes/admin/assets/js/book.js" ></script>');
        $this->template->build('book/form');
    }

    function save($id=null){

        $sql = "select * from book where id = '{$id}'";
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
                if(!empty($value)){
                    $data = array(
                        'code' => $code,
                        'lang' => $key,
                        'name' => $value,
                        'tags' => serialize($_POST['tags']),
                        'created_at' => date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('book',$data);
                }
            }
        }

        //$this->session->set_flashdata('msg','Save data successfuly');
        //redirect('admin/book/form/'.$id);

    }





}
