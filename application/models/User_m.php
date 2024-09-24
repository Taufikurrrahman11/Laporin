<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_m extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['email'] );
        $this->db->where('password', sha1($post['password'] ));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('user_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['city_sales'] = $post['city_sales'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);

    }
    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['city_sales'] = $post['city_sales'];
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);

    }
    public function del($id)
	{
        $this->db->where('user_id', $id);
        $this->db->delete('user');
	}

    public function update_presence() {
        $sql = "
            UPDATE user u
            LEFT JOIN customer c ON u.username = c.sales_name AND DATE(c.date) = CURDATE()
            SET u.presence = IF(c.sales_name IS NULL, 'inactive', 'active');

        ";  
        $this->db->query($sql);
    }
    
}