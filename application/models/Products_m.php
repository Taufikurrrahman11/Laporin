<?php defined('BASEPATH') OR exit('No direct script access allowed');

class products_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('products');
        if($id != null) {
            $this->db->where('products_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) 
    {
        $params = [
            'product_type' => $post['product_type'],
            'price' => $post['price'],
        ];
        $this->db->insert('products', $params);
    }
    
    public function edit($post) 
    {
        $params = [
            'product_type' => $post['product_type'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('products_id', $post['id']);
        $this->db->update('products', $params);
    }

    public function del($id)
	{
        $this->db->where('products_id', $id);
        $this->db->delete('products');
	}
    
    public function sold_out()
	{
        // Define the list of product types you want to update
        $product_types = [
            'Platinum Mahasiswa', 
            'SPOTV', 
            'Platinum 30D', 
            'Premier League Mobile', 
            'Diamond Mobile 30D', 
            'Platinum + SPOTV 30D', 
            'Diamond All Screen 30D', 
            'Diamond + SPOTV 30D', 
            'Platinum 1 Tahun', 
            'Diamond Mobile 1 Tahun', 
            'Diamond All Screen 1 Tahun'
        ];
        
        // Update total_duplicates for each product_type
        foreach ($product_types as $product_type) {
            // Calculate the total_duplicates for the current product_type
            $this->db->set('sold_out', '(SELECT COUNT(*) FROM customer WHERE product_type = \'' . $product_type . '\')', FALSE);
            $this->db->where('product_type', $product_type);
            $this->db->update('products');
        }
        
        
	}

    public function total()
    {
        $this->db->set('total', 'sold_out * price', FALSE);
        $this->db->update('products');

    }
}