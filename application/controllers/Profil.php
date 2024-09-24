<?php
class Profile extends CI_Controller {
    
    public function upload_image() {
        // Load library upload
        $config['upload_path'] = './assets/images/profile/';  // Path folder penyimpanan gambar
        $config['allowed_types'] = 'jpg|jpeg|png';  // Format gambar yang diperbolehkan
        $config['max_size'] = 2048;  // Maksimal ukuran file dalam kilobyte (2MB)
        $config['file_name'] = 'profile_' . $this->session->userdata('user_id');  // Nama file sesuai user ID

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_image')) {
            // Jika upload berhasil, ambil data gambar
            $uploadData = $this->upload->data();
            $filePath = 'assets/images/profile/' . $uploadData['file_name'];

            // Simpan path gambar ke database
            $this->UserModel->update_profile_image($filePath, $this->session->userdata('user_id'));

            // Update sesi dengan gambar baru
            $this->session->set_userdata('profile_image', $filePath);

            // Redirect kembali ke halaman profil atau dashboard
            redirect('dashboard');
        } else {
            // Jika upload gagal, tampilkan pesan error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('dashboard');
        }
    }
}

?>