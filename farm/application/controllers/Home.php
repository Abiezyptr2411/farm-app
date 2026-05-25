<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load helpers and libraries if needed (though already autoloaded)
    }

    public function index()
    {
        // Fetch only active cattle (limited to 6 latest)
        $data['cattle'] = $this->db->where('is_active', 1)->order_by('id', 'DESC')->limit(6)->get('cattle')->result_array();

        // Fetch active gallery images dynamically from database
        $data['gallery'] = $this->db->where('is_active', 1)->get('gallery')->result_array();

        // Fetch dynamic breeds ordered alphabetically
        $data['breeds'] = $this->db->order_by('name', 'ASC')->get('breeds')->result_array();

        // Fetch landing page settings
        $settings_raw = $this->db->get('settings')->result_array();
        $settings = array();
        foreach ($settings_raw as $s) {
            $settings[$s['key']] = $s['value'];
        }
        $data['settings'] = $settings;

        // Fetch testimonials dynamically
        $data['testimonials'] = $this->db->order_by('id', 'ASC')->get('testimonials')->result_array();

        // Fetch user orders if logged in
        if ($this->session->userdata('user_logged_in')) {
            $user_id = $this->session->userdata('user_id');
            $this->db->select('orders.*, cattle.name as cattle_name, cattle.breed as cattle_breed, cattle.price as cattle_price');
            $this->db->from('orders');
            $this->db->join('cattle', 'orders.cattle_id = cattle.id');
            $this->db->where('orders.user_id', $user_id);
            $this->db->order_by('orders.id', 'DESC');
            $data['user_orders'] = $this->db->get()->result_array();
        } else {
            $data['user_orders'] = array();
        }

        $this->load->view('home_view', $data);
    }

    public function katalog()
    {
        // Fetch all active cattle
        $data['cattle'] = $this->db->where('is_active', 1)->order_by('id', 'DESC')->get('cattle')->result_array();

        // Fetch active gallery images dynamically from database
        $data['gallery'] = $this->db->where('is_active', 1)->get('gallery')->result_array();

        // Fetch dynamic breeds ordered alphabetically
        $data['breeds'] = $this->db->order_by('name', 'ASC')->get('breeds')->result_array();

        // Fetch landing page settings
        $settings_raw = $this->db->get('settings')->result_array();
        $settings = array();
        foreach ($settings_raw as $s) {
            $settings[$s['key']] = $s['value'];
        }
        $data['settings'] = $settings;

        // Fetch testimonials dynamically
        $data['testimonials'] = $this->db->order_by('id', 'ASC')->get('testimonials')->result_array();

        // Fetch user orders if logged in
        if ($this->session->userdata('user_logged_in')) {
            $user_id = $this->session->userdata('user_id');
            $this->db->select('orders.*, cattle.name as cattle_name, cattle.breed as cattle_breed, cattle.price as cattle_price');
            $this->db->from('orders');
            $this->db->join('cattle', 'orders.cattle_id = cattle.id');
            $this->db->where('orders.user_id', $user_id);
            $this->db->order_by('orders.id', 'DESC');
            $data['user_orders'] = $this->db->get()->result_array();
        } else {
            $data['user_orders'] = array();
        }

        $this->load->view('katalog_view', $data);
    }

    public function submit_testimonial()
    {
        if ($this->input->post()) {
            $name = $this->input->post('name', TRUE);
            $title = $this->input->post('title', TRUE);
            $stars = (int)$this->input->post('stars', TRUE);
            $text = $this->input->post('text', TRUE);
            $avatar_char = strtoupper(substr($name, 0, 1));

            $insert_data = array(
                'name' => $name,
                'title' => $title,
                'stars' => $stars,
                'text' => $text,
                'avatar_char' => $avatar_char
            );

            $this->db->insert('testimonials', $insert_data);
            $this->session->set_flashdata('success_testi', 'Terima kasih! Ulasan Anda berhasil dikirimkan.');
        }
        redirect(base_url('#testimoni'));
    }

    public function submit_order()
    {
        if (!$this->session->userdata('user_logged_in')) {
            $this->session->set_flashdata('error_user', 'Anda harus masuk terlebih dahulu untuk memesan sapi.');
            redirect(base_url());
        }

        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');
            $cattle_id = $this->input->post('cattle_id', TRUE);
            $pickup_date = $this->input->post('pickup_date', TRUE);
            $notes = $this->input->post('notes', TRUE);

            // Double check if cattle exists and is active
            $cow = $this->db->get_where('cattle', array('id' => $cattle_id, 'is_active' => 1))->row_array();
            if (!$cow) {
                $this->session->set_flashdata('error_user', 'Sapi tidak ditemukan atau sedang tidak aktif.');
                redirect(base_url());
            }

            $insert_data = array(
                'user_id' => $user_id,
                'cattle_id' => $cattle_id,
                'pickup_date' => $pickup_date,
                'notes' => $notes,
                'status' => 'pending'
            );

            $this->db->insert('orders', $insert_data);
            $this->session->set_flashdata('success_order', 'Pemesanan sapi ' . $cow['name'] . ' berhasil dikirim! Pantau statusnya di menu Pesanan Saya.');
        }
        redirect(base_url('#katalog'));
    }

    public function detail($slug)
    {
        // Fetch cattle catalog record by slug
        $cow = $this->db->get_where('cattle', array('slug' => $slug, 'is_active' => 1))->row_array();
        if (!$cow) {
            show_404();
        }
        $data['cow'] = $cow;

        // Fetch dynamic breeds ordered alphabetically
        $data['breeds'] = $this->db->order_by('name', 'ASC')->get('breeds')->result_array();

        // Fetch landing page settings
        $settings_raw = $this->db->get('settings')->result_array();
        $settings = array();
        foreach ($settings_raw as $s) {
            $settings[$s['key']] = $s['value'];
        }
        $data['settings'] = $settings;

        // Fetch testimonials dynamically
        $data['testimonials'] = $this->db->order_by('id', 'ASC')->get('testimonials')->result_array();

        // Fetch user orders if logged in
        if ($this->session->userdata('user_logged_in')) {
            $user_id = $this->session->userdata('user_id');
            $this->db->select('orders.*, cattle.name as cattle_name, cattle.breed as cattle_breed, cattle.price as cattle_price');
            $this->db->from('orders');
            $this->db->join('cattle', 'orders.cattle_id = cattle.id');
            $this->db->where('orders.user_id', $user_id);
            $this->db->order_by('orders.id', 'DESC');
            $data['user_orders'] = $this->db->get()->result_array();
        } else {
            $data['user_orders'] = array();
        }

        $this->load->view('detail_view', $data);
    }
}
