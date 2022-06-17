<?php
class Product_model extends CI_Model  {

    public $_table_name = '';
    public $_primary_key = '';
    public $_primary_filter = 'intval';
    public $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }
    


    
     public function get_product_list(){
        $query = $this->db->query("SELECT * FROM `product`");
        return $query->result();
    }



    function fetch_product_list()
         {
          $this->db->order_by('id', 'DESC');
          $query = $this->db->get('product');
          // $output = '';
          // foreach($query->result() as $row)
          // {
          //  $output .= '<tr>
          //                       <td>'.$row->id.'</td>
          //                       <td>'.$row->product_name.'</td>
          //                       <td>'.$row->product_price.'</td>
          //                       <td>'.$row->product_desccription.'</td>
          //                       <td><img src="'.$row->product_image.'" width="20px;" height="10px;">  </td>
          //                       <td>
          //                           <button type="button" class="btn btn-info viewbtn"> VIEW </button>
          //                       </td>
          //                       <td>
          //                           <button type="button" class="btn btn-success editbtn"> EDIT </button>
          //                       </td>
          //                       <td>
          //                           <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
          //                       </td>
          //                   </tr>';
          // } 
          // echo  $output;



          // $i=1;
          $result_array = [];
                foreach($query->result() as $row)
                {
                     array_push($result_array, $row);
                }
                header('Content-type: application/json');
                echo json_encode($result_array);

         }


     public function save($data, $id = NULL) {

        // Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
//            $filter = $this->_primary_filter;
//            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }




    public function delete($id) {

        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }


    public function upload_product_image($field) {

        $config['upload_path'] = 'assets/product/';
        $config['allowed_types'] = 'jpeg|jpg|jpeg|png';
        $config['max_size'] = '20240';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $error = $this->upload->display_errors();
            $type = "error";
            $message = $error;
            set_message($type, $message);
            return $error;
            
            // uploading failed. $error will holds the errors.
        } else {
            $fdata = $this->upload->data();
            $img_data ['path'] = $config['upload_path'] . $fdata['file_name'];
            $img_data ['fullPath'] = $fdata['full_path'];
            return $img_data;
            // uploading successfull, now do your further actions

            $type = "error";
            $message = "Product Added Successflly";
            set_message($type, $message);
            return $error;
        }
    }

 }   