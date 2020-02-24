<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_auth extends CI_Model {

	function getUserByLogin($uname, $pass) { 
		$this->db->select("*");
	    $this->db->from('user');     
	    $this->db->where('user.username', $uname);
	    $result = $this->getUsers($pass);

	    if (!empty($result)) {
	        return $result;
	    } else {
	        return null;
	    }
	}

	function getPelangganByLogin($uname, $pass) { 
	    $this->db->from('pelanggan');    
	    $this->db->where('username', $uname);
	    $result = $this->getUsers($pass);

	    if (!empty($result)) {
	        return $result;
	    } else {
	        return null;
	    }
	}

	function getUsers($pass) {
	    $query = $this->db->get();
	    $result = $query->row();
	    if ($query->num_rows() > 0) {
	        $result = $query->row();
	        if (password_verify($pass, $result->password)) {
	            //We're good
	            return $result;
	        } else {
	            //Wrong password
	            return array();
	        }

	    } else {
	        return array();
	    }
	}

}