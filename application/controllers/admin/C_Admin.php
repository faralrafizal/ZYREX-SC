<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		admin_logged_in();

		$this->load->model('M_Master');
		$this->load->model('M_Admin');
		$this->load->model('M_Teknisi');
		$this->load->model('M_Pm');
		$this->load->helper('currency_format_helper');
	}

	public function index()
	{
		$data['count_master']  = $this->M_Master->master_count()->result();
		$data['count_admin']  = $this->M_Admin->admin_count()->result();
		$data['data_pm']	= $this->M_Admin->tb_pm()->result();
		$data['data_teknisi']	= $this->M_Admin->tb_teknisi()->result();
		$data['count_user'] = $this->M_Admin->user_count()->result();
		$this->load->view('admin/Va_dashboard', $data);
	}

	
    /*==================== MODULES MASTER ===================================================================================*/
	//CREATE
	public function create_master()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_master']		= $this->M_Master->tb_master()->result();
		$data['data_user']	= $this->M_Master->tb_user()->result();

		$this->load->view('admin/Va_master-create', $data);
	}
	public function create_master_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[master.master_user]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]'); 

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_master-create');
		}
		else
		{
			$data['master_user'] = $this->input->post('username');
			// $data['admin_user'] = str_replace(' ', '', $this->input->post('username'));  
			$data['master_pass'] = $this->input->post('password');
			$data['level']		= 5;
			$this->M_Master->create_master($data);
			// redirect(site_url('admin/C_Admin/read_admin'));
			$myurl1 = 'admin/C_Admin/read_master';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;
		}
	}


    //READ
	public function read_master()
	{
		$data['data_master'] = $this->M_Master->tb_master()->result();
        $this->load->view('admin/Va_master-read', $data);
	}


    //UPDATE
	public function update_master($master_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_master'] = $this->M_Master->master_id($master_id)->row();
        $this->load->view('admin/Va_master-update', $data);
	}
	public function update_master_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	 $this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_master-create');
		}
		else
		{
			$data['master_user'] = str_replace(' ', '', $this->input->post('username'));  
			$data['master_pass'] = $this->input->post('password');
			$master_id 	 		= $this->input->post('master_id');
        	$this->M_Master->update_master($master_id, $data);
        	$myurl1 = 'admin/C_Admin/read_master';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;
		}
	}


    //DELETE
	public function delete_master($master_id)
	{
        $this->M_Master->delete_master($master_id);
		// redirect(site_url('admin/C_Admin/read_admin')); 
		$myurl1 = 'admin/C_Admin/read_master';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;    
	}
	/*==================== MODULES ADMIN ===================================================================================*/
	//CREATE
	public function create_admin()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin']		= $this->M_Admin->tb_admin()->result();
		$data['data_user']	= $this->M_Admin->tb_user()->result();

		$this->load->view('admin/Va_admin-create', $data);
	}
	public function create_admin_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[admin.admin_user]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]'); 

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_admin-create');
		}
		else
		{
			$data['admin_user'] = $this->input->post('username');
			// $data['admin_user'] = str_replace(' ', '', $this->input->post('username'));  
			$data['admin_pass'] = $this->input->post('password');
			$data['level']		= 1;
			$this->M_Admin->create_admin($data);
			// redirect(site_url('admin/C_Admin/read_admin'));
			$myurl1 = 'admin/C_Admin/read_admin';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;
		}
	}


    //READ
	public function read_admin()
	{
		$data['data_admin'] = $this->M_Admin->tb_admin()->result();
        $this->load->view('admin/Va_admin-read', $data);
	}


    //UPDATE
	public function update_admin($admin_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin'] = $this->M_Admin->admin_id($admin_id)->row();
        $this->load->view('admin/Va_admin-update', $data);
	}
	public function update_admin_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	 $this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_admin-create');
		}
		else
		{
			$data['admin_user'] = str_replace(' ', '', $this->input->post('username'));  
			$data['admin_pass'] = $this->input->post('password');
			$admin_id 	 		= $this->input->post('admin_id');
        	$this->M_Admin->update_admin($admin_id, $data);
        	$myurl1 = 'admin/C_Admin/read_admin';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;
		}
	}


    //DELETE
	public function delete_admin($admin_id)
	{
        $this->M_Admin->delete_admin($admin_id);
		// redirect(site_url('admin/C_Admin/read_admin')); 
		$myurl1 = 'admin/C_Admin/read_admin';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;    
	}


	/*====================================================== MODULES pramuniaga ==================================================*/
	//CREATE
	
	public function create_pm()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin']		= $this->M_Admin->tb_admin()->result();
		$data['data_pm']	= $this->M_Admin->tb_pm()->result();
		$data['data_teknisi']	= $this->M_Admin->tb_teknisi()->result();
		$data['data_user']	= $this->M_Admin->tb_user()->result();
		
		

		$this->load->view('admin/Va_pm-create', $data);
	}

	public function create_pm_process()
	{

		$this->form_validation->set_rules('fullname','USER NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[pramuniaga.pm_user]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('address','ALAMAT','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required');
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		
		
		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_pm-create');
		}
		else
		{
			$data['pm_user'] 	= $this->input->post('username');  
			$data['pm_pass'] 	= $this->input->post('password');
			$data['pm_nama'] 	= htmlspecialchars($this->input->post('fullname'),true);
			$data['pm_almt'] 	= htmlspecialchars($this->input->post('address'),true);
			$data['pm_tlpn'] 	= $this->input->post('tlpn');
			$data['level']		= 2;
			$this->M_Admin->create_pm($data);
			echo "<script>
					alert('Data Ticketing Sukses Tersimpan');
					window.location.href='read_pm';
				  </script>";
		}
		
	}


    //READ
	public function read_pm()
	{
		$data['data_pm'] = $this->M_Admin->tb_pm()->result();
        $this->load->view('admin/Va_pm-read', $data);
	}


    //UPDATE
	public function update_pm($pm_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_pm'] = $this->M_Admin->pm_id($pm_id)->row();
        $this->load->view('admin/Va_pm-update', $data);
	}
	public function update_pm_process()
	{
		$this->form_validation->set_rules('fullname','FULL NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required'); 
    	$this->form_validation->set_rules('password|max_length[30]|callback_pword_check|xss_clean');    

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_pm-create');
		}
		else
		{
			$data['pm_nama'] 	= $this->input->post('fullname');
			$data['pm_user'] 	= $this->input->post('username');  
			$data['pm_pass'] 	= $this->input->post('password');
			$data['pm_almt'] 	= $this->input->post('address');
			$data['pm_tlpn'] 	= $this->input->post('tlpn');
			$pm_id 	 			= $this->input->post('pm_id');
        	$this->M_Admin->update_pm($pm_id, $data);
			echo "<script>
					alert('Edit Data Pramuniaga Sukses Tersimpan');
					window.location.href='read_pm';
				  </script>";
		}
	}


    //DELETE
	public function delete_pm($pm_id)
	{
        $this->M_Admin->delete_pm($pm_id);
		// redirect(site_url('admin/C_Admin/read_pm'));
		$myurl2 = 'admin/C_Admin/read_pm';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl2.'";
						</script>'
					;       

	}






	/*====================================================== MODULES teknisi ==================================================*/
	//CREATE
	public function create_teknisi()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin']		= $this->M_Admin->tb_admin()->result();
		$data['data_pm']	= $this->M_Admin->tb_pm()->result();
		$data['data_teknisi']	= $this->M_Admin->tb_teknisi()->result();
		$data['data_user']	= $this->M_Admin->tb_user()->result();

		$this->load->view('admin/Va_teknisi-create', $data);
	}
	public function create_teknisi_process()
	{
		$this->form_validation->set_rules('fullname','USER NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[teknisi.teknisi_user]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('address','ALAMAT','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required');  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_teknisi-create');
		}
		else
		{
			$data['teknisi_user'] 	= $this->input->post('username');  
			$data['teknisi_pass'] 	= $this->input->post('password');
			$data['teknisi_nama'] 	= $this->input->post('fullname');
			$data['teknisi_almt'] 	= $this->input->post('address');
			$data['teknisi_tlpn'] 	= $this->input->post('tlpn');
			$data['level']			= 3;
			$this->M_Admin->create_teknisi($data);
			echo "<script>
					alert('Data Teknisi Sukses Tersimpan');
					window.location.href='read_teknisi';
				  </script>";
		}
	}


    //READ
	public function read_teknisi()
	{
		$data['data_teknisi'] = $this->M_Admin->tb_teknisi()->result();
        $this->load->view('admin/Va_teknisi-read', $data);
	}


    //UPDATE
	public function update_teknisi($teknisi_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_teknisi'] = $this->M_Admin->teknisi_id($teknisi_id)->row();
        $this->load->view('admin/Va_teknisi-update', $data);
	}
	public function update_teknisi_process()
	{
		$this->form_validation->set_rules('fullname','FULL NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required');
    	$this->form_validation->set_rules('password','PASSWORD|max_length[30]|callback_pword_check|xss_clean');  
		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_teknisi-create');
		}
		else
		{
			$data['teknisi_nama'] 	= $this->input->post('fullname');
			$data['teknisi_user'] 	= $this->input->post('username');  
			$data['teknisi_pass'] 	= $this->input->post('password');
			$data['teknisi_almt'] 	= $this->input->post('address');
			$data['teknisi_tlpn'] 	= $this->input->post('tlpn');
			$teknisi_id 	 			= $this->input->post('teknisi_id');
        	$this->M_Admin->update_teknisi($teknisi_id, $data);
			echo "<script>
					alert('Edit Data Teknisi Sukses Tersimpan');
					window.location.href='read_teknisi';
				  </script>";
		}
	}


    //DELETE
	public function delete_teknisi($teknisi_id)
	{
        $this->M_Admin->delete_teknisi($teknisi_id);
 
		$myurl3 = 'admin/C_Admin/read_teknisi';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl3.'";
						</script>'
					;     
	}




	/*====================================================== MODULES user ==================================================*/
	//CREATE
	public function create_user()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin']		= $this->M_Admin->tb_admin()->result();
		$data['data_pm']	= $this->M_Admin->tb_pm()->result();
		$data['data_teknisi']	= $this->M_Admin->tb_teknisi()->result();
		$data['data_user']	= $this->M_Admin->tb_user()->result();

		$this->load->view('admin/Va_user-create', $data);
	}
	public function create_user_process()
	{
		$this->form_validation->set_rules('fullname','USER NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[user.user_username]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('address','ALAMAT','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required'); 
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
        $this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_user-create');
		}
		else
		{
			$data['user_username'] 	= $this->input->post('username');  
			$data['user_pass'] 	= $this->input->post('password');
			$data['user_nama'] 	= $this->input->post('fullname');
			$data['user_almt'] 	= $this->input->post('address');
			$data['user_tlpn'] 	= $this->input->post('tlpn');
			$this->M_Admin->create_user($data);
			$myurl1 = 'admin/C_Admin/read_admin';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;
		}
	}


    //READ
	public function read_user()
	{
		$data['data_user'] = $this->M_Admin->tb_user()->result();
        $this->load->view('admin/Va_user-read', $data);
	}


    //UPDATE
	public function update_user($user_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_user'] = $this->M_Admin->user_id($user_id)->row();
        $this->load->view('admin/Va_user-update', $data);
	}
	public function update_user_process()
	{
		$this->form_validation->set_rules('fullname','FULL NAME','required');
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('tlpn','NO. TLPN','required');
    	$this->form_validation->set_rules('password','PASSWORD|max_length[30]|callback_pword_check|xss_clean');   

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_user-create');
		}
		else
		{
			$data['user_nama'] 	= $this->input->post('fullname');
			$data['user_username'] 	= $this->input->post('username');  
			$data['user_pass'] 	= $this->input->post('password');
			$data['user_almt'] 	= $this->input->post('address');
			$data['user_tlpn'] 	= $this->input->post('tlpn');
			$user_id 	 			= $this->input->post('user_id');
        	$this->M_Admin->update_user($user_id, $data);
			// redirect(site_url('admin/C_Admin/read_user'));
			$myurl1 = 'admin/C_Admin/read_admin';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl1.'";
						</script>'
					;
		}
	}


    //DELETE
	public function delete_user($user_id)
	{
        $this->M_Admin->delete_user($user_id);
		// redirect(site_url('admin/C_Admin/read_user'));  
		$myurl4 = 'admin/C_Admin/read_user';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl4.'";
						</script>'
					;

	}


	/*====================================================== MODULES komplain ==================================================*/
	
    //READ
	public function read_komplain()
	{
		$data['data_komplain'] = $this->M_Admin->tb_komplain()->result();
        $this->load->view('admin/Va_komplain-read', $data);
	}
	
    //DELETE
	public function delete_komplain($komplain_id)
	{
        $this->M_Admin->delete_komplain($komplain_id);
		// redirect(site_url('admin/C_Admin/read_komplain'));  
		$myurl5 = 'admin/C_Admin/read_komplain';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl5.'";
						</script>'
					;

	}


	/*================================================ MODULES data servis ==================================================*/
	
    //READ
	public function read_servis()
	{
		$data['data_servis'] = $this->M_Admin->tb_servis()->result();
        $this->load->view('admin/Va_servis-read', $data);
	}
	
    //DELETE
	public function delete_servis($nota)
	{
        $this->M_Admin->delete_servis($nota);
		// redirect(site_url('admin/C_Admin/read_servis')); 
		$myurl6 = 'admin/C_Admin/read_servis';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl6.'";
						</script>'
					;   

	}

	//ZOOM SERVIS
	public function zoom_servis($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Admin->nota($nota)->row();
        $this->load->view('admin/Va_servis-zoom', $data);
	}


	/*================================================ MODULES laporan ========================================================*/
	function periode(){
        $data=array(
            'title'=>'Laporan Transaksi Servis',
            'active_laporan'=>'active',
            // 'data_penjualan'=>$this->M_Admin->getAllDataLaporan(),
        );
        $this->session->unset_userdata('tgl_awal');
        $this->session->unset_userdata('tgl_akhir');

        $this->load->view('admin/Va_laporan-read');
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
            'dt_result'=> $this->M_Admin->getLapPenjualan($tgl_awal,$tgl_akhir),
            'tgl_awal'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
            'tgl_akhir'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
        );
        $this->load->view('admin/v_result_laporan',$data);
    }

    // Nama Perushaan dan NOTA
    public function data_perusahaan($perusahaan_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_perusahaan'] = $this->M_Admin->perusahaan_id($perusahaan_id)->row();
        $this->load->view('admin/Va_perusahaan', $data);
	}

	
    
    // Proses Update Nama Perusahaan dan NOTA
    public function update_perusahaan()
	{
		$this->form_validation->set_rules('perusahaan_nama','NAMA USAHA','required');
    	$this->form_validation->set_rules('perusahaan_no_1','NO. KONTAK 1','required');  
    	$this->form_validation->set_rules('perusahaan_no_2','NO. KONTAK 1','required');
    	$this->form_validation->set_rules('perusahaan_alamat','ALAMAT USAHA','required');
    	$this->form_validation->set_rules('perusahaan_text_nota','TEKS NOTA','required');
    	$this->form_validation->set_rules('perusahaan_akun_login_customer','AKUN LOGIN CUSTOMER','required');
    	$this->form_validation->set_rules('perusahaan_tipe_nota','TIPE NOTA','required');
    	$this->form_validation->set_rules('perusahaan_ukuran','UKURAN NOTA PRINTER THERMAL','required');

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_perusahaan');
		}
		else
		{
			$data['perusahaan_nama'] 	   = $this->input->post('perusahaan_nama');
			$data['perusahaan_no_1'] 	   = $this->input->post('perusahaan_no_1');  
			$data['perusahaan_no_2'] 	   = $this->input->post('perusahaan_no_2');
			$data['perusahaan_alamat'] 	   = $this->input->post('perusahaan_alamat');
			$data['perusahaan_text_nota']  = $this->input->post('perusahaan_text_nota');
			$data['perusahaan_akun_login_customer']  = $this->input->post('perusahaan_akun_login_customer');
			$data['perusahaan_link']  	   = $this->input->post('perusahaan_link');
			$data['perusahaan_tipe_nota']  = $this->input->post('perusahaan_tipe_nota');
			$data['perusahaan_ukuran']     = $this->input->post('perusahaan_ukuran');
			$perusahaan_id 	 			   = $this->input->post('perusahaan_id');
        	$this->M_Admin->update_perusahaan($perusahaan_id, $data);
        	echo "<script>alert('Data Sukses Diupdate');window.location.href='index','refresh';</script>";
					// redirect('pm/C_Pm','refresh');
		}
	}

	/*================================================ MODULES data Customer ==================================================*/
	
    //READ
	public function read_customer()
	{
		$data['read_customer'] = $this->M_Admin->tb_customer()->result();
		$data['provinsi_id'] = $this->M_Admin->tb_provinsi()->result();
        $this->load->view('admin/Va_customer-read', $data);
	}

	//REDIRECT
	public function create_customer($idprov)
	{
		$data['data_customer']		= $this->M_Admin->tb_customer()->result();
		$data['provinsi'] = $this->M_Admin->tb_provinsi()->result();
		$data['kabupaten'] = $this->M_Admin->tb_kabupaten($idprov)->row();
		$this->load->view('admin/Va_customer-create', $data);
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
			$this->load->view('admin/Va_customer-create');
		}
		else
		{
			$data['customer_nama'] 	    = $this->input->post('fullname');  
			$data['customer_wa'] 	    = $this->input->post('whatsapp');
			$data['customer_email'] 	= $this->input->post('email');
			$data['customer_alamat'] 	= $this->input->post('address');
			$data['provinsi_id'] 	= $this->input->post('provinsi');
			$data['kabupaten_id'] 	= $this->input->post('kabupaten');
			$data['customer_tgl_lahir'] = $this->input->post('tgl_lahir');
			$this->M_Admin->create_customer($data);
			echo "<script>
					alert('Data Customer Sukses Tersimpan');
					window.location.href='read_customer';
				  </script>";
		}
	}

	public function getKabupaten()
    {
        $kabupatenId = $this->input->post('kabupaten');
        $idprov = $this->input->post('id');
        $data = $this->Dynamic_model->getDatakabupaten($idprov);
        $output = '<option value="">--Pilih Kabupaten-- </option>';
        foreach ($data as $row) {
            if ($kabupatenId) { //edit
                if ($kabupatenId == $row->id) {
                    $output .= '<option value="' . $row->id . '" selected> ' . $row->nama . '</option>';
                } else {
                    $output .= '<option value="' . $row->id . '"> ' . $row->nama . '</option>';
                }
            } else { //tambah
                $output .= '<option value="' . $row->id . '"> ' . $row->nama . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

	//UPDATE
	public function edit_customer($customer_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_customer'] = $this->M_Admin->customer_id($customer_id)->row();
        $this->load->view('admin/Va_customer-update', $data);
	}

	public function update_customer_process()
	{

			$data['customer_nama'] 	    = $this->input->post('fullname');  
			$data['customer_wa'] 	    = $this->input->post('whatsapp');
			$data['customer_email'] 	= $this->input->post('email');
			$data['customer_alamat'] 	= $this->input->post('address');
			$data['customer_tgl_lahir'] = $this->input->post('tgl_lahir');
			$customer_id 	 			= $this->input->post('customer_id');
        	$this->M_Admin->update_customer($customer_id, $data);
			echo "<script>
					alert('Edit Data Customer Sukses Terupdate');
					window.location.href='read_customer';
				  </script>";
		
	}

	//ZOOM
	public function zoom_customer($customer_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_customer'] = $this->M_Admin->customer_id($customer_id)->row();
        $this->load->view('admin/Va_customer-zoom', $data);
	}

	//DELETE
	public function delete_customer($customer_id)
	{
        $this->M_Admin->delete_customer($customer_id);
 
		$myurl3 = 'admin/C_Admin/read_customer';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'index.php/'.$myurl3.'";
						</script>'
					;     
	}


	/*==================== MODULES penerimaan Karyawan barang =========================*/
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

	/*================================================ MODULES pengembalian barang ===============================================*/
	//read
	public function pengembalian_barang_karyawan()
	{
		$data['data_servis'] = $this->M_Pm->tb_servis()->result();
        $this->load->view('pm/Vm_pengembalian_barang', $data);
	}

	//update
	public function update_pengembalian_karyawan($nota)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_servis'] = $this->M_Pm->nota($nota)->row();
		$data['data_perusahaan'] = $this->M_Pm->perusahaan_id()->result();
        $this->load->view('pm/Vm_update_pengembalian', $data);
	}

	public function pengembalian_servis_proses_karyawan()
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


	/*======================== MODULES Teknisi transaksi servis =============================*/
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
}
?>