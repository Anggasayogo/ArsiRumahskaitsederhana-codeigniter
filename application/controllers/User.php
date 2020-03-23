<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		if(!$this->session->userdata('username')){
			redirect('Auth');
		}
	}

	public function index()
	{
		$this->template->load('template','user/index');
	}

	public function datatable_user()
    {
        $list = $this->User_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->email;
          
            $row[] = '
            <a class="fa fa-trash btn btn-danger btn-sm" onclick="return confirm("Apakah Anda Yakin Ingin Menghapus Data!")" href="'.base_url('User/').'act_hapus/'.$field->id.'"></a>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->User_model->count_all(),
            "recordsFiltered" => $this->User_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function v_tambah()
    {
    	$this->form_validation->set_rules('username','Username','required');
    	$this->form_validation->set_rules('email','Email','required');
    	$this->form_validation->set_rules('password','Password','required');
    	$this->form_validation->set_rules('password_conf','Password_conf','required|matches[password]');

    	if($this->form_validation->run() == false){
    	    $this->template->load('template','user/tambah');
        }else{
           $data = [
           	'username' => $this->input->post('username'),
           	'email' => $this->input->post('email'),
           	'password' => $this->input->post('password')

           ];

           $this->User_model->tmbahUsers($data);
        }
    }

    public function act_hapus($id)
    {
    	$this->db->delete('admin',['id' => $id]);
    	$this->session->set_flashdata('message','Data Berhasil Dihapus');
    	redirect('User');
    }


}