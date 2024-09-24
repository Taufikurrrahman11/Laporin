<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register_m extends CI_Model {

    public function get($id = null) {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']); // Consider using a stronger hashing algorithm
        $params['city_sales'] = $post['city_sales'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }
}
