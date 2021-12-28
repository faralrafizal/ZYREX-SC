<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Main');
		$this->load->model('M_Master');
		$this->load->model('M_Admin');
		$this->load->model('M_Pm');
	}

	public function index()
	{
		if($this->session->userdata('master_user'))
		{
			$this->load->view('master/Va_dashboard');
		}
		elseif($this->session->userdata('admin_user'))
		{
			$this->load->view('admin/Va_dashboard');
		}
		elseif($this->session->userdata('teknisi_user'))
		{
			$this->load->view('teknisi/Vt_dashboard');
		}
		elseif($this->session->userdata('teknisi_nama'))
		{
			$this->load->view('teknisi/Vt_dashboard');
		}
		elseif($this->session->userdata('pm_user'))
		{
			$this->load->view('pm/Vm_dasboard');
		}
		elseif($this->session->userdata('pm_nama'))
		{
			$this->load->view('pm/Vm_dasboard');
		}
		elseif($this->session->userdata('nota'))
		{
			$this->load->view('user/Vm_dashboard');
		}
		else
		{
			$data['data_perusahaan'] = $this->M_Pm->perusahaan_id()->result();
			$this->load->view('V_Login', $data);
		}
	}

	public function login()
	{
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');

		$cek_master = $this->M_Main->get_master($username,$password);
		$cek_admin = $this->M_Main->get_admin($username,$password);
		$cek_pm = $this->M_Main->get_pm($username,$password);
		$cek_user = $this->M_Main->get_user($username,$password);
		$cek_teknisi = $this->M_Main->get_teknisi($username,$password);

		if($cek_master->num_rows() == 1)
		{
			foreach($cek_master->result_array() as $row)
			{
				$pass_auth = $row['master_pass'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'master_id' 	 => $row['master_id'],
						'master_user' => $row['master_user'],
						'level'		 => $row['level']
					);
					$this->session->set_userdata($row_data);
					// redirect('admin/C_Admin');
					// redirect(site_url('admin/C_Admin'));
					$myurl1 = 'master/C_Master';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurl1.'";
						</script>'
					;
				}
				else
				{
					echo "<script>alert('Login gagal, pastikan username dan password anda benar');window.location.href='index','refresh';</script>";
					// redirect(site_url('V_Login','refresh'));

					$myurllogin = 'V_Login';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurllogin.'";
						</script>'
					;
				}

			}
		}
		elseif($cek_admin->num_rows() == 1)
		{
			foreach($cek_admin->result_array() as $row)
			{
				$pass_auth = $row['admin_pass'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'admin_id' 	 => $row['admin_id'],
						'admin_user' => $row['admin_user'],
						'level'		 => $row['level']
					);
					$this->session->set_userdata($row_data);
					// redirect('admin/C_Admin');
					// redirect(site_url('admin/C_Admin'));
					$myurl1 = 'admin/C_Admin';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurl1.'";
						</script>'
					;
				}
				else
				{
					echo "<script>alert('Login gagal, pastikan username dan password anda benar');window.location.href='index','refresh';</script>";
					// redirect(site_url('V_Login','refresh'));

					$myurllogin = 'V_Login';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurllogin.'";
						</script>'
					;
				}

			}
		}
		elseif($cek_user->num_rows() == 1)
		{
			foreach($cek_user->result_array() as $row)
			{
				$pass_auth = $row['nota'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'nota'   => $row['nota'],
						'nmpemilik' => $row['nmpemilik']
					);
					$this->session->set_userdata($row_data);
					// redirect(site_url('user/C_User'));
					$myurl4 = 'user/C_User';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurl4.'";
						</script>'
					;
				}
				else
				{
					echo "<script>alert('Login gagal, pastikan username dan password anda benar');window.location.href='index','refresh';</script>";
					$myurllogin = 'V_Login';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurllogin.'";
						</script>'
					;
				}

			}
		}
		elseif($cek_pm->num_rows() == 1)
		{
			foreach($cek_pm->result_array() as $row)
			{
				$pass_auth = $row['pm_pass'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'pm_id'   => $row['pm_id'],
						'pm_user' => $row['pm_user'],
						'pm_nama' => $row['pm_nama'],
						'level'	  => $row['level']
					);
					$this->session->set_userdata($row_data);
					// redirect('pm/C_Pm');
					$myurl2 = 'pm/C_Pm';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurl2.'";
						</script>'
					;
				}
				else
				{
					echo "<script>alert('Login gagal, pastikan username dan password anda benar');window.location.href='index','refresh';</script>";
					$myurllogin = 'V_Login';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurllogin.'";
						</script>'
					;
				}

			}
		}
		elseif($cek_teknisi->num_rows() == 1)
		{
			foreach($cek_teknisi->result_array() as $row)
			{
				$pass_auth = $row['teknisi_pass'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'teknisi_id'   => $row['teknisi_id'],
						'teknisi_user' => $row['teknisi_user'],
						'teknisi_nama' => $row['teknisi_nama'],
						'level'		   => $row['level']
					);
					$this->session->set_userdata($row_data);
					// redirect(site_url('teknisi/C_Teknisi'));
					$myurl3 = 'teknisi/C_Teknisi';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurl3.'";
						</script>'
					;
				}
				else
				{
					echo "<script>alert('Login gagal, pastikan username dan password anda benar');window.location.href='index','refresh';</script>";
					$myurllogin = 'V_Login';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurllogin.'";
						</script>'
					;
				}

			}
		}
		else
		{
			echo "<script>alert('Login gagal, pastikan username dan password anda benar');window.location.href='index','refresh';</script>";
					$myurllogin = 'V_Login';
					echo 
						'
						<script>
							window.location.href = "'.base_url().$myurllogin.'";
						</script>'
					;
		}
	
	}

    public function register()
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
			$this->load->view('V_Register');
		}
		else
		{
			$data['user_username'] 	= $this->input->post('username');  
			$data['user_pass'] 	= $this->input->post('password');
			$data['user_nama'] 	= $this->input->post('fullname');
			$data['user_almt'] 	= $this->input->post('address');
			$data['user_tlpn'] 	= $this->input->post('tlpn');
			$this->M_Master->create_user($data);
			$pesan['success']  = "Registrasion Success!";  
			$this->load->view('V_Login2',$pesan);
		}
	}  

    public function logout(){  
		$this->session->unset_userdata('master_id');  
        $this->session->unset_userdata('master_user'); 
        $this->session->unset_userdata('admin_id');  
        $this->session->unset_userdata('admin_user');  
        $this->session->unset_userdata('user_id');  
        $this->session->unset_userdata('nota'); 
        $this->session->unset_userdata('pm_id');  
        $this->session->unset_userdata('pm_user'); 
        $this->session->unset_userdata('pm_nama'); 
        $this->session->unset_userdata('teknisi_id');  
        $this->session->unset_userdata('teknisi_user'); 
        $this->session->unset_userdata('teknisi_nama'); 
        // redirect(site_url(''));  
        $myurllogin = ' ';
					echo 
						'
						<script>
							window.location.href = "'.base_url().'";
						</script>'
					;
    }  

}

?>