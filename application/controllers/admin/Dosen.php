<?php
defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * summary
 */
class Dosen extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dosen','mdldosen');
    }

    public function index()
    {
    	$data['dosen'] = $this->mdldosen->dataDosen();
        $data['jurusan'] = $this->mdldosen->getJurusan();
    	$this->load->view('admin/Dosen', $data);
    }

    public function Tambah()
    {
    	$data['jurusan'] = $this->mdldosen->getJurusan();
    	$this->load->view('admin/TambahDosen', $data);
    }

    public function edit_dosen()
    {
        $data = $this->mdldosen->edit_dosen();
        echo json_encode($data);
    }

    public function tambahDosen()
    {
    	$config['upload_path'] = './uploads/';
    	$config['allowed_types'] = 'jpg|png|jpeg';
    	$config['max_size']='500';
    	$config['max_width']='2000';
    	$config['max_height'] = '2000';
    	$this->load->library('upload',$config);

    	if (!$this->upload->do_upload()) {
    		redirect('admin/Dosen/Tambah');
    	}else{
    		$image = $this->upload->data();
    		$newDosen = array(
    			'nip' =>$this->input->post('nip'),
    			'nama'=>$this->input->post('namaLengkap'),
    			'pangkat' =>$this->input->post('pangkat'),
    			'golongan'=>$this->input->post('golongan'),
    			'jabatan'=>$this->input->post('jabatan'),
    			'unit'=>$this->input->post('unitKerja'),
    			'id_jur'=>$this->input->post('jurusan'),
    			'foto'=>$image['file_name'],
    			'username'=>'demo',
    			'password' =>'demo',
    			'level'=>'1',
                'id_bidang'=>'1',
                'created_at' =>date('Y-m-d H:i:s'),
                'created_by'=>'1'
            );

    		$this->mdldosen->tambahDosen($newDosen);
    		redirect('admin/Dosen');
    	}
    }

    public function update_dosen()
    {
        $response['success'] = false;

        $params = $this->input->post();

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']='500';
        $config['max_width']='2000';
        $config['max_height'] = '2000';
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload()) {
            redirect('admin/Dosen');
        }else{
            $image = $this->upload->data();
            $newDosen = array(
                'nip' =>$this->input->post('nip'),
                'nama'=>$this->input->post('namaLengkap'),
                'pangkat' =>$this->input->post('pangkat'),
                'golongan'=>$this->input->post('golongan'),
                'jabatan'=>$this->input->post('jabatan'),
                'unit'=>$this->input->post('unitKerja'),
                'id_jur'=>$this->input->post('jurusan'),
                'foto'=>$image['file_name'],
                'username'=>'demo',
                'password' =>'demo',
                'level'=>'1',
                'id_bidang'=>'1',
                'created_at' =>date('Y-m-d H:i:s'),
                'created_by'=>'1'
            );

            $result = $this->mdldosen->updatedatadosen($params['id_dosen'],$newDosen);
            if ($result) {
                $response['success'] = true;
            }

            echo json_encode($response);

    }
}

    public function hapus_dosen()
    {
        $response['success'] = false;
        $kode = $this->input->post('kode');

        $data['is_delete'] = '1';

        $result = $this->mdldosen->updatedatadosen($kode, $data);
        if ($result) {
            $response['success'] = true;
        }
        echo json_encode($response);
    }
}
 ?>