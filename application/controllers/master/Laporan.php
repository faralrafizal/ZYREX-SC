<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	   function __construct(){
        parent::__construct();
        $this->load->model('M_Master');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Laporan Penjualan',
            'active_laporan'=>'active',
        );
        $this->session->unset_userdata('tgl_awal');
        $this->session->unset_userdata('tgl_akhir');
        $this->load->view('master/v_lap_penjualan');
    }

    function cari(){
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dt_result'=> $this->M_Master->getLapPenjualan($tgl_awal,$tgl_akhir),
            'tgl_awal'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
            'tgl_akhir'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
        );
        $this->load->view('master/v_result_laporan',$data);
    }

    function laporan()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['record']=  $this->M_Master->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('master/laporan2',$data);
        }
        else
        {
            $data['record']=  $this->M_Master->laporan_default();
            $this->load->view('master/laporan',$data);
        }
    }
}
