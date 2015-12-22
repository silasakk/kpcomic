<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Public_Controller {


    public function __construct()
    {
        parent::__construct();

    }

    public function get_book()
    {
        $lang = $this->input->post('lang');

        $sql = "select * from book where lang = '{$lang}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        echo '<option value="" >Please select..</option>';

        foreach($result as $value){

            echo '<option value="'.$value->id.'" >'.$value->name.'</option>';

        }

    }

    public function check_chapter_number()
    {
        $chapter_number = $this->input->post('chapter_number');
        $comic_book = $this->input->post('comic_book');

        $sql = "select * from chapter where chapter_number = '{$chapter_number}' and book_id = '{$comic_book}' ";
        $qry = $this->db->query($sql);

        echo $qry->num_rows();

    }

    public function get_page()
    {


        $sql = "select page from chapter where id = '{$this->input->post('id')}' ";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        if(@$result){
            $page = unserialize($result[0]->page);
            $data = array();
            if($page){
                foreach(@$page as $value){
                    $data[] = array('name' => $value , 'size' => @filesize('uploads/'.$value) );
                }
            }


            header('Content-Type: application/json');
            echo json_encode($data);
        }else{
            header('Content-Type: application/json');
            echo json_encode(0);
        }


    }










}
