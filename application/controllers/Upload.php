<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$ds          = DIRECTORY_SEPARATOR;  //1
 
		$storeFolder = 'uploads';   //2
		 
		if (!empty($_FILES)) {

			$file_name = $_FILES['file']['name'] ;
			$info = @end( explode( '.' , $file_name ) ) ;
			
		     
		    $tempFile = $_FILES['file']['tmp_name'];          //3             
		      
		    $targetPath =  $storeFolder . $ds;  //4

		    $filename = uniqid(). ".".$info;
		     
		    $targetFile =  $targetPath.$filename ;  //5
		 
		    move_uploaded_file($tempFile,$targetFile); //6

		    echo $filename ;
		     
		}
	}
}
