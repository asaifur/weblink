<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Load model
        $this->load->helper('tanggal_helper');
    }

    public function index()
    {

        // jika sudah login redirect ke dashboard
        if ($this->session->userdata('id_users')) {
            redirect('dashboard/navigasi');
        }

        $host = $_SERVER['HTTP_HOST'];

        // Ambil data domain
        $domain = $this->db
            ->where('url_domain', $host)
            ->get('table_domain')
            ->row_array();

        if (!$domain) {
            show_404();
        }


        $data['domain'] = $domain;

        $data['menu_header'] = $this->Menu_model->get_parent($domain['id']);

        // tampilkan login
        $this->load->view('adminlte/login', $data);
    }

    public function forgot_password()
    {
        $this->load->view('auth/forgot_password');
    }
    public function proses_login()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');

        // =========================
        // AMBIL DOMAIN SEKARANG
        // =========================
        $host = $_SERVER['HTTP_HOST'];
        $host = explode(':', $host)[0];
        $host = str_replace('www.', '', $host);
        $host = trim(strtolower($host));

        // =========================
        // AMBIL DATA DOMAIN
        // =========================
        $domain = $this->db->get_where('table_domain', [
            'domain_name' => $host,
            'is_active'   => 1
        ])->row();

        if (!$domain) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Domain tidak dikenali!'
            ]);
            return;
        }

        // =========================
        // CEK USER
        // =========================
        $user = $this->User_model->check_login($username);

        if ($user) {

            // =========================
            // CEK DOMAIN USER
            // =========================
            if ($user['id_domain'] != $domain->id) {
                echo json_encode([
                    'status'  => 'error',
                    'message' => 'Akun tidak terdaftar di domain ini!'
                ]);
                return;
            }

            // =========================
            // CEK STATUS AKTIF
            // =========================
            if ($user['active'] != 1) {
                echo json_encode([
                    'status'  => 'inactive',
                    'message' => 'Akun belum aktif! Silakan verifikasi OTP terlebih dahulu.',
                    'email'   => $user['email']
                ]);
                return;
            }

            // =========================
            // CEK PASSWORD
            // =========================
            if (password_verify($password, $user['password'])) {

                // Simpan session (lebih aman pilih field tertentu)
                $this->session->set_userdata([
                    'id'        => $user['id_users'],
                    'username'  => $user['username'],
                    'email'     => $user['email'],
                    'id_domain' => $user['id_domain'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);

                echo json_encode([
                    'status'  => 'success',
                    'message' => 'Login berhasil',
                    'nama'    => $user['username'],
                    'salam'   => waktu()
                ]);
            } else {
                echo json_encode([
                    'status'  => 'error',
                    'message' => 'Password Salah!'
                ]);
            }
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Email tidak terdaftar!'
            ]);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
}
