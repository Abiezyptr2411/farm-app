<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Helpers and libraries are already globally loaded via autoload
    }

    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
        redirect(base_url('#masuk'));
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_logged_in');
        
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_username');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_logged_in');
        $this->session->unset_userdata('role');
        
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function user_register() {
        if ($this->input->post()) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password');
            $name = $this->input->post('name', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $address = $this->input->post('address', TRUE);

            // Check if username already exists in users or admins
            $exists_user = $this->db->get_where('users', array('username' => $username))->row_array();
            $exists_admin = $this->db->get_where('admins', array('username' => $username))->row_array();
            
            if ($exists_user || $exists_admin) {
                $this->session->set_flashdata('error_user', 'Username sudah terdaftar! Gunakan username lain.');
                redirect(base_url('#masuk'));
            }

            // Hash password and insert
            $hash_password = password_hash($password, PASSWORD_BCRYPT);
            $insert_data = array(
                'username' => $username,
                'password' => $hash_password,
                'name' => $name,
                'phone' => $phone,
                'address' => $address
            );

            $this->db->insert('users', $insert_data);
            $this->session->set_flashdata('success_user', 'Registrasi berhasil! Silakan masuk.');
        }
        redirect(base_url('#masuk'));
    }

    public function user_login() {
        if ($this->input->post()) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password');

            // 1. Try to login as Admin first
            $admin = $this->db->get_where('admins', array('username' => $username))->row_array();
            if ($admin && password_verify($password, $admin['password'])) {
                $session_data = array(
                    'admin_id' => $admin['id'],
                    'admin_username' => $admin['username'],
                    'admin_name' => $admin['name'],
                    'admin_logged_in' => TRUE,
                    'user_id' => $admin['id'],
                    'user_username' => $admin['username'],
                    'user_name' => $admin['name'],
                    'user_logged_in' => TRUE,
                    'role' => 'admin'
                );
                $this->session->set_userdata($session_data);
                $this->session->set_flashdata('success', 'Selamat datang kembali Admin, ' . $admin['name'] . '!');
                redirect('admin');
            }

            // 2. Try to login as regular Customer
            $user = $this->db->get_where('users', array('username' => $username))->row_array();
            if ($user && password_verify($password, $user['password'])) {
                $session_data = array(
                    'user_id' => $user['id'],
                    'user_username' => $user['username'],
                    'user_name' => $user['name'],
                    'user_logged_in' => TRUE,
                    'role' => 'user'
                );
                $this->session->set_userdata($session_data);
                $this->session->set_flashdata('success_user', 'Selamat datang kembali, ' . $user['name'] . '!');
            } else {
                $this->session->set_flashdata('error_user', 'Username atau password salah!');
            }
        }
        redirect(base_url());
    }

    public function user_logout() {
        $this->logout();
    }
}
