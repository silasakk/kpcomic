<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter extends Public_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('admin');
        $this->template->set_layout('index');

    }

    public function index_list()
    {
        $sql = "select * from chapter  order by id DESC , book_id  desc";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        $data['data'] = $result;
        $this->template->build('chapter/index',$data);
    }

    public function form($id=null)
    {


        $sql = "select * from chapter  where id = '{$id}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        $data['data'] = $result;

        $this->template->append_metadata('<script type="text/javascript" src="themes/admin/assets/js/chapter.js" ></script>');
        $this->template->build('chapter/form',$data);
    }

    function save($id=null){



        $sql = "select * from chapter where id = '{$id}'";
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

            $data = array(
                'lang' => $this->input->post('language'),
                'book_id' => $this->input->post('comic_book'),
                'chapter_number' => $this->input->post('chapter_number'),
                'chapter_name' => $this->input->post('chapter_name'),
                'reading_mode' => $this->input->post('reading_mode'),
                'status' => $this->input->post('status_on'),
                'show_on' => $this->input->post('dd')." ".$this->input->post('tt'),
                'page' => serialize($this->input->post('page')),

            );
            $this->db->where('id',$id);
            $this->db->update('chapter',$data);




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
                'book_id' => $this->input->post('comic_book'),
                'chapter_number' => $this->input->post('chapter_number'),
                'chapter_name' => $this->input->post('chapter_name'),
                'reading_mode' => $this->input->post('reading_mode'),
                'status' => $this->input->post('status_on'),
                'show_on' => $this->input->post('dd')." ".$this->input->post('tt'),
                'page' => serialize($this->input->post('page')),
                'created_at' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('chapter',$data);
            $id = $this->db->insert_id();
        }

        $this->session->set_flashdata('msg','Save data successfuly');
        redirect('admin/chapter/form/'.$id);

    }

    function delete($code){

        $this->db->delete('book', array('code' => $code));

        $this->session->set_flashdata('msg','Remove data successfuly');
        redirect('admin/chapter/index_list');
    }








}
