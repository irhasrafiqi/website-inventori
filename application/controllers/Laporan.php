<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Laporan extends CI_Controller
{
    function __construct(){
		  parent::__construct();

      if(!isset($this->session->userdata['username'])) {
        $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
        redirect('auth');
      }


      $this->load->library('pdf');
      $this->load->model('MLaporan');

    } 
    
    function barang_masuk()
    {

        $data['graph'] = $this->MLaporan->graph();
        $data['caribarang'] = $this->MLaporan->show_barang();
        
        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangmasuk', $data);
        $this->load->view('templates/footer/tabel');
    }

    function barang_keluar()
    {

        $data['graph'] = $this->MLaporan->graph_keluar();
        $data['caribarang'] = $this->MLaporan->show_barang_keluar();
        
        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangkeluar', $data);
        $this->load->view('templates/footer/tabel');
    }

    function stok_barang()
    {
        
        $data['barang'] = $this->user_m->data_barang();

		$this->load->view('templates/head/dashboard');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('master/laporan/stokbarang', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_masuk()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['caribarang'] = $this->MLaporan->data_barang($dari,$sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangmasuk', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_keluar()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['caribarang'] = $this->MLaporan->data_barang_keluar($dari,$sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangkeluar', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_umum() {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['barang'] = $this->MLaporan->data_barang($dari,$sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/stokbarang', $data);
        $this->load->view('templates/footer/tabel');
    }

    function export_pdf_masuk($dari, $sampai)
    {    
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/img/BST.png',27,8,14);
        $pdf->Image('assets/img/surakarta.png',169,9,9);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'PT. BENGAWAN SOLO TRANS SURAKARTA',0,1,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(190,5,'Jl. Senden, Colomadu, Kabupaten Karanganyar, Provinsi Jawa Tengah',0,1,'C');
        $pdf->Cell(190,0,'',1,1,'C');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,10,'Laporan Barang Masuk PT. Bengawan Solo Trans',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,0,'C');
        $pdf->Cell(50,6,'Nama barang',1,0,'C');
        $pdf->Cell(30,6,'Jumlah masuk',1,0,'C');
        $pdf->Cell(30,6,'Satuan barang',1,1,'C');
        $pdf->SetFont('Arial','',10);

        
            $dtbarang = $this->MLaporan->data_barang($dari,$sampai);
            $no=1;
            foreach ($dtbarang as $row){
                $pdf->Cell(10,6,$no++,1,0,'C');
                $pdf->Cell(20,6,$row->tanggal,1,0);
                $pdf->Cell(50,6,$row->nama_barang,1,0);
                $pdf->Cell(30,6,$row->jumlah_masuk,1,0);
                $pdf->Cell(30,6,$row->satuan_barang,1,1); 
        }
        $pdf->Output();

    }

    function export_pdf_keluar($dari, $sampai)
    {    
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/img/BST.png',27,8,14);
        $pdf->Image('assets/img/surakarta.png',169,9,9);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'PT. BENGAWAN SOLO TRANS SURAKARTA',0,1,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(190,5,'Jl. Senden, Colomadu, Kabupaten Karanganyar, Provinsi Jawa Tengah',0,1,'C');
        $pdf->Cell(190,0,'',1,1,'C');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,10,'Laporan Barang Keluar PT. Bengawan Solo Trans',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(30,6,'Nomor Lambung',1,0);
        $pdf->Cell(30,6,'Nomor Plat',1,0);
        $pdf->Cell(20,6,'Tanggal',1,0);
        $pdf->Cell(50,6,'Nama Barang',1,0);
        $pdf->Cell(27,6,'Jumlah Keluar',1,0);
        $pdf->Cell(25,6,'Satuan',1,1);
        $pdf->SetFont('Arial','',10);


        $dtbarang = $this->MLaporan->data_barang_keluar($dari,$sampai);
        $no=1;
        foreach ($dtbarang as $row){
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$row->nomor_lambung,1,0);
            $pdf->Cell(30,6,$row->nomor_plat,1,0);
            $pdf->Cell(20,6,$row->tanggal,1,0);
            $pdf->Cell(50,6,$row->nama_barang,1,0);
            $pdf->Cell(27,6,$row->jumlah_keluar,1,0);
            $pdf->Cell(25,6,$row->satuan_barang,1,1); 
        }
        $pdf->Output();

    }

    function export_laporan_barang()
    {    
        $pdf = new FPDF('l','mm','A5');

        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/img/BST.png',27,8,14);
        $pdf->Image('assets/img/surakarta.png',169,9,9);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'PT. BENGAWAN SOLO TRANS SURAKARTA',0,1,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(190,5,'Jl. Senden, Colomadu, Kabupaten Karanganyar, Provinsi Jawa Tengah',0,1,'C');
        $pdf->Cell(190,0,'',1,1,'C');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,10,'Laporan Barang Masuk PT. Bengawan Solo Trans',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(50,6,'Nama barang',1,0,'C');
        $pdf->Cell(40,6,'Jumlah Barang Masuk',1,0,'C');
        $pdf->Cell(40,6,'Jumlah Barang Keluar',1,0,'C');
        $pdf->Cell(30,6,'Stok Akhir',1,1,'C');
        $pdf->SetFont('Arial','',10);

        
            $dtbarang = $this->user_m->data_barang();
            $no=1;
            foreach ($dtbarang as $row){
                $pdf->Cell(10,6,$no++,1,0,'C');
                $pdf->Cell(50,6,$row->nama_barang,1,0, 'C');
                $pdf->Cell(40,6,$row->stokbarang,1,0, 'C');
                $pdf->Cell(40,6,$row->keluar,1,0, 'C');
                $pdf->Cell(30,6,$row->stokbarang - $row->keluar,1,1, 'C'); 
        }
        $pdf->Output();
    }


}
