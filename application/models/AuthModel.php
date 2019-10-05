<?php


    class AuthModel extends CI_Model{

        public function check_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}
    }