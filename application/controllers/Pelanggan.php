<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pelanggan extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customer_m');
    }

    
    public function index()
    {
        $data['row'] = $this->customer_m->get();
        $data['customer_price'] = $this->customer_m->update_customer_price();
        $this->template->load('template', 'customer/customer_data', $data);
        // $this->customer_m->truncate_table('customer');

    }

    public function add() {
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->date = null;
        $customer->name = null;
        $customer->email = null;
        $customer->phone_nmbr = null;
        $customer->customer_type = null;
        $customer->product_type = null;
        $customer->price = null;
        $customer->bukti = null;
        $customer->sales_name = null;
        $customer->city_sales = null;
        $data = array(
            'page' => 'add',
            'row' => $customer,
            'username' => $this->session->userdata('username') // Mengambil username dari session
        );
        $this->template->load('template', 'customer/customer_form', $data);
    }

    public function edit($id)
    {
        $query = $this->customer_m->get($id);
        if($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer,
                'username' => $this->session->userdata('username') // Mengambil username dari session
            );
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('customer')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['add'])) {
            $this->customer_m->add($post);
        } else if(isset($post['edit'])) {
            $this->customer_m->edit($post);
        }
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='".site_url('customer')."';</script>";
    }

    public function del($id)
    {
        $this->customer_m->del($id);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('customer')."';</script>";
    }

    public function delete_customers() {
        // Panggil fungsi delete_all_customers dari model
        $this->customer_m->delete_all_customers();

        // Redirect atau tampilkan pesan sukses
        redirect('customer/list'); // Redirect ke halaman daftar customer, misalnya
        // atau
        echo "Semua data customer berhasil dihapus.";
    }

    public function export_to_excel()
    {
        // Buat instance Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header kolom
        $sheet->setCellValue('A1', 'Customer ID');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Phone Number');
        $sheet->setCellValue('F1', 'Customer Type');
        $sheet->setCellValue('G1', 'Product Type');
        $sheet->setCellValue('H1', 'Price');
        $sheet->setCellValue('I1', 'Bukti');
        $sheet->setCellValue('J1', 'Sales Name');
        $sheet->setCellValue('K1', 'City Sales');

        // Ambil data dari database
        $data = $this->customer_m->get()->result();

        // Isi data ke dalam sheet
        $row = 2; // Mulai dari baris kedua karena baris pertama adalah header
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->customer_id);
            $sheet->setCellValue('B' . $row, $item->date);
            $sheet->setCellValue('C' . $row, $item->name);
            $sheet->setCellValue('D' . $row, $item->email);
            $sheet->setCellValue('E' . $row, $item->phone_nmbr);
            $sheet->setCellValue('F' . $row, $item->customer_type);
            $sheet->setCellValue('G' . $row, $item->product_type);
            $sheet->setCellValue('H' . $row, $item->price);
            $sheet->setCellValue('I' . $row, $item->bukti);
            $sheet->setCellValue('J' . $row, $item->sales_name);
            $sheet->setCellValue('K' . $row, $item->city_sales);
            $row++;
        }

        // Simpan file Excel dan unduh
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_customer_' . date('Y-m-d') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

}
?>
