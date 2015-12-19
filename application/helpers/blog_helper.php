<?php 
function meta_exists($id,$tb)
{
	$ci =& get_instance() ;
    $ci->db->where('tb',$id);
    $ci->db->where('link_id',$tb);
    $query = $ci->db->get('meta_tags');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}

function load_meta($id=null,$table=null){
    $ci =& get_instance() ;
    if($id){
        $sql = "select * from meta_tags where link_id = '".$id."' and tb = '".$table."'";
        $qry = $ci->db->query($sql);
        if($qry->num_rows()){
            $data = $qry->result();
        }
        else{
            $data[0] = new stdClass();
            $data[0]->meta_tag_title = null;
            $data[0]->meta_tag_desc = null;
            $data[0]->meta_tag_keyword = null;
        }
        
        
    }else{
        $data[0] = new stdClass();
        $data[0]->meta_tag_title = null;
        $data[0]->meta_tag_desc = null;
        $data[0]->meta_tag_keyword = null;
    }
    return $data;
    
}
function save_meta($id=null,$table=null){

    $ci =& get_instance() ;
    if($id && meta_exists($id,$table)){
        $data = array(
           'meta_tag_title'     => $ci->input->post('meta_tag_title') ,
           'meta_tag_desc'      => $ci->input->post('meta_tag_desc') ,
           'meta_tag_keyword'   => $ci->input->post('meta_tag_keyword') ,
           'tb'                 => $table ,
           'link_id'            => $id ,
       
        );
        $ci->db->where('tb', $table);
        $ci->db->where('link_id', $id);
        $ci->db->update('meta_tags', $data); 
        

    }else{
        
        $data = array(
           'meta_tag_title'     => $ci->input->post('meta_tag_title') ,
           'meta_tag_desc'      => $ci->input->post('meta_tag_desc') ,
           'meta_tag_keyword'   => $ci->input->post('meta_tag_keyword') ,
           'tb'                 => $table ,
           'link_id'            => $id ,
       
        );
        
        
        $ci->db->insert('meta_tags', $data); 
        $id = $ci->db->insert_id();

    }

    
}
function __($en,$th){
    if($_COOKIE['lang'] == 'th'){
        return $th;
    }else if($_COOKIE['lang'] == 'en'){
        return $en;
    }

}


 ?>