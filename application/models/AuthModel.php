<?php
    class AuthModel extends CI_Model{
      public function check_user($data) {
        $query = $this->db->get_where('users', $data);
        return $query;
      }
      public function checkAccessToken($data) {
        $query = $this->db->get_where('gauth_store', $data);
        $result = $query->row();
        return $result;
      }
      public function googleUser($data) {
        $this->db->select('users.id, gauth_store.access_token, users.email');
        $this->db->from('users');
        $this->db->where('email', $data['email']);
        $this->db->join('gauth_store', 'gauth_store.user_id = users.id', 'left');
        $result = $this->db->get()->row();
        return $result;
      }

      public function updateAccessToken ($userId, $token) {
        $this->db->where('user_id', $userId);
        $this->db->update('gauth_store', ['access_token' => $token]);

        return $this->checkAccessToken(['user_id' => $userId]);
      }

    }