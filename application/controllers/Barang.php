<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang_model');
        $this->load->library(['form_validation', 'session', 'pdf']);


        // Periksa login dan dapatkan role user
        if (!$this->session->userdata('login_session')) {
            redirect('login');
        }
        $this->role = $this->session->userdata('login_session')['role'];
    }

    public function index()
    {
        $data['judul'] = 'Barang';
        $data['barang'] = $this->barang_model->get_all_barang();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Cek role untuk akses fungsi tambah (admin dan staff diizinkan)
        if ($this->role !== '"admin"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk menambah data');
            redirect('barang');
        }

        $data['judul'] = 'Tambah Data Barang';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session

        // Validasi form
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jmlh_barang', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->barang_model->tambahDataBarang();
            $this->session->set_flashdata('flash_success', 'Data barang berhasil ditambahkan');
            redirect('barang');
        }
    }

    public function hapus($id_barang)
    {
        // Cek role untuk akses fungsi hapus (hanya admin dan staff)
        if ($this->role !== '"admin"' && $this->role !== '"staff"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect('barang');
        }

        $this->barang_model->hapusDataBarang($id_barang);
        $this->session->set_flashdata('flash_success', 'Data barang berhasil dihapus');
        redirect('barang');
    }

    public function edit($id_barang)
    {
        // Cek role untuk akses fungsi edit (hanya admin)
        if ($this->role !== '"admin"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect('barang');
        }

        $data['judul'] = 'Ubah Data Barang';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['barang'] = $this->barang_model->getBarangById($id_barang);

        // Validasi input form
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jmlh_barang', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form edit dengan data lama
            $this->load->view('templates/header', $data);
            $this->load->view('barang/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika validasi berhasil, lakukan update
            $this->barang_model->updateBarangById($id_barang);
            $this->session->set_flashdata('flash_success', 'Data barang berhasil diperbarui');
            redirect('barang');
        }
    }

    public function pesanBarang()
    {
        $id_barang = $this->input->post('id_barang');
        $action = $this->input->post('action');
        $quantity = (int)$this->input->post('quantity');
        $pesanan = $this->session->userdata('pesanan') ?? [];

        // Ambil data barang dari database
        $barang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();

        if (!$barang) {
            redirect('barang'); // Jika barang tidak ditemukan
        }

        // Ambil jumlah pesanan yang ada di session atau 0 jika belum ada
        $quantity = isset($pesanan[$id_barang]) ? $pesanan[$id_barang] : 0;

        // Logika untuk tombol + dan -
        if ($action === 'increase' && $quantity < $barang['jmlh_barang']) {
            $quantity++;  // Menambah jumlah barang yang dipesan
        } elseif ($action === 'decrease' && $quantity > 0) {
            $quantity--;  // Mengurangi jumlah barang yang dipesan
        }

        // Update session dengan nilai jumlah barang yang baru
        if ($quantity > 0) {
            $pesanan[$id_barang] = $quantity;  // Simpan ke session jika lebih dari 0
        } else {
            unset($pesanan[$id_barang]);  // Hapus pesanan jika jumlahnya 0
        }

        $this->session->set_userdata('pesanan', $pesanan);  // Update session pesanan

        // Redirect kembali ke halaman barang
        redirect('barang');
    }



    public function resetPesanan()
    {
        $this->session->unset_userdata('pesanan'); // Hapus data pesanan dari session
        redirect('barang'); // Kembali ke halaman barang
    }


    public function formPenerima()
    {
        $data['judul'] = 'Form Penerima';
        $data['role'] = $this->session->userdata('login_session')['role']; // Role pengguna dari session
        $data['bagian'] = $this->db->get('bagian')->result_array(); // Ambil data dari tabel bagian
        $data['pesanan'] = $this->session->userdata('pesanan') ?? []; // Ambil pesanan dari session

        // Tampilkan header, form, dan footer
        $this->load->view('templates/header', $data);
        $this->load->view('barang/form_penerima', $data);
        $this->load->view('templates/footer');
    }

    // Simpan data penerima
    public function simpanPenerima()
    {
        // Data dari form
        $id_bagian = $this->input->post('id_bagian');
        $nama_bagian = $this->input->post('nama_bagian');
        $nama_penerima = $this->input->post('nama_penerima');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $pesanan = $this->session->userdata('pesanan'); // Pesanan dari session

        // Simpan ke session
        $dataPenerima = [
            'id_bagian' => $id_bagian,
            'nama_bagian' => $nama_bagian,
            'nama_penerima' => $nama_penerima,
            'tanggal_keluar' => $tanggal_keluar,
            'pesanan' => $pesanan,
        ];
        $this->session->set_userdata('penerima', $dataPenerima);

        // Update jumlah barang di database berdasarkan pesanan
        foreach ($pesanan as $id_barang => $jumlah) {
            // Ambil data barang dari database
            $barang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();

            if ($barang) {
                // Kurangi jumlah barang di database
                $new_quantity = $barang['jmlh_barang'] - $jumlah;

                // Update database
                $this->db->update('barang', ['jmlh_barang' => $new_quantity], ['id_barang' => $id_barang]);
            }
        }

        // Redirect ke halaman cetak PDF
        redirect('barang/cetakPDF');
    }


    public function cetakPDF()
    {
        // Ambil data penerima dan pesanan dari session
        $dataPenerima = $this->session->userdata('penerima');
        $pesanan = $this->session->userdata('pesanan') ?? [];

        // Cek apakah data penerima ada
        if (!$dataPenerima) {
            echo "Data penerima tidak ditemukan.";
            return;
        }

        // Ambil data barang berdasarkan ID dari pesanan
        $barang = [];
        foreach ($pesanan as $id_barang => $jumlah) {
            $barangData = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
            if ($barangData) {
                $barang[] = [
                    'id_barang' => $barangData['id_barang'],
                    'nama_barang' => $barangData['nama_barang'],
                    'jmlh_barang' => $jumlah,
                    'deskripsi' => $barangData['deskripsi']
                ];
            }
        }

        // Siapkan data untuk view PDF
        $data = [
            'penerima' => $dataPenerima,
            'barang' => $barang
        ];

        // Load library PDF
        $this->load->library('pdf');
        $html = $this->load->view('barang/pdf_template', $data, true);

        // Konfigurasi dan generate PDF
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'portrait',);
        $this->pdf->render();
        $this->pdf->stream("pesanan_barang.pdf", ["Attachment" => false]);
    }
}
