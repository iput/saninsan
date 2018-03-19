<?php defined('BASEPATH')OR exit('no access allowed');
/**
  * summary
  */
 class M_users extends CI_model
 {
     /**
      * summary
      */
     public function __construct()
     {
         parent::__construct();
     }

     public function insert_reviewer($data)
     {
     	$this->db->insert("reviewer",$data);
     	if ($this->db->affected_rows()) {
     		return true;
     	}else{
     		return false;
     	}
     }
 } ?>