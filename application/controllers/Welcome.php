<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        date_default_timezone_set('Asia/Kolkata');
        
    }


	public function index()
	{	
		$data['list'] = $this->Product_model->get_product_list();
		// print_r($data);
		$this->load->view('welcome_message',$data);
	}


	public function updatecode(){	
		if(isset($_POST))
    	{   
    	$this->Product_model->_table_name = "product";
        $this->Product_model->_primary_key = "id";
        $id=  $this->input->post('update_id');
        $update['product_name'] =  $this->input->post('pname'); 
        $update['product_price'] =  $this->input->post('product_price');  
        $update['product_desccription'] =  $this->input->post('description');  
        
         if (!empty($_FILES['product_image_1']['name'])){
            $val = $this->Product_model->upload_product_image('product_image_1');
            $update['product_image'] = $val['path'];

            // echo "Image";
        }



        $result = $this->Product_model->save($update,$id);
         
        if($result)
        {
            echo 'Update Successfully';
            // header("Location:../");
        }
        else
        {
            echo 'Not Update';
        }
    }
	}


	
	function fetch_product_list()
     {
      $this->Product_model->fetch_product_list();
     }



	public function insertcode(){	
		 if(!empty($_POST['pname']))
    	{   
    	$this->Product_model->_table_name = "product";
        $this->Product_model->_primary_key = "id";
        $pname = $update['product_name'] =  $this->input->post('pname'); 
        $update['product_price'] =  $this->input->post('product_price');  
        $update['product_desccription'] =  $this->input->post('description');  
        
        //  if (!empty($_FILES['product_image_1']['name'])){
        //     $val = $this->Product_model->upload_product_image('product_image_1');
        //     $update['product_image'] = $val['path'];

        //     // echo "Image";
        // }

        if(!empty($_FILES['images'])){
	    	// File upload configuration
	    	echo "file attached";  
	    	$targetDir = "assets/images/";
	    	$allowTypes = array('jpg','png','jpeg','gif');
	        $images_arr = array();
	        $i=0;
	    	foreach($_FILES['images']['name'] as $key=>$val){
	        $image_name = $_FILES['images']['name'][$key];
	        $tmp_name   = $_FILES['images']['tmp_name'][$key];
	        $size       = $_FILES['images']['size'][$key];
	        $type       = $_FILES['images']['type'][$key];
	        $error      = $_FILES['images']['error'][$key];
	        
	        // File upload path
	        $fileName = basename($_FILES['images']['name'][$key]);
	        $targetFilePath = $targetDir . $fileName;
	        
	        if ($i==0) {
	        	$update['product_image'] = $targetFilePath;
	        }elseif ($i==1) {
	        	$update['product_image2'] = $targetFilePath;

	        }elseif ($i==2) {
	        	$update['product_image3'] = $targetFilePath;

	        }elseif ($i==3) {
	        	$update['product_image4'] = $targetFilePath;

	        }
	        $i++;
	        // Check whether file type is valid
	        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	        if(in_array($fileType, $allowTypes)){    
	            // Store images on the server
	            if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
	                $images_arr[] = $targetFilePath;
	            }
	        }
	    	}
	    }

        $result = $this->Product_model->save($update);
         
        if($result)
        {
            echo 'save Successfully';
            // header("Location:../");
        }
        else
        {
            echo 'unable to save';
        }
    }else{
    	echo "No Post Data Found";
    }
	}


	public function deletecode(){	
		if(isset($_POST['delete_id']))
    	{ 
        $id=  $this->input->post('delete_id');
    	$this->Product_model->_table_name = "product";
        $this->Product_model->_primary_key = "id";
		$this->Product_model->delete($id);
        echo 'Delete Successfully!';
        
    	}
    }
}
