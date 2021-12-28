<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	public function index()
	{
		$this->load->model('model_data');
		$data['data'] = $this->model_data->tampil();
		$this->load->view('admin/data', $data);
		
	}
	
	public function cetak()
	{
		$this->load->model('model_data');
		$data['data'] = $this->model_data->tampil();
		$this->load->view('admin/data',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */