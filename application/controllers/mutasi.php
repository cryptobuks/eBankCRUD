<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class mutasi extends CI_Controller{
    public function checkLoggedin(){
        $isLogged = $this->session->userdata('logged');
        $logged = NULL;

        if(strcmp($isLogged, "true")!=0){
            //not loggedin but try to access this page, redirect
            redirect('/index.php/login');
        } else{
            $logged = true;
        }

        return $logged;
    }

    public function getAllUserData(){
        //set userdata session to variables
        $data['fullname']   = $this->session->userdata('fullname');
        $data['userid']     = $this->session->userdata('userid');
        $data['detailID']   = $this->session->userdata('detailID');

        //if admin
        $data['admin']      = $this->session->userdata('admin');

        //set static pages to variables(data)
        $data['cdn']        = $this->load->view('include/cdn', NULL, TRUE);
        $data['style']      = $this->load->view('include/main/user_style', NULL, TRUE);
        $data['header']     = $this->load->view('include/main/header', NULL, TRUE);
        $data['footer']     = $this->load->view('include/main/footer', NULL, TRUE);
        $data['bottom_cdn'] = $this->load->view('include/main/bottom_cdn', NULL, TRUE);

        //rawtime is rawtime of lastlogin
        $rawtime            = $this->session->userdata('lastlogin');
        $data['time']       = substr($rawtime, -11);
        $data['day']        = substr($rawtime, 0, 11);

        //realrawtime is rawtime of current date
        $realrawtime        = $this->session->userdata('currenttime');
        $data['current']    = substr($realrawtime, 0, 11);

        //send data to static pages because static pages need to calling variables
        $data['sidebar']    = $this->load->view('include/main/sidebar',   array('fullname' => $data['fullname'], 'admin' => $data['admin']), TRUE);
        $data['basicInfo']  = $this->load->view('include/main/basic_info', array('current' => $data['current'], 'userid' => $data['userid'], 'day' => $data['day'], 'time' => $data['time']), TRUE);

        $uid 				 = $data['detailID'];
        $dataHistory 		 = $this->loadData($uid);
        $data['dataHistory'] = $dataHistory->result();

        $data['datatable']  = $this->load->view('include/main/mutasi/datatable', array('dataHistory' => $data['dataHistory']), TRUE);

        return $data;
    }

    public function index(){
        $logged = $this->checkLoggedin();

        if($logged == true){
            $data = $this->getAllUserData();

            $this->load->view('main/mutasi.php', $data);
        }
    }

    public function loadData($uid){

        $this->load->model('mutasimodel');
        $dataHistory = $this->mutasimodel->loadmutasi($uid);

        return $dataHistory;
    }

    public function makePDF(){
        $data['detailID']    = $this->session->userdata('detailID');

        $uid                 = $data['detailID'];
        $dataHistory         = $this->loadData($uid);
        $data['dataHistory'] = $dataHistory->result();

        $this->load->library('fpdf/pdf_autoprint');

        $pdf = new PDF_AutoPrint();
        $pdf->AliasNbPages();

        $pdf->AddPage();
        //Header Judul
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,  0,  0);


        $pdf->Cell(5,  10, "", 0, '0', 'L', true);
        $pdf->Cell(170,10, "Mutasi Rekening", 0, '0', 'L', true);
        $pdf->Ln();

        // Datanya
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,  0,0);

        $pdf->Cell(5,   7, "#",          0, '0', 'L', true);
        $pdf->Cell(50,   7, "ID",          0, '0', 'L', true);
        $pdf->Cell(30,   7, "Tanggal", 0, '0', 'L', true);
        $pdf->Cell(20,  7, "Mutasi", 0, '0', 'L', true);
        $pdf->Cell(50,   7, "Transaksi", 0, '0', 'L', true);
        $pdf->Cell(40, 7, "Nominal", 0, '0', 'L', true);
        $pdf->Ln();

        // Datanya
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,  0,0);

        $idx = 1;
        foreach ($data['dataHistory'] as $line){
            switch ($line->transact_type){case '0': $jenis = 'Credit'; break; case '1': $jenis = 'Debit';}
            $pdf->Cell(5,   7, $idx,          0, '0', 'L', true);
            $pdf->Cell(50,   7, $line->id,          0, '0', 'L', true);
            $pdf->Cell(30,   7, $line->transact_date, 0, '0', 'L', true);
            $pdf->Cell(20,  7, $jenis, 0, '0', 'L', true);
            $pdf->Cell(50,   7, $line->transact_name, 0, '0', 'L', true);
            $pdf->Cell(40, 7, "Rp. ".number_format($line->transact_nominal).",-", 0, '0', 'L', true);
            $pdf->Ln();
            $idx += 1;
        }
        $pdf->SetTextColor( 255,0,0);
        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(155, 7, '* Mutasi Rekening', 0, '0', 'L', true);
        $pdf->Ln();

        $print = $this->input->post('print');
        $simpan = $this->input->post('simpan');

        if (isset($print)){
            $pdf->AutoPrint();
            $pdf->Output("mutasi" . '.pdf', 'I');
        }else if (isset($simpan)){
            $pdf->Output("mutasi" . '.pdf', 'D');
        }
    }
}