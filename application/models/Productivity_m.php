<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productivity_m extends CI_Model {

    public function get($id = null)
{
    $this->db->select('daily_target.*, productivity.*');
    $this->db->from('daily_target');
    $this->db->join('productivity', 'productivity.target_id = daily_target.target_id', 'left'); // atau 'inner' jika ingin hanya data yang cocok

    if ($id != null) {
        $this->db->where('daily_target.target_id', $id);
    }

    $query = $this->db->get();
    return $query;
}


    public function add($post) 
    {
        $params = [
            'sales_amount' => $post['sales_amount'],
            'working_days' => $post['working_days'],
            'daily_register' => $post['daily_register'],
            'daily_subscribe' => $post['daily_subscribe'],
            'monthly_register' => $post['monthly_register'],
            'monthly_subscribe' => $post['monthly_subscribe'],
            'start' => $post['start'],
        ];
        $this->db->insert('daily_target', $params);
    }
    
    public function edit($post) 
    {
        $params = [
            'sales_amount' => $post['sales_amount'],
            'working_days' => $post['working_days'],
            'daily_register' => $post['daily_register'],
            'daily_subscribe' => $post['daily_subscribe'],
            'monthly_register' => $post['monthly_register'],
            'monthly_subscribe' => $post['monthly_subscribe'],
            'start' => $post['start'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('target_id', $post['id']);
        $this->db->update('daily_target', $params);
    }

    public function del($id)
    {
        $this->db->where('target_id', $id);
        $this->db->delete('daily_target');
    }

    public function update_date_to_today()
    {
        $sql = "UPDATE productivity 
                SET date = CURDATE()";
        $this->db->query($sql);
    }
    
    public function update_sum_wd()
    {
        $sql = "UPDATE productivity p
                JOIN daily_target dt ON p.target_id = dt.target_id
                SET p.sum_wd = dt.working_days - DATEDIFF(CURDATE(), dt.start)";
        $this->db->query($sql);
    }



    

    
    public function update_total_register()
    {
        $sql = "
            UPDATE daily_target
            JOIN (
                SELECT COUNT(*) AS count
                FROM customer
                WHERE customer_type = 'Download & Registrasi'
            ) c2
            SET total_register = count
            WHERE customer_type = 'Download & Registrasi';
        ";
        
        // Execute the query
        $this->db->query($sql);
    }
    public function update_r_jogja()
    {
        $sql = "
            UPDATE daily_target
            SET r_jogja = (
                SELECT COUNT(*)
                FROM customer
                WHERE customer_type = 'Download & Registrasi'
                AND city_sales = 'Malang'
            );

        ";
        
        // Execute the query
        $this->db->query($sql);
    }
    public function update_r_semarang()
    {
        $sql = "
            UPDATE daily_target
            SET r_semarang = (
                SELECT COUNT(*)
                FROM customer
                WHERE customer_type = 'Download & Registrasi'
                AND city_sales = 'Purwokerto'
            );

        ";
        
        // Execute the query
        $this->db->query($sql);
    }
    public function update_s_jogja()
    {
        $sql = "UPDATE productivity p
                JOIN achievement a ON p.target_id = a.target_id
                SET p.s_jogja = a.s_jogja / p.sum_wd";
        $this->db->query($sql);
    }


    public function update_s_semarang()
    {
        $sql = "UPDATE productivity p
                JOIN achievement a ON p.target_id = a.target_id
                SET p.s_semarang = a.s_semarang / p.sum_wd";
        $this->db->query($sql);
    }
    
    public function get_total_subscribe()
    {
        $sql = "UPDATE daily_target
            SET total_subscribe = (
                SELECT SUM(total) FROM products
            )";

        // Execute the query
        $this->db->query($sql);

    }

    
    
    
        
        // public function update_register_ratio() { //error
        //     // Mengupdate kolom ratio dengan hasil pembagian register dan monthly_register
        //     $this->db->set('ratio', 'register / monthly_register', FALSE);
        //     $this->db->update('daily_target');
        // }

        // public function get_target_data() { //error
        //     $this->db->select('register, monthly_register');
        //     $query = $this->db->get('daily_target');
        //     return $query->result();
        // }

        public function get_ratio_r() {
            $sql = "
            UPDATE daily_target
            SET register_p = (total_register / monthly_register) * 100
            WHERE monthly_register > 0;

        ";
    
        $this->db->query($sql);
    
        // Retrieve updated data from 'summary' table
        $query = $this->db->get('summary');
        return $query->result();
        }
        
        public function get_ratio_s() {
            $sql = "
            UPDATE daily_target
            SET subscribe_p = (total_subscribe / monthly_subscribe) * 100
            WHERE monthly_subscribe > 0;

        ";
    
        $this->db->query($sql);
    
        // Retrieve updated data from 'summary' table
        $query = $this->db->get('summary');
        return $query->result();
        }

        public function get_calc_r_jogja()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.p_r_jogja = (dt.r_jogja / dt.sum_wd)
                    WHERE dt.sum_wd != 0";
            $this->db->query($sql);
        }

        public function get_percentage_r_jogja()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.p_jogja = (p.p_r_jogja / dt.daily_register)
                    WHERE dt.sum_wd != 0";
            $this->db->query($sql);
        }
        
        public function get_calc_r_semarang()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.p_r_semarang = (dt.r_semarang / dt.sum_wd)
                    WHERE dt.sum_wd != 0";
            $this->db->query($sql);
        }

        public function get_percentage_r_semarang()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.p_semarang = (p.p_r_semarang / dt.daily_register)
                    WHERE dt.sum_wd != 0";
            $this->db->query($sql);
        }
        
        public function get_calc_s_jogja()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.p_s_jogja = (p.s_jogja / dt.daily_subscribe) * 100
                    WHERE dt.daily_subscribe != 0";
            $this->db->query($sql);
        }


        public function get_calc_s_semarang()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.p_s_semarang = (p.s_semarang / dt.daily_subscribe) * 100
                    WHERE dt.monthly_subscribe != 0";
            $this->db->query($sql);
        }

        public function get_total_pr()
        {
            $sql = "UPDATE productivity
                    SET total_pr = p_r_jogja + p_r_semarang";
            $this->db->query($sql);
        }

        public function get_total_p_pr()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.total_p_pr = p.total_pr / (dt.daily_register * 2)
                    WHERE dt.daily_register != 0";
            $this->db->query($sql);
        }

        public function get_total_p_ps()
        {
            $sql = "UPDATE productivity p
                    JOIN daily_target dt ON p.target_id = dt.target_id
                    SET p.total_p_ps = p.total_ps / (dt.daily_subscribe * 2)
                    WHERE dt.daily_subscribe != 0";
            $this->db->query($sql);
        }
        
        public function get_total_ps()
        {
            $sql = "UPDATE productivity
                    SET total_ps = s_jogja + s_semarang";
            $this->db->query($sql);
        }

        public function __construct() {
            $this->load->database();
        }
        
    
    }
    ?>
