<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Teknisi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		teknisi_logged_in();

		$this->load->model('M_Teknisi');
		// $this->load->helper('apifunction_helper');
	}

	public function index()
	{
		
		$data['count_teknisi'] = $this->M_Teknisi->teknisi_count()->result();
		$this->load->view('teknisi/Vt_dashboard', $data);
	}

	/*=============================================== MODULES teknisi =============================================================*/


    //UPDATE
	public function update_teknisi($teknisi_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_teknisi'] = $this->M_Teknisi->teknisi_id($teknisi_id)->row();
        $this->load->view('teknisi/Vt_teknisi-profile', $data);
	}

	public function update_teknisi_process()
	{
		$this->form_validation->set_rules('fullname','FULL NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required');  
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required');
    	$this->form_validation->set_rules('password','PASSWORD|max_length[30]|callback_pword_check|xss_clean');

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('user/Vt_teknisi-profile');
		}
		else
		{
			$data['teknisi_nama'] 	= $this->input->post('fullname');
			$data['teknisi_user'] 	= $this->input->post('username');  
			$data['teknisi_pass'] 	= $this->input->post('password');
			$data['teknisi_almt'] 	= $this->input->post('address');
			$data['teknisi_tlpn'] 	= $this->input->post('tlpn');
			$teknisi_id 	 			= $this->input->post('teknisi_id');
        	$this->M_Teknisi->update_teknisi($teknisi_id, $data);
        	echo "<script>alert('Data Sukses Diupdate');window.location.href='index','refresh';</script>";
					// redirect('user/C_Teknisi','refresh');
		}
	}

	/*================================================ MODULES data servis ==================================================*/
	
    //READ
	public function read_servis()
	{
		$data['data_servis'] = $this->M_Teknisi->tb_servis()->result();
        $this->load->view('teknisi/Vt_servis-read', $data);
	}

	//ZOOM SERVIS
	public function zoom_servis($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Teknisi->nota($nota)->row();
        $this->load->view('teknisi/Vt_servis-zoom', $data);
	}

	/*================================================ MODULES transaksi servis ===============================================*/
	//read
	public function pengembalian_barang()
	{
		$data['data_servis'] = $this->M_Teknisi->tb_servis()->result();
        $this->load->view('teknisi/Vt_kondisi_barang', $data);
	}

	//update
	public function update_pengembalian($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Teknisi->nota($nota)->row();
        $this->load->view('teknisi/Vt_update_kondisi', $data);
	}

	public function pengembalian_servis_proses()
	{
		$this->load->helper('apifunction_helper');
    	$this->form_validation->set_rules('teknisi_nama','required');
    	$this->form_validation->set_rules('teknisi_id','required');
    	$this->form_validation->set_rules('status_servis','required'); 

		if($this->form_validation->run() == FALSE)
		 {  
			$data['kondisibrg']   	= $this->input->post('kondisibrg');
			$data['biaya']   	    = $this->input->post('biaya');
			$data['teknisi_nama']  	= $this->input->post('teknisi_nama');
			$data['teknisi_id']  	= $this->input->post('teknisi_id');
			$data['status_servis']  = $this->input->post('status_servis');
			$data['status_expired'] = '';
			$nota 	 	      	    = $this->input->post('nota');


			$this->M_Teknisi->update_servis($nota, $data);
			echo "<script>
					alert('Data Sukses Terupdate');
					window.location.href='pengembalian_barang';
				  </script>";
		}
	}


	public function sms()
	{
		$this->load->view('teknisi/Vt_sms');
	}


    function send(){
        if(isset($_POST['submit'])){
        	$this->load->helper('apifunction_helper');
            $tlpn            = $this->input->post('tlpn');
            $pesan           = $this->input->post('pesan');
           
           	echo $tlpn;
           	echo $pesan;
            sendsms($tlpn, $pesan);
        }else{
            // redirect('teknisi/C_Teknisi');
        }
    }

	

}
?>