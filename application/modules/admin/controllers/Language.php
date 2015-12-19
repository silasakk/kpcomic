<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends Public_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('admin');
        $this->template->set_layout('index');

    }

    public function index_list()
    {
        $sql = "select * from language";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        $data['data'] = $result;
        $this->template->build('language/index',$data);
    }

    public function form($id=null)
    {
        $sql = "select * from language where id = '{$id}'";
        $qry = $this->db->query($sql);
        $word = $qry->result();

        if($qry->num_rows()){

            $sql = "select * from string_translation where code = '{$word[0]->code}'";
            $qry = $this->db->query($sql);
            $result = $qry->result();

            $data['word'] = $word;
            $data['data'] = $result;

        }else{
            $data['word'][0] = new stdClass();
            $data['word'][0]->lang = "";
            $data['word'][0]->code = "";

            $data['data'] ="";
        }

        $this->template->build('language/form',$data);



    }

    function save(){

        $sql = "select * from language where code = '{$this->input->post('code')}'";
        $qry = $this->db->query($sql);
        $check = $qry->result();

        if($qry->num_rows()){


            /*
             *
             *
             * Update
             *
             *
             *  */

            $data = array(
                'lang' => $this->input->post('language'),

            );
            $this->db->where('code',$this->input->post('code'));
            $this->db->update('language',$data);

            foreach($_POST['text'] as $key => $value){
                $data = array(
                    'text_translation' => $_POST['text'][$key],
                );
                $this->db->where('text',str_replace('__',' ',$key));
                $this->db->where('code',$this->input->post('code'));
                $this->db->update('string_translation',$data);

                $this->db->last_query();
            }
            $id = $check[0]->id;

        }else{

            /*
             *
             *
             * Insert
             *
             *
             *  */
            $data = array(
                'lang' => $this->input->post('language'),
                'code' => strtolower($this->input->post('code'))
            );
            $this->db->insert('language',$data);

            $id = $this->db->insert_id();

            foreach($_POST['text'] as $key => $value){
                $data = array(
                    'text' => $key,
                    'text_translation' => $_POST['text'][$key],
                    'code' => strtolower($this->input->post('code'))

                );
                $this->db->insert('string_translation',$data);
            }



        }
        $this->session->set_flashdata('msg','Save data successfuly');
        redirect('admin/language/form/'.$id);

    }

    function delete($id){

        $sql = "select * from language where id = '{$id}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        $this->db->delete('language', array('id' => $id));
        $this->db->delete('string_translation', array('code' => $result[0]->code));

        $this->session->set_flashdata('msg','Remove data successfuly');
        redirect('admin/language/index_list');
    }





}
