<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuktiTr extends CI_Controller {

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

        //if admin
        $data['admin']      = $this->session->userdata('admin');

        //set static pages to variables
        $data['cdn']        = $this->load->view('include/cdn', NULL, TRUE);
        $data['bottom_cdn'] = $this->load->view('include/main/bottom_cdn', NULL, TRUE);
        $data['style']      = $this->load->view('include/main/user_style', NULL, TRUE);
        $data['header']     = $this->load->view('include/main/header', NULL, TRUE);
        $data['footer']     = $this->load->view('include/main/footer', NULL, TRUE);

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


        //Tang002-0517jY70F-a
        $uid     = $this->input->post('reffid');

        $this->load->model('transfermodel');
        $checkTo = $this->transfermodel->checkTransferTo($uid);

        $dataHistory = $this->loadData($uid, $checkTo);

        $data['dataHistory'] = $dataHistory;

        $data['formButktiTf'] = $this->load->view('include/main/buktiTr/form', array('dataHistory' => $data['dataHistory'], 'exist' => $checkTo), TRUE);

        return $data;
    }

    public function index(){
        $logged = $this->checkLoggedin();

        if($logged == true){
            $data = $this->getAllUserData();

            $this->load->view('main/buktiTr.php', $data);
        }
    }

    public function loadData($uid, $checkTo){

        $this->load->model('historymodel');

        if($checkTo == 0 || $checkTo == 2 || $checkTo == 2 || $checkTo == 3 || $checkTo == 4 ){
            $dataHistory = $this->historymodel->loadbuktiTrToNon($uid);
        }else{
            $dataHistory = $this->historymodel->loadbuktiTr($uid);
        }

        if($dataHistory->num_rows()>0){
            foreach ($dataHistory->result() as $line) {
                return $line;
            }
        }
        return $dataHistory;
    }

    //to PDF
    public function makePDF()
    {
        $uid = $this->input->post('reffid');

        $this->load->model('transfermodel');
        $checkTo = $this->transfermodel->checkTransferTo($uid);
        $dataHistory = $this->loadData($uid, $checkTo);

        $this->load->library('fpdf/pdf_autoprint');

        $pdf = new PDF_AutoPrint();

        $pdf->AliasNbPages();

        $pdf->AddPage();
        //Header Judul
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,  0,  0);


        $pdf->Cell(5,  10, "", 0, '0', 'L', true);
        $pdf->Cell(170,10, "Bukti Transaksi", 0, '0', 'L', true);
        $pdf->Ln();

        // Datanya
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,  0,0);

        $pdf->Cell(5,   7, "",        0, '0', 'L', true);
        $pdf->Cell(40,  7, "Tanggal", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":",       0, '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->transact_date, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "",      0,   '0', 'L', true);
        $pdf->Cell(40,  7, "Jam",   0,   '0', 'L', true);
        $pdf->Cell(5,   7, ":",     0,   '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->transact_time, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "",          0, '0', 'L', true);
        $pdf->Cell(40,  7, "Nomor Referensi", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":",          0, '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->id, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "",          0, '0', 'L', true);
        $pdf->Cell(40,  7, "Tujuan",    0, '0', 'L', true);
        $pdf->Cell(5,   7, ":",         0, '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->transact_rek, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(40,  7, "Nama Penerima", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":", 0, '0', 'L', true);
        if($checkTo == 1){
            $pdf->Cell(  115, 7, $dataHistory->first_name . ' ' . $dataHistory->last_name, 0, '0', 'L', true);
        }else if ($checkTo==0){$pdf->Cell(115, 7, "Rekening Bank Lain", 0, '0', 'L', true);}
        else if ($checkTo==2){$pdf->Cell(115, 7, "Pembayaran Internet", 0, '0', 'L', true);}
        else if ($checkTo==3){$pdf->Cell(115, 7, "Pembayaran Telepon", 0, '0', 'L', true);}
        else $pdf->Cell(115, 7, "Pembayaran Kartu Kredit", 0, '0', 'L', true);


        $pdf->Ln();

        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(40,  7, "Jumlah", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":", 0, '0', 'L', true);
        $pdf->Cell(115, 7, "Rp. " . $dataHistory->transact_nominal, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(40,  7, "Berita", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":", 0, '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->transact_desc , 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "",  0, '0', 'L', true);
        $pdf->Cell(40,  7, "",  0, '0', 'L', true);
        $pdf->Cell(5,   7, ":", 0, '0', 'L', true);
        $pdf->Cell(115, 7, "-", 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(40,  7, "Jenis Transaksi", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":", 0, '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->transact_name, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(40,  7, "Status", 0, '0', 'L', true);
        $pdf->Cell(5,   7, ":", 0, '0', 'L', true);
        $pdf->Cell(115, 7, $dataHistory->transact_status, 0, '0', 'L', true);
        $pdf->Ln();

        $pdf->SetTextColor( 255,0,0);
        $pdf->Cell(5,   7, "", 0, '0', 'L', true);
        $pdf->Cell(155, 7, '* Catat Nomor Referensi Sebagai Bukti Transaksi Anda', 0, '0', 'L', true);
        $pdf->Ln();

        $print = $this->input->post('print');
        $simpan = $this->input->post('simpan');

        if (isset($print)){
            $pdf->AutoPrint();
            $pdf->Output($dataHistory->id . '.pdf', 'I');
        }else if (isset($simpan)){
            $pdf->Output($dataHistory->id . '.pdf', 'D');
        }
    }
}
