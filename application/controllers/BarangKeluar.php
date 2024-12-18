<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangKeluar_model', 'barangkeluar_model');
        $this->load->model('DetailBarangKeluar_model', 'detailbarangkeluar_model');
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $data['judul'] = 'Barang Keluar';
        $data['barang_keluar'] = $this->barangkeluar_model->getAllBarangKeluar();
        $data['role'] = $this->session->userdata('login_session')['role'];

        $this->load->view('templates/header', $data);
        $this->load->view('barang_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Load data untuk form
        $data['judul'] = 'Tambah Barang Keluar';
        $data['role'] = $this->session->userdata('login_session')['role'];
        $data['barang'] = $this->detailbarangkeluar_model->getAllBarang();
        $data['user'] = $this->barangkeluar_model->getAllUsers();

        // Validasi form input
        $this->form_validation->set_rules('id_barang_keluar', 'ID Barang Keluar', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang_keluar/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil data dari form
            $id_barang_keluar = $this->input->post('id_barang_keluar', true);
            $barangKeluarData = [
                'id_barang_keluar' => $id_barang_keluar,
                'id_user' => $this->input->post('id_user', true),
                'tanggal_keluar' => $this->input->post('tanggal_keluar', true),
            ];

            // Simpan data barang keluar
            $this->barangkeluar_model->tambahBarangKeluar($barangKeluarData);

            // Tambahkan detail barang keluar
            $barangList = $this->detailbarangkeluar_model->getAllBarang();
            foreach ($barangList as $barang) {
                $jumlah_keluar = $this->input->post('jmlh_keluar_' . $barang['id_barang'], true);
                $harga_jual = $this->input->post('harga_jual_' . $barang['id_barang'], true);

                if (!empty($jumlah_keluar) && !empty($harga_jual)) {
                    $this->detailbarangkeluar_model->tambahDataDetailBarangKeluar($id_barang_keluar, $barang, $jumlah_keluar, $harga_jual);
                }
            }

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('barangkeluar');
        }
    }

    public function detail($id_barang_keluar)
    {
        $data['judul'] = 'Detail Barang Keluar';
        $data['role'] = $this->session->userdata('login_session')['role'];
        $data['barang_keluar'] = $this->barangkeluar_model->getBarangKeluarById($id_barang_keluar);
        $data['detail_barang_keluar'] = $this->detailbarangkeluar_model->getDetailBarangKeluarByIdBarangKeluar($id_barang_keluar);

        if (empty($data['barang_keluar']) || empty($data['detail_barang_keluar'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('barang_keluar/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_barang_keluar)
    {
        $this->barangkeluar_model->hapusDataBarangKeluar($id_barang_keluar);
        $this->detailbarangkeluar_model->hapusDetailBarangKeluar($id_barang_keluar);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('barangkeluar');
    }

    public function edit($id_barang_keluar)
    {
        $data['judul'] = 'Edit Barang Keluar';
        $data['role'] = $this->session->userdata('login_session')['role'];
        $data['barang_keluar'] = $this->barangkeluar_model->getBarangKeluarById($id_barang_keluar);

        // Validasi form input
        $this->form_validation->set_rules('id_barang_keluar', 'ID Barang Keluar', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang_keluar/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->barangkeluar_model->updateBarangKeluarById($id_barang_keluar);
            $this->session->set_flashdata('flash_success', 'Data barang berhasil diperbarui');
            redirect('barangkeluar');
        }
    }
}
