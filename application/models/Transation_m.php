<?php defined('BASEPATH') OR exit('No direct script access allowed');

class transaction_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('transaction');
        if($id != null) {
            $this->db->where('transaction_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) 
    {
        $params = [
            'name' => $post['transaction_name'],
            'price' => $post['price'],
        ];
        $this->db->insert('transaction', $params);
    }
    
    public function edit($post) 
    {
        $params = [
            'name' => $post['transaction_name'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('transaction_id', $post['id']);
        $this->db->update('transaction', $params);
    }

    public function del($id)
	{
        $this->db->where('transaction_id', $id);
        $this->db->delete('transaction');
	}

}