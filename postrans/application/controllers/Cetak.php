<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('cetak_m');
    $this->load->library('form_validation');
  }

  public function print($id)
  {
    $query = $this->cetak_m->get($id);
    $query1 = $this->cetak_m->getBarang($id);
    $this->cetak($query, $query1);
  }

  private function cetak($data, $data2)
  {
    $this->load->library('CustomPDF');

    $pdf = new FPDF();
    $pdf->AddPage('P', 'Letter');
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Cell(190, 7, 'Laporan ' . 'outbound', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(50, 7, 'Kode Seal', 1, 0, 'C');
    $pdf->Cell(50, 7, 'Nama Pos', 1, 0, 'C');
    $pdf->Cell(50, 7, 'Tanggal Cetak', 1, 0, 'C');
    $pdf->Cell(45, 7, 'Tujuan', 1, 0, 'C');
    $pdf->Ln();

    $no = 1;
    foreach ($data as $d) {
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(50, 7, $d['id_outbound'], 1, 0, 'C');
      $pdf->Cell(50, 7, $d['Nama'], 1, 0, 'C');
      $pdf->Cell(50, 7, $d['tanggal_cetak'], 1, 0, 'C');
      $pdf->Cell(45, 7, $d['Tujuan'], 1, 0, 'L');
      $pdf->Ln();
    }

    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Ln(3);

    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
    $pdf->Cell(25, 7, 'Id Barang', 1, 0, 'C');
    $pdf->Cell(40, 7, 'Isi', 1, 0, 'C');
    $pdf->Cell(25, 7, 'Berat', 1, 0, 'C');
    $pdf->Cell(95, 7, 'Alamat', 1, 0, 'C');
    $pdf->Ln();

    $no = 1;
    foreach ($data2 as $d) {
      $pdf->SetFont('Arial', '', 10);
      $pdf->SetX(1.5);
      $y = $pdf->GetY();
      $pdf->SetY($y);
      $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
      $pdf->Cell(25, 7, $d['barang_id'], 1, 0, 'C');
      $pdf->Cell(40, 7, $d['isi'], 1, 0, 'C');
      $pdf->Cell(25, 7, $d['berat'], 1, 0, 'C');
      $pdf->Cell(95, 7, $d['alamat'], 1, 0, 'C');
      $pdf->Ln();
    }

    $file_name = $data[0]['id_outbound'];
    $pdf->Output('I', $file_name);
  }
}
