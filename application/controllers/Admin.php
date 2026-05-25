<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan masuk terlebih dahulu untuk mengakses dashboard admin.');
            redirect('auth/login');
        }
        
        // Load file upload library
        $this->load->library('upload');
    }

    public function index() {
        // Fetch cattle catalog
        $data['cattle'] = $this->db->order_by('id', 'DESC')->get('cattle')->result_array();

        // Fetch dynamic breeds
        $data['breeds'] = $this->db->order_by('name', 'ASC')->get('breeds')->result_array();

        // Fetch dynamic barns
        $data['barns'] = $this->db->order_by('name', 'ASC')->get('barns')->result_array();
        
        // Fetch dynamic users
        $data['users'] = $this->db->order_by('name', 'ASC')->get('users')->result_array();
        
        // Fetch landing page settings
        $settings_raw = $this->db->get('settings')->result_array();
        $settings = array();
        foreach ($settings_raw as $s) {
            $settings[$s['key']] = $s['value'];
        }
        $data['settings'] = $settings;

        // Fetch testimonials
        $data['testimonials'] = $this->db->order_by('id', 'ASC')->get('testimonials')->result_array();

        // Fetch gallery list
        $data['gallery'] = $this->db->order_by('id', 'DESC')->get('gallery')->result_array();

        // Fetch orders list with joins
        $this->db->select('orders.*, users.name as user_name, users.phone as user_phone, users.address as user_address, cattle.name as cattle_name, cattle.price as cattle_price');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id');
        $this->db->join('cattle', 'orders.cattle_id = cattle.id');
        $this->db->order_by('orders.id', 'DESC');
        $data['orders'] = $this->db->get()->result_array();

        $this->load->view('admin/dashboard_view', $data);
    }

    public function save_settings() {
        if ($this->input->post()) {
            foreach ($this->input->post() as $key => $val) {
                if ($key === 'submit') continue;
                $val = $this->input->post($key, TRUE);
                
                // Perform dynamic database upsert
                $exists = $this->db->get_where('settings', array('key' => $key))->row_array();
                if ($exists) {
                    $this->db->where('key', $key)->update('settings', array('value' => $val));
                } else {
                    $this->db->insert('settings', array('key' => $key, 'value' => $val));
                }
            }

            // Handle optional hero background image upload
            if (!empty($_FILES['hero_image']['name'])) {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                $config['encrypt_name'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('hero_image')) {
                    $data = $this->upload->data();
                    $hero_path = 'assets/images/' . $data['file_name'];
                    
                    // Optional: remove old custom hero image if it exists and is not the default assets/images/hero.jpg
                    $old_hero = $this->db->get_where('settings', array('key' => 'hero_image'))->row_array();
                    if ($old_hero && file_exists('./' . $old_hero['value']) && $old_hero['value'] !== 'assets/images/hero.jpg') {
                        @unlink('./' . $old_hero['value']);
                    }

                    $this->db->where('key', 'hero_image')->update('settings', array('value' => $hero_path));
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload gambar hero: ' . $this->upload->display_errors('', ''));
                    redirect('admin');
                }
            }

            // Handle optional site logo image upload
            if (!empty($_FILES['site_logo']['name'])) {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
                $config['encrypt_name'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('site_logo')) {
                    $data = $this->upload->data();
                    $logo_path = 'assets/images/' . $data['file_name'];
                    
                    $old_logo = $this->db->get_where('settings', array('key' => 'site_logo'))->row_array();
                    if ($old_logo && file_exists('./' . $old_logo['value'])) {
                        @unlink('./' . $old_logo['value']);
                    }

                    $exists = $this->db->get_where('settings', array('key' => 'site_logo'))->row_array();
                    if ($exists) {
                        $this->db->where('key', 'site_logo')->update('settings', array('value' => $logo_path));
                    } else {
                        $this->db->insert('settings', array('key' => 'site_logo', 'value' => $logo_path));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload logo: ' . $this->upload->display_errors('', ''));
                    redirect('admin');
                }
            }

            // Handle optional gallery images upload
            for ($i = 1; $i <= 4; $i++) {
                $input_name = "gallery_img" . $i;
                if (!empty($_FILES[$input_name]['name'])) {
                    $config['upload_path'] = './assets/images/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                    $config['encrypt_name'] = TRUE;
                    
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload($input_name)) {
                        $upload_data = $this->upload->data();
                        $file_path = 'assets/images/' . $upload_data['file_name'];
                        
                        // Check if key already exists in DB, delete old custom file, and update
                        $old_img = $this->db->get_where('settings', array('key' => $input_name))->row_array();
                        if ($old_img && file_exists('./' . $old_img['value']) && strpos($old_img['value'], 'assets/images/ternak') !== 0) {
                            @unlink('./' . $old_img['value']);
                        }
                        
                        $exists = $this->db->get_where('settings', array('key' => $input_name))->row_array();
                        if ($exists) {
                            $this->db->where('key', $input_name)->update('settings', array('value' => $file_path));
                        } else {
                            $this->db->insert('settings', array('key' => $input_name, 'value' => $file_path));
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Gagal upload foto galeri ' . $i . ': ' . $this->upload->display_errors('', ''));
                        redirect('admin');
                    }
                }
            }

            $this->session->set_flashdata('success', 'Konfigurasi Landing Page berhasil diperbarui!');
        }
        redirect('admin');
    }

    public function add() {
        if ($this->input->post()) {
            // Retrieve basic inputs
            $name = $this->input->post('name', TRUE);
            $breed = $this->input->post('breed', TRUE);
            $weight = $this->input->post('weight', TRUE);
            $age = $this->input->post('age', TRUE);
            $price = $this->input->post('price', TRUE);
            $status = $this->input->post('status', TRUE);
            $health = $this->input->post('health', TRUE);
            $location = $this->input->post('location', TRUE);
            $description = $this->input->post('description', TRUE);
            
            // Premium specs
            $weight_initial = $this->input->post('weight_initial', TRUE);
            $daily_weight_gain = $this->input->post('daily_weight_gain', TRUE);
            $feed_type = $this->input->post('feed_type', TRUE);
            $vaccination_status = $this->input->post('vaccination_status', TRUE);
            $quarantine_status = $this->input->post('quarantine_status', TRUE);
            $vet_check_date = $this->input->post('vet_check_date', TRUE);
            
            // Create a slug from cow name
            $slug = url_title(strtolower($name), 'dash', TRUE) . '-' . rand(100, 999);

            // Handle file uploads
            $image_main = $this->_upload_image('image_main');
            
            if (!$image_main) {
                $this->session->set_flashdata('error', 'Foto utama sapi wajib diunggah!');
                redirect('admin');
            }

            $image_gallery1 = $this->_upload_image('image_gallery1');
            $image_gallery2 = $this->_upload_image('image_gallery2');

            $stock = $this->input->post('stock') !== NULL ? (int)$this->input->post('stock', TRUE) : 1;
            if ($stock < 0) $stock = 0;
            if ($stock === 0) {
                $status = 'terjual';
            }

            // Insert to database
            $insert_data = array(
                'slug' => $slug,
                'name' => $name,
                'breed' => $breed,
                'weight' => $weight,
                'age' => $age,
                'price' => $price,
                'status' => $status,
                'stock' => $stock,
                'health' => $health,
                'location' => $location,
                'description' => $description,
                'image_main' => $image_main,
                'image_gallery1' => $image_gallery1,
                'image_gallery2' => $image_gallery2,
                'weight_initial' => $weight_initial,
                'daily_weight_gain' => $daily_weight_gain,
                'feed_type' => $feed_type,
                'vaccination_status' => $vaccination_status,
                'quarantine_status' => $quarantine_status,
                'vet_check_date' => $vet_check_date
            );

            $this->db->insert('cattle', $insert_data);
            $this->session->set_flashdata('success', 'Sapi ' . $name . ' berhasil ditambahkan ke katalog!');
            redirect('admin');
        }
        
        redirect('admin');
    }

    public function edit($id) {
        $cow = $this->db->get_where('cattle', array('id' => $id))->row_array();
        if (!$cow) {
            $this->session->set_flashdata('error', 'Data sapi tidak ditemukan!');
            redirect('admin');
        }

        if ($this->input->post()) {
            $name = $this->input->post('name', TRUE);
            $breed = $this->input->post('breed', TRUE);
            $weight = $this->input->post('weight', TRUE);
            $age = $this->input->post('age', TRUE);
            $price = $this->input->post('price', TRUE);
            $status = $this->input->post('status', TRUE);
            $health = $this->input->post('health', TRUE);
            $location = $this->input->post('location', TRUE);
            $description = $this->input->post('description', TRUE);
            
            // Premium specs
            $weight_initial = $this->input->post('weight_initial', TRUE);
            $daily_weight_gain = $this->input->post('daily_weight_gain', TRUE);
            $feed_type = $this->input->post('feed_type', TRUE);
            $vaccination_status = $this->input->post('vaccination_status', TRUE);
            $quarantine_status = $this->input->post('quarantine_status', TRUE);
            $vet_check_date = $this->input->post('vet_check_date', TRUE);

            $stock = $this->input->post('stock') !== NULL ? (int)$this->input->post('stock', TRUE) : 1;
            if ($stock < 0) $stock = 0;
            if ($stock === 0) {
                $status = 'terjual';
            }

            // Prepare update array
            $update_data = array(
                'name' => $name,
                'breed' => $breed,
                'weight' => $weight,
                'age' => $age,
                'price' => $price,
                'status' => $status,
                'stock' => $stock,
                'health' => $health,
                'location' => $location,
                'description' => $description,
                'weight_initial' => $weight_initial,
                'daily_weight_gain' => $daily_weight_gain,
                'feed_type' => $feed_type,
                'vaccination_status' => $vaccination_status,
                'quarantine_status' => $quarantine_status,
                'vet_check_date' => $vet_check_date
            );

            // Handle optional new file uploads
            $new_image_main = $this->_upload_image('image_main');
            if ($new_image_main) {
                $update_data['image_main'] = $new_image_main;
            }

            $new_image_gallery1 = $this->_upload_image('image_gallery1');
            if ($new_image_gallery1) {
                $update_data['image_gallery1'] = $new_image_gallery1;
            }

            $new_image_gallery2 = $this->_upload_image('image_gallery2');
            if ($new_image_gallery2) {
                $update_data['image_gallery2'] = $new_image_gallery2;
            }

            $this->db->where('id', $id)->update('cattle', $update_data);
            $this->session->set_flashdata('success', 'Data sapi ' . $name . ' berhasil diperbarui!');
            redirect('admin');
        }

        redirect('admin');
    }

    public function delete($id) {
        $cow = $this->db->get_where('cattle', array('id' => $id))->row_array();
        if ($cow) {
            // Optional: delete files from disk to save storage space
            if (file_exists('./' . $cow['image_main']) && !strpos($cow['image_main'], 'placeholder')) {
                @unlink('./' . $cow['image_main']);
            }
            if ($cow['image_gallery1'] && file_exists('./' . $cow['image_gallery1'])) {
                @unlink('./' . $cow['image_gallery1']);
            }
            if ($cow['image_gallery2'] && file_exists('./' . $cow['image_gallery2'])) {
                @unlink('./' . $cow['image_gallery2']);
            }

            $this->db->where('id', $id)->delete('cattle');
            $this->session->set_flashdata('success', 'Sapi ' . $cow['name'] . ' berhasil dihapus dari katalog!');
        } else {
            $this->session->set_flashdata('error', 'Sapi gagal dihapus atau data tidak ditemukan.');
        }
        redirect('admin');
    }

    // Modular File Upload Helper
    private function _upload_image($field_name) {
        if (!empty($_FILES[$field_name]['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload($field_name)) {
                $data = $this->upload->data();
                return 'assets/images/' . $data['file_name'];
            } else {
                $error_msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('error', 'Gagal upload foto: ' . $error_msg);
                return NULL;
            }
        }
        return NULL;
    }

    // TESTIMONIAL ACTIONS
    public function add_testimonial() {
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
            $this->session->set_flashdata('success', 'Testimoni ' . $name . ' berhasil ditambahkan!');
        }
        redirect('admin');
    }

    public function edit_testimonial() {
        if ($this->input->post()) {
            $id = $this->input->post('id', TRUE);
            $name = $this->input->post('name', TRUE);
            $title = $this->input->post('title', TRUE);
            $stars = (int)$this->input->post('stars', TRUE);
            $text = $this->input->post('text', TRUE);
            $avatar_char = strtoupper(substr($name, 0, 1));
            
            $update_data = array(
                'name' => $name,
                'title' => $title,
                'stars' => $stars,
                'text' => $text,
                'avatar_char' => $avatar_char
            );
            
            $this->db->where('id', $id)->update('testimonials', $update_data);
            $this->session->set_flashdata('success', 'Testimoni ' . $name . ' berhasil diperbarui!');
        }
        redirect('admin');
    }

    public function delete_testimonial($id) {
        $testi = $this->db->get_where('testimonials', array('id' => $id))->row_array();
        if ($testi) {
            $this->db->where('id', $id)->delete('testimonials');
            $this->session->set_flashdata('success', 'Testimoni dari ' . $testi['name'] . ' berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Testimoni tidak ditemukan atau gagal dihapus.');
        }
        redirect('admin');
    }

    public function toggle_cattle_status($id) {
        $cow = $this->db->get_where('cattle', array('id' => $id))->row_array();
        if ($cow) {
            $new_active = ($cow['is_active'] == 1) ? 0 : 1;
            $this->db->where('id', $id)->update('cattle', array('is_active' => $new_active));
            $this->session->set_flashdata('success', 'Status aktif sapi ' . $cow['name'] . ' berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Data sapi tidak ditemukan.');
        }
        redirect('admin');
    }

    public function add_gallery() {
        if ($this->input->post()) {
            $label = $this->input->post('label', TRUE);
            $image_path = $this->_upload_image('image_path');

            if (!$image_path) {
                $this->session->set_flashdata('error', 'Foto galeri wajib diunggah!');
                redirect('admin');
            }

            $insert_data = array(
                'label' => $label,
                'image_path' => $image_path,
                'is_active' => 1
            );

            $this->db->insert('gallery', $insert_data);
            $this->session->set_flashdata('success', 'Foto berhasil ditambahkan ke galeri peternakan!');
        }
        redirect('admin');
    }

    public function edit_gallery() {
        if ($this->input->post()) {
            $id = $this->input->post('id', TRUE);
            $label = $this->input->post('label', TRUE);

            $gallery_item = $this->db->get_where('gallery', array('id' => $id))->row_array();
            if (!$gallery_item) {
                $this->session->set_flashdata('error', 'Foto galeri tidak ditemukan.');
                redirect('admin');
            }

            $update_data = array('label' => $label);

            $new_image = $this->_upload_image('image_path');
            if ($new_image) {
                // Delete old image if exists
                if (file_exists('./' . $gallery_item['image_path'])) {
                    @unlink('./' . $gallery_item['image_path']);
                }
                $update_data['image_path'] = $new_image;
            }

            $this->db->where('id', $id)->update('gallery', $update_data);
            $this->session->set_flashdata('success', 'Foto galeri berhasil diperbarui!');
        }
        redirect('admin');
    }

    public function toggle_gallery_status($id) {
        $gallery_item = $this->db->get_where('gallery', array('id' => $id))->row_array();
        if ($gallery_item) {
            $new_active = ($gallery_item['is_active'] == 1) ? 0 : 1;
            $this->db->where('id', $id)->update('gallery', array('is_active' => $new_active));
            $this->session->set_flashdata('success', 'Status aktif foto galeri berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Foto galeri tidak ditemukan.');
        }
        redirect('admin');
    }

    public function delete_gallery($id) {
        $gallery_item = $this->db->get_where('gallery', array('id' => $id))->row_array();
        if ($gallery_item) {
            if (file_exists('./' . $gallery_item['image_path'])) {
                @unlink('./' . $gallery_item['image_path']);
            }
            $this->db->where('id', $id)->delete('gallery');
            $this->session->set_flashdata('success', 'Foto berhasil dihapus dari galeri!');
        } else {
            $this->session->set_flashdata('error', 'Foto galeri tidak ditemukan.');
        }
        redirect('admin');
    }

    public function update_order_status() {
        if ($this->input->post()) {
            $id = $this->input->post('id', TRUE);
            $status = $this->input->post('status', TRUE);
            $delivery_status = $this->input->post('delivery_status', TRUE);

            $order = $this->db->get_where('orders', array('id' => $id))->row_array();
            if ($order) {
                $update_data = array(
                    'status' => $status,
                    'delivery_status' => $delivery_status
                );
                $this->db->where('id', $id)->update('orders', $update_data);
                $this->session->set_flashdata('success', 'Status pemesanan & pengantaran berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Pemesanan tidak ditemukan.');
            }
        }
        redirect('admin');
    }

    public function delete_order($id) {
        $order = $this->db->get_where('orders', array('id' => $id))->row_array();
        if ($order) {
            $this->db->where('id', $id)->delete('orders');
            $this->session->set_flashdata('success', 'Data pemesanan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data pemesanan tidak ditemukan.');
        }
        redirect('admin');
    }

    public function add_barn() {
        if ($this->input->post()) {
            $name = $this->input->post('name', TRUE);
            
            if (empty($name)) {
                $this->session->set_flashdata('error', 'Nama kandang tidak boleh kosong!');
                redirect('admin');
            }

            $exists = $this->db->get_where('barns', array('name' => $name))->row_array();
            if ($exists) {
                $this->session->set_flashdata('error', 'Nama kandang sudah terdaftar!');
                redirect('admin');
            }

            $this->db->insert('barns', array('name' => $name));
            $this->session->set_flashdata('success', 'Kandang ' . $name . ' berhasil ditambahkan!');
        }
        redirect('admin');
    }

    public function edit_barn() {
        if ($this->input->post()) {
            $id = $this->input->post('id', TRUE);
            $name = $this->input->post('name', TRUE);

            $barn = $this->db->get_where('barns', array('id' => $id))->row_array();
            if (!$barn) {
                $this->session->set_flashdata('error', 'Kandang tidak ditemukan.');
                redirect('admin');
            }

            if ($barn['name'] !== $name) {
                $exists = $this->db->get_where('barns', array('name' => $name))->row_array();
                if ($exists) {
                    $this->session->set_flashdata('error', 'Nama kandang sudah terdaftar!');
                    redirect('admin');
                }
            }

            $this->db->where('id', $id)->update('barns', array('name' => $name));
            $this->session->set_flashdata('success', 'Kandang berhasil diperbarui!');
        }
        redirect('admin');
    }

    public function delete_barn($id) {
        $barn = $this->db->get_where('barns', array('id' => $id))->row_array();
        if ($barn) {
            $this->db->where('id', $id)->delete('barns');
            $this->session->set_flashdata('success', 'Kandang berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Kandang tidak ditemukan.');
        }
        redirect('admin');
    }

    public function add_order() {
        if ($this->input->post()) {
            $name = $this->input->post('user_name', TRUE);
            $phone = $this->input->post('user_phone', TRUE);
            $address = $this->input->post('user_address', TRUE);
            
            $cattle_id = $this->input->post('cattle_id', TRUE);
            $qty = max(1, (int)$this->input->post('qty', TRUE));
            $pickup_date = $this->input->post('pickup_date', TRUE);
            $notes = $this->input->post('notes', TRUE);
            $status = $this->input->post('status', TRUE);
            $delivery_status = $this->input->post('delivery_status', TRUE);

            if (empty($name) || empty($phone) || empty($cattle_id) || empty($pickup_date)) {
                $this->session->set_flashdata('error', 'Nama Pembeli, WhatsApp, Pilihan Sapi & Tanggal Wajib Diisi!');
                redirect('admin');
            }

            // Check stock of the selected cattle
            $cow = $this->db->get_where('cattle', array('id' => $cattle_id))->row_array();
            if (!$cow) {
                $this->session->set_flashdata('error', 'Sapi potong tidak ditemukan!');
                redirect('admin');
            }

            if ($cow['stock'] < $qty) {
                $this->session->set_flashdata('error', 'Stok tidak mencukupi! Sapi ' . $cow['name'] . ' hanya memiliki sisa stok sebanyak: ' . $cow['stock']);
                redirect('admin');
            }

            // Check if user already exists by phone to merge
            $existing_user = $this->db->get_where('users', array('phone' => $phone))->row_array();
            if ($existing_user) {
                $user_id = $existing_user['id'];
                // Optionally update address if provided
                if (!empty($address)) {
                    $this->db->where('id', $user_id)->update('users', array('address' => $address, 'name' => $name));
                }
            } else {
                // Register new user under-the-hood
                $username = 'buyer_' . time() . '_' . rand(100, 999);
                $password = password_hash('buyer123', PASSWORD_BCRYPT);

                $user_data = array(
                    'username' => $username,
                    'password' => $password,
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address
                );

                $this->db->insert('users', $user_data);
                $user_id = $this->db->insert_id();
            }

            $order_data = array(
                'user_id' => $user_id,
                'cattle_id' => $cattle_id,
                'qty' => $qty,
                'pickup_date' => $pickup_date,
                'notes' => $notes,
                'status' => $status,
                'delivery_status' => $delivery_status
            );

            $this->db->insert('orders', $order_data);

            // Auto deduct stock
            $new_stock = max(0, $cow['stock'] - $qty);
            $cow_update = array('stock' => $new_stock);
            if ($new_stock === 0) {
                $cow_update['status'] = 'terjual';
            }
            $this->db->where('id', $cattle_id)->update('cattle', $cow_update);

            $this->session->set_flashdata('success', 'Pesanan baru berhasil dibuat secara manual dan stok berhasil dikurangi!');
        }
        redirect('admin');
    }

    public function edit_order() {
        if ($this->input->post()) {
            $id = $this->input->post('id', TRUE);
            $user_id = $this->input->post('user_id', TRUE);
            $cattle_id = $this->input->post('cattle_id', TRUE);
            $pickup_date = $this->input->post('pickup_date', TRUE);
            $notes = $this->input->post('notes', TRUE);
            $status = $this->input->post('status', TRUE);
            $delivery_status = $this->input->post('delivery_status', TRUE);

            $order = $this->db->get_where('orders', array('id' => $id))->row_array();
            if (!$order) {
                $this->session->set_flashdata('error', 'Pesanan tidak ditemukan.');
                redirect('admin');
            }

            $update_data = array(
                'user_id' => $user_id,
                'cattle_id' => $cattle_id,
                'pickup_date' => $pickup_date,
                'notes' => $notes,
                'status' => $status,
                'delivery_status' => $delivery_status
            );

            $this->db->where('id', $id)->update('orders', $update_data);
            $this->session->set_flashdata('success', 'Data pesanan berhasil diperbarui!');
        }
        redirect('admin');
    }
}
