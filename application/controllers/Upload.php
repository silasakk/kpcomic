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
        $width = "1500";

		$ds          = DIRECTORY_SEPARATOR;  //1
 
		$storeFolder = 'uploads';   //2
		 
		if (!empty($_FILES)) {

			$file_name = $_FILES['file']['name'] ;
			$info = @end( explode( '.' , $file_name ) ) ;

		      
		    $targetPath =  $storeFolder . $ds;  //4

		    $filename = uniqid(). ".".$info;
		     
		    $targetFile =  $targetPath.$filename ;  //5
		 


            /* Get original image x y*/
            list($w, $h) = getimagesize($_FILES['file']['tmp_name']);
            /* calculate new image size with ratio */

            $height=round($width*$h/$w);

            $ratio = max($width/$w, $height/$h);
            $h = ceil($height / $ratio);
            $x = ($w - $width / $ratio) / 2;
            $w = ceil($width / $ratio);
            /* new file name */
            $path = $targetFile;
            /* read binary data from image file */
            $imgString = file_get_contents($_FILES['file']['tmp_name']);
            /* create image from string */
            $image = imagecreatefromstring($imgString);
            $tmp = imagecreatetruecolor($width, $height);
            imagecopyresampled($tmp, $image,
                0, 0,
                $x, 0,
                $width, $height,
                $w, $h);
            /* Save image */
            switch ($_FILES['file']['type']) {
                case 'image/jpeg':
                    imagejpeg($tmp, $path, 100);
                    break;
                case 'image/png':
                    imagepng($tmp, $path, 0);
                    break;
                case 'image/gif':
                    imagegif($tmp, $path);
                    break;
                default:
                    exit;
                    break;
            }

            /* cleanup memory */
            imagedestroy($image);
            imagedestroy($tmp);

		    echo $filename ;



		     
		}
	}

    function delete($file){
        unlink('uploads/'.$file);
    }

}
