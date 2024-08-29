<?php

class Mahasiswalama extends CI_Controller {
	public function index () {
		$this->load->model('model_mahasiswa');
		$data['mahasiswa'] = $this->model_mahasiswa->get_data();

		$this->load->view('view_mahasiswa', $data);
	}
}

?>