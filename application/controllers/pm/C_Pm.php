<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		pm_logged_in();

		$this->load->model('M_Pm');
	}

	public function index()
	{
		$data['count_pm'] = $this->M_Pm->pm_count()->result();
		$this->load->view('pm/Vm_dasboard', $data);
	}

	/*================================================== MODULES user ===========================================================*/
    //READ
	public function read_pm()
	{
		$data['data_pm'] = $this->M_Pm->tb_pm()->result();
        $this->load->view('pm/Vm_pm-read', $data);
	}


    //UPDATE
	public function update_pm($pm_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_pm'] = $this->M_Pm->pm_id($pm_id)->row();
        $this->load->view('pm/Vm_pm-profile', $data);
	}
	public function update_pm_process()
	{
		$this->form_validation->set_rules('fullname','FULL NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required');  
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required');
    	$this->form_validation->set_rules('password','PASSWORD|max_length[30]|callback_pword_check|xss_clean'); 

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('pm/Vm_pm-profile');
		}
		else
		{
			$data['pm_nama'] 	= $this->input->post('fullname');
			$data['pm_user'] 	= $this->input->post('username');  
			$data['pm_pass'] 	= $this->input->post('password');
			$data['pm_almt'] 	= $this->input->post('address');
			$data['pm_tlpn'] 	= $this->input->post('tlpn');
			$pm_id 	 			= $this->input->post('pm_id');
        	$this->M_Pm->update_pm($pm_id, $data);
        	echo "<script>alert('Data Sukses Diupdate');window.location.href='index','refresh';</script>";
					// redirect('pm/C_Pm','refresh');

		}
	}



	/*================================================ MODULES data servis ==================================================*/
	
    //READ
	public function read_servis()
	{
		$data['data_servis'] = $this->M_Pm->tb_servis()->result();
        $this->load->view('pm/Vm_servis-read', $data);
	}

	//ZOOM SERVIS
	public function zoom_servis($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Pm->nota($nota)->row();
        $this->load->view('pm/Vm_servis-zoom', $data);
	}


	
	/*================================================ MODULES penerimaan barang ===============================================*/
	public function penerimaan_barang()
	{
		$data=array(
            'nota'=>$this->M_Pm->getKodeOtomatis(),
        );
        $data['read_customer'] 		= $this->M_Pm->tb_customer()->result();
		$data['data_servis'] 		= $this->M_Pm->tb_servis()->result();
		$data['data_perusahaan'] 	= $this->M_Pm->perusahaan_id()->result();
        $this->load->view('pm/Vm_penerimaan_barang', $data);
	}

	public function penerimaan_servis()
	{
		$data=array(
            'nota'=>$this->M_Pm->getKodeOtomatis(),
        );
		$data['data_servis'] = $this->M_Pm->tb_servis()->result();
        $this->load->view('pm/Vm_penerimaan_servis');
	}

	public function penerimaan_servis_customer($customer_id)
	{
		$data=array(
            'nota'=>$this->M_Pm->getKodeOtomatis(),
        );
		$data['read_customer'] = $this->M_Pm->tb_customer()->result();
		$data['data_servis'] = $this->M_Pm->tb_servis()->result();
		$data['data_customer'] = $this->M_Pm->customer_id($customer_id)->row();
        $this->load->view('pm/Vm_penerimaan_barang-customer', $data);
	}

	public function create_transaksi()
	{ 
		date_default_timezone_set('Asia/Jakarta');
		$this->form_validation->set_rules('nmbarang','required');
    	$this->form_validation->set_rules('nmpemilik','required');
    	$this->form_validation->set_rules('alamat','required');
    	$this->form_validation->set_rules('tlpn','required');
    	$this->form_validation->set_rules('kerusakan','required');
    	$this->form_validation->set_rules('kelengkapan','required'); 
    	$this->form_validation->set_rules('status_servis','required');
    	$this->form_validation->set_rules('status_expired','required');
    	$this->form_validation->set_rules('pm_id','required'); 
    	$this->form_validation->set_rules('pm_nama','required'); 

		if($this->form_validation->run() == FALSE)
		{  
			$data['nmbarang'] 	    	= $this->input->post('nmbarang');  
			$data['nmpemilik']   		= $this->input->post('nmpemilik');
			$data['slug_nmpemilik'] 	= $this->input->post('nmpemilik');
			$data['alamat'] 	    	= $this->input->post('alamat');
			$data['tlpn']    	    	= $this->input->post('tlpn');
			$data['kerusakan']  		= $this->input->post('kerusakan');
			$data['kelengkapan'] 		= $this->input->post('kelengkapan');
			$data['status_servis']  	= $this->input->post('status_servis');
			$data['status_expired'] 	= $this->input->post('status_expired');
			$data['pm_id']      		= $this->input->post('pm_id');
			$data['pm_nama']      		= $this->input->post('pm_nama');

			$data['merk_seri']      	= $this->input->post('merk_seri');
			$data['proc_vga']      		= $this->input->post('proc_vga');
			$data['s_n']         		= $this->input->post('s_n');
			$data['pass_warna']     	= $this->input->post('pass_warna');
			$data['hardisk']      		= $this->input->post('hardisk');
			$data['memory']      		= $this->input->post('memory');
			$data['ex_service_urgent']  = $this->input->post('ex_service_urgent');


			$data['tglditerima'] 		= date("Y-m-d ");
			$this->M_Pm->create_transaksi($data);
			echo "<script>
					alert('Data Penerimaan Barang Sukses Tersimpan');
					window.location.href='penerimaan_barang';
				  </script>";
			// $myurl1 = 'pm/C_Pm/penerimaan_barang';
			// echo '
			// 	<script>
			// 		window.location.href = "'.base_url().'index.php/'.$myurl1.'";
			// 	</script>'
			// ;  
					
		}
	}

	public function print_servis($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Pm->nota($nota)->row();
		$data['data_perusahaan'] = $this->M_Pm->perusahaan_id()->result();
        $this->load->view('pm/Vm_servis-print', $data);
	}
	//READ
	public function read_perusahaan()
	{
		$data['data_perusahaan'] = $this->M_Pm->perusahaan_id()->result();
       	$this->load->view('pm/Vm_servis-print', $data);
	}

	 //DELETE
	public function delete_servis($nota)
	{
        $this->M_Pm->delete_servis($nota);
		// redirect(site_url('pm/C_Pm/penerimaan_barang'));   

		$myurl1 = 'pm/C_Pm/penerimaan_barang';
		echo '
			<script>
				window.location.href = "'.base_url().'index.php/'.$myurl1.'";
			</script>'
		;  
	}

	/*================================================ MODULES pengembalian barang ===============================================*/
	//read
	public function pengembalian_barang()
	{
		$data['data_servis'] = $this->M_Pm->tb_servis()->result();
        $this->load->view('pm/Vm_pengembalian_barang', $data);
	}

	//update
	public function update_pengembalian($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Pm->nota($nota)->row();
		$data['data_perusahaan'] = $this->M_Pm->perusahaan_id()->result();
        $this->load->view('pm/Vm_update_pengembalian', $data);
	}

	public function pengembalian_servis_proses()
	{
		date_default_timezone_set('Asia/Jakarta');
        
    	$this->form_validation->set_rules('penyerah','required');
    	$this->form_validation->set_rules('status_servis','required'); 
    	$this->form_validation->set_rules('status_expired','required');

		if($this->form_validation->run() == FALSE)
		 {  
			$data['status_servis']  = $this->input->post('status_servis');
			$data['penyerah']   	= $this->input->post('penyerah');               
			$data['status_expired'] = $this->input->post('status_expired');
			$data['tglambil']   	= date("Y-m-d ");
			$nota 	 	      	    = $this->input->post('nota');
			$this->M_Pm->update_servis($nota, $data);
			$this->load->view('pm/Vm_nota_pengembalian_barang');
			
		}
	}

	public function print_pengembalian($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Pm->nota($nota)->row();
        $this->load->view('pm/Vm_servis_pengembalian-print', $data);
	}


	/*================================================ MODULES data Customer ==================================================*/
	
    //READ
	public function read_customer()
	{
		$data['read_customer'] = $this->M_Pm->tb_customer()->result();
        $this->load->view('pm/Vm_customer-read', $data);
	}

	//REDIRECT
	public function create_customer()
	{
		$data['data_customer']		= $this->M_Pm->tb_customer()->result();
		$this->load->view('pm/Vm_customer-create', $data);
	}

	// CREATE
	public function create_customer_process()
	{
		$this->form_validation->set_rules('fullname','USER NAME','required');
    	$this->form_validation->set_rules('whatsapp','whatsapp','required|trim|is_unique[customer.customer_wa]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('email','email','required|trim|is_unique[customer.customer_email]');
    	$this->form_validation->set_rules('address','address','required');  
    	$this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('pm/Vm_customer-create');
		}
		else
		{
			$data['customer_nama'] 	    = $this->input->post('fullname');  
			$data['customer_wa'] 	    = $this->input->post('whatsapp');
			$data['customer_email'] 	= $this->input->post('email');
			$data['customer_alamat'] 	= $this->input->post('address');
			$data['customer_tgl_lahir'] = $this->input->post('tgl_lahir');
			$this->M_Pm->create_customer($data);
			echo "<script>
					alert('Data Customer Sukses Tersimpan');
					window.location.href='read_customer';
				  </script>";
		}
	}

	//UPDATE
	public function edit_customer($customer_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_customer'] = $this->M_Pm->customer_id($customer_id)->row();
        $this->load->view('pm/Vm_customer-update', $data);
	}

	public function update_customer_process()
	{

			$data['customer_nama'] 	    = $this->input->post('fullname');  
			$data['customer_wa'] 	    = $this->input->post('whatsapp');
			$data['customer_email'] 	= $this->input->post('email');
			$data['customer_alamat'] 	= $this->input->post('address');
			$data['customer_tgl_lahir'] = $this->input->post('tgl_lahir');
			$customer_id 	 			= $this->input->post('customer_id');
        	$this->M_Pm->update_customer($customer_id, $data);
			echo "<script>
					alert('Edit Data Customer Sukses Terupdate');
					window.location.href='read_customer';
				  </script>";
		
	}

	//ZOOM
	public function zoom_customer($customer_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_customer'] = $this->M_Pm->customer_id($customer_id)->row();
        $this->load->view('pm/Vm_customer-zoom', $data);
	}

	//DELETE
	public function delete_customer($customer_id)
	{
        $this->M_Pm->delete_customer($customer_id);
 
		$myurl3 = 'pm/C_Pm/read_customer';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl3.'";
						</script>'
					;     
	}
        	
}
?>