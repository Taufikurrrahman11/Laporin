<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly_semarang_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('weekly_semarang');
        if($id != null) {
            $this->db->where('w_semarang_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function get_sales_names() {
        $sql = "
        INSERT INTO weekly_semarang (sales_names)
        SELECT DISTINCT sales_name
        FROM customer
        WHERE city_sales = 'Purwokerto'
        AND sales_name NOT IN (SELECT sales_names FROM weekly_semarang WHERE city_sales = 'Purwokerto')
        ";
        $this->db->query($sql);
    }
    
    public function get_r_week1() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS r_week1
                FROM 
                    customer
                WHERE 
                    customer_type = 'Download & Registrasi'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 1 AND 7
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.r_week1 = c.r_week1
        ");
    }
    
    public function get_s_week1() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS s_week1
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 1 AND 7
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.s_week1 = c.s_week1
        ");
    }
    
    public function get_v_week1() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    SUM(price) AS v_week1
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 1 AND 7
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.v_week1 = c.v_week1
        ");
    }

    public function get_r_week2() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS r_week2
                FROM 
                    customer
                WHERE 
                    customer_type = 'Download & Registrasi'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 8 AND 14
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.r_week2 = c.r_week2
        ");
    }
    
    public function get_s_week2() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS s_week2
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 8 AND 14
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.s_week2 = c.s_week2
        ");
    }

    public function get_v_week2() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    SUM(price) AS v_week2
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 8 AND 14
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.v_week2 = c.v_week2
        ");
    }

    public function get_r_week3() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS r_week3
                FROM 
                    customer
                WHERE 
                    customer_type = 'Download & Registrasi'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 15 AND 21
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.r_week3 = c.r_week3
        ");
    }

    public function get_s_week3() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS s_week3
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 15 AND 21
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.s_week3 = c.s_week3
        ");
    }

    public function get_v_week3() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    SUM(price) AS v_week3
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 15 AND 21
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.v_week3 = c.v_week3
        ");
    }

    public function get_r_week4() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS r_week4
                FROM 
                    customer
                WHERE 
                    customer_type = 'Download & Registrasi'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 22 AND 31
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.r_week4 = c.r_week4
        ");
    }

    public function get_s_week4() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    COUNT(*) AS s_week4
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 22 AND 31
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.s_week4 = c.s_week4
        ");
    }

    public function get_v_week4() {
        $this->db->query("
            UPDATE weekly_semarang w
            JOIN (
                SELECT 
                    sales_name, 
                    SUM(price) AS v_week4
                FROM 
                    customer
                WHERE 
                    customer_type = 'Subscribe (Berlangganan)'
                    AND city_sales = 'Purwokerto'
                    AND DAY(date) BETWEEN 22 AND 31
                    AND MONTH(date) = MONTH(CURDATE())
                    AND YEAR(date) = YEAR(CURDATE())
                GROUP BY 
                    sales_name
            ) c ON w.sales_names = c.sales_name
            SET w.v_week4 = c.v_week4
        ");
    }
    
}