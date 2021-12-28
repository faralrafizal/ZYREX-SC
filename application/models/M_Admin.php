<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/*================================================== MODULES MASTER =====================================================*/
	//SELECT * FROM TABLES
	function tb_master()
	{
		$this->db->select('*')
				 ->from('master')
				 ->order_by('master_user','asc');
		return $this->db->get();
	}

	function master_count()
	{
		$this->db->select('COUNT(master_id) AS master_count')
				 ->from('master');
		return $this->db->get();
	}

	function master_id($master_id)
	{
		$this->db->select('*')
				 ->from('master')
				 ->where('master_id', $master_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_master($data)
	{
		$this->db->insert('master', $data);
	}	  	   
	    
	function update_master($master_id, $data)
	{
		$this->db->where(array('master_id' => $master_id, 'master_id !=' => 1));
		$this->db->update('master', $data);  
	}

	function delete_master($master_id)
	{ 
		$this->db->delete('master', array(
							'master_id' => $master_id, 
							'master_id !=' => 1
						));  
	}


	// Used for paginationsample
	function paging_master($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('master');
		$this->db->order_by('master_user', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}

	/*================================================== MODULES ADMIN =====================================================*/
	//SELECT * FROM TABLES
	function tb_admin()
	{
		$this->db->select('*')
				 ->from('admin')
				 ->order_by('admin_user','asc');
		return $this->db->get();
	}

	function admin_count()
	{
		$this->db->select('COUNT(admin_id) AS admin_count')
				 ->from('admin');
		return $this->db->get();
	}

	function admin_id($admin_id)
	{
		$this->db->select('*')
				 ->from('admin')
				 ->where('admin_id', $admin_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_admin($data)
	{
		$this->db->insert('admin', $data);
	}	  	   
	    
	function update_admin($admin_id, $data)
	{
		$this->db->where(array('admin_id' => $admin_id, 'admin_id !=' => 1));
		$this->db->update('admin', $data);  
	}

	function delete_admin($admin_id)
	{ 
		$this->db->delete('admin', array(
							'admin_id' => $admin_id, 
							'admin_id !=' => 1
						));  
	}


	// Used for paginationsample
	function paging_admin($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('admin_user', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}

/*====================================================== MODULES provinsi =============================================*/

	//SELECT * FROM TABLES
	function tb_provinsi()
	{
		$this->db->select('*')
				 ->from('wilayah_provinsi')
				 ->order_by('nama','asc');
		return $this->db->get();
	}

	function provinsi_count()
	{
		$this->db->select('COUNT(id_provinsi) AS provinsi_count')
				 ->from('wilayah_provinsi');
		return $this->db->get();
	}

	function id_provinsi($id_provinsi)
	{
		$this->db->select('*')
				 ->from('provinsi')
				 ->where('id_provinsi', $id_provinsi);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_provinsi($data)
	{
		$this->db->insert('provinsi', $data);
	}	  	   
	    
	function update_provinsi($id_provinsi, $data)
	{
		$this->db->where(array('id_provinsi' => $id_provinsi, 'id_provinsi !=' => 1));
		$this->db->update('provinsi', $data);  
	}

	function delete_provinsi($id_provinsi)
	{ 
		$this->db->delete('provinsi', array(
							'id_provinsi' => $id_provinsi, 
							'id_provinsi !=' => 1
						));    
	}


	// Used for paginationsample
	// function paging_provinsi($limit=array())
	// { 
	// 	$this->db->select('*');
	// 	$this->db->from('provinsi');
	// 	$this->db->order_by('pm_user', 'asc');
		        
	// 	if ($limit != NULL)
	// 	$this->db->limit($limit['perpage'], $limit['offset']);
		           
	// 	return $this->db->get();
	// }

	
/*====================================================== MODULES kabupaten =============================================*/

	//SELECT * FROM TABLES
	function tb_kabupaten($idprov)
	{
		$this->db->select('*')
				 ->from('wilayah_kabupaten',['provinsi_id'=>$idprov])
					 ->order_by('nama','asc');
		return $this->db->get();
	}

	function kabupaten_count()
	{
		$this->db->select('COUNT(id_kabupaten) AS kabupaten_count')
				 ->from('wilayah_kabupaten');
		return $this->db->get();
	}

	function id_kabupaten($id_kabupaten)
	{
		$this->db->select('*')
				 ->from('kabupaten')
				 ->where('id_kabupaten', $id_kabupaten);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_kabupaten($data)
	{
		$this->db->insert('kabupaten', $data);
	}	  	   
	    
	function update_kabupaten($id_kabupaten, $data)
	{
		$this->db->where(array('id_kabupaten' => $id_kabupaten, 'id_kabupaten !=' => 1));
		$this->db->update('kabupaten', $data);  
	}

	function delete_kabupaten($id_kabupaten)
	{ 
		$this->db->delete('kabupaten', array(
							'id_kabupaten' => $id_kabupaten, 
							'id_kabupaten !=' => 1
						));    
	}


	// Used for paginationsample
	// function paging_provinsi($limit=array())
	// { 
	// 	$this->db->select('*');
	// 	$this->db->from('provinsi');
	// 	$this->db->order_by('pm_user', 'asc');
		        
	// 	if ($limit != NULL)
	// 	$this->db->limit($limit['perpage'], $limit['offset']);
		           
	// 	return $this->db->get();
	// }

	



	/*====================================================== MODULES pramuniaga =============================================*/

	//SELECT * FROM TABLES
	function tb_pm()
	{
		$this->db->select('*')
				 ->from('pramuniaga')
				 ->order_by('pm_nama','asc');
		return $this->db->get();
	}

	function pm_count()
	{
		$this->db->select('COUNT(pm_id) AS pm_count')
				 ->from('pramuniaga');
		return $this->db->get();
	}

	function pm_id($pm_id)
	{
		$this->db->select('*')
				 ->from('pramuniaga')
				 ->where('pm_id', $pm_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_pm($data)
	{
		$this->db->insert('pramuniaga', $data);
	}	  	   
	    
	function update_pm($pm_id, $data)
	{
		$this->db->where(array('pm_id' => $pm_id, 'pm_id !=' => 1));
		$this->db->update('pramuniaga', $data);  
	}

	function delete_pm($pm_id)
	{ 
		$this->db->delete('pramuniaga', array(
							'pm_id' => $pm_id, 
							'pm_id !=' => 1
						));    
	}


	// Used for paginationsample
	function paging_pm($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('pramuniaga');
		$this->db->order_by('pm_user', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}




	/*======================================================== MODULES teknisi =============================================*/

	//SELECT * FROM TABLES
	function tb_teknisi()
	{
		$this->db->select('*')
				 ->from('teknisi')
				 ->order_by('teknisi_nama','asc');
		return $this->db->get();
	}

	function teknisi_count()
	{
		$this->db->select('COUNT(teknisi_id) AS teknisi_count')
				 ->from('teknisi');
		return $this->db->get();
	}

	function teknisi_id($teknisi_id)
	{
		$this->db->select('*')
				 ->from('teknisi')
				 ->where('teknisi_id', $teknisi_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_teknisi($data)
	{
		$this->db->insert('teknisi', $data);
	}	  	   
	    
	function update_teknisi($teknisi_id, $data)
	{
		$this->db->where(array('teknisi_id' => $teknisi_id, 'teknisi_id !=' => 1));
		$this->db->update('teknisi', $data);  
	}

	function delete_teknisi($teknisi_id)
	{ 
		$this->db->delete('teknisi', array(
							'teknisi_id' => $teknisi_id, 
							'teknisi_id !=' => 1
						));    
	}


	// Used for paginationsample
	function paging_teknisi($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('teknisi');
		$this->db->order_by('teknisi_user', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}


	/*======================================================== MODULES user ================================================*/

	//SELECT * FROM TABLES
	function tb_user()
	{
		$this->db->select('*')
				 ->from('user')
				 ->order_by('user_nama','asc');
		return $this->db->get();
	}

	function user_count()
	{
		$this->db->select('COUNT(user_id) AS user_count')
				 ->from('user');
		return $this->db->get();
	}

	function user_id($user_id)
	{
		$this->db->select('*')
				 ->from('user')
				 ->where('user_id', $user_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_user($data)
	{
		$this->db->insert('user', $data);
	}	  	   
	    
	function update_user($user_id, $data)
	{
		$this->db->where(array('user_id' => $user_id, 'user_id !=' => 1));
		$this->db->update('user', $data);  
	}

	function delete_user($user_id)
	{ 
		$this->db->delete('user', array(
							'user_id' => $user_id, 
							'user_id !=' => 1
						));    
	}


	// Used for paginationsample
	function paging_user($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('user_username', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}


	/*===================================================== MODULES komplain ================================================*/

	//SELECT * FROM TABLES
	function tb_komplain()
	{
		$this->db->select('*')
				 ->from('komplain')
				 ->order_by('komplain_id','desc');
		return $this->db->get();
	}

	function komplain_count()
	{
		$this->db->select('COUNT(komplain_id) AS komplain_count')
				 ->from('komplain');
		return $this->db->get();
	}

	function komplain_id($komplain_id)
	{
		$this->db->select('*')
				 ->from('komplain')
				 ->where('komplain_id', $komplain_id);
		return $this->db->get();
	}


	function delete_komplain($komplain_id)
	{ 
		$this->db->delete('komplain', array(
							'komplain_id' => $komplain_id
						));    
	}


	// Used for paginationsample
	function paging_komplain($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('komplain');
		// $this->db->order_by('user_username', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}


	/*================================================== MODULES data servis ================================================*/

	//SELECT * FROM TABLES
	function tb_servis()
	{
		$this->db->select('*')
				 ->from('dataservis')
				 ->order_by('nota','desc');
		return $this->db->get();
	}

	function servis_count()
	{
		$this->db->select('COUNT(nota) AS komplain_count')
				 ->from('dataservis');
		return $this->db->get();
	}

	function nota($nota)
	{
		$this->db->select('*')
				 ->from('dataservis')
				 ->where('nota', $nota);
		return $this->db->get();
	}


	function delete_servis($nota)
	{ 
		$this->db->delete('dataservis', array(
							'nota' => $nota
						));    
	}


	// Used for paginationsample
	function paging_servis($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('dataservis');
		// $this->db->order_by('user_username', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}

	/*================================================== MODULES laporan ================================================*/
	function getAllDataLaporan(){
        return $this->db->query("SELECT
                a.nota,
                a.tglambil,
                a.biaya,
			    (select count(nota) as jum from dataservis where nota=a.nota) as jumlah
			    from dataservis a
			    ORDER BY a.nota asc
		")->result();
    }

  function getLapPenjualan($tgl_awal,$tgl_akhir){
        return $this->db->query("SELECT *,sum(a.biaya) as total_all from dataservis a
                -- left join tbl_pelanggan b on a.kd_pelanggan=b.kd_pelanggan
                -- left join tbl_pegawai c on a.kd_pegawai=c.kd_pegawai
                where a.tglambil between '$tgl_awal' and '$tgl_akhir'
                ")->result();
    }


    function laporan_default()
    {
        $query="SELECT * FROM dataservis";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT * FROM dataservis WHERE tglambil BETWEEN '$tanggal1' and '$tanggal2' && biaya > 0";
        return $this->db->query($query);
    }

   	// Nama Perushaan dan NOTA
    function perusahaan_id($perusahaan_id)
	{
		$this->db->select('*')
				 ->from('perusahaan')
				 ->where('perusahaan_id', $perusahaan_id);
		return $this->db->get();
	}

	function update_perusahaan($perusahaan_id, $data)
	{
		$this->db->where(array('perusahaan_id' => $perusahaan_id, 'perusahaan_id !=' => 1));
		$this->db->update('perusahaan', $data);  
	}

	/*================================================== MODULES data Customer ================================================*/

	//SELECT * FROM TABLES
	function tb_customer()
	{
		$this->db->select('*')
				 ->from('customer')
				 ->order_by('customer_id','desc');
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_customer($data)
	{
		$this->db->insert('customer', $data);
	}	

	function customer_id($customer_id)
	{
		$this->db->select('*')
				 ->from('customer')
				 ->where('customer_id', $customer_id);
		return $this->db->get();
	}

	function update_customer($customer_id, $data)
	{
		$this->db->where(array('customer_id' => $customer_id));
		$this->db->update('customer', $data);  
	}

	function delete_customer($customer_id)
	{ 
		$this->db->delete('customer', array(
							'customer_id' => $customer_id
						));    
	}
}
?>
    