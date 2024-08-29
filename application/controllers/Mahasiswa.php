<?php 

class Mahasiswa extends CI_Controller {
	public function index() {
		$data['mahasiswa'] = $this->model_mahasiswa->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi() {
		/*
		$data = [
            'nama'       	=> $this->input->post('nama'),
            'nim'          	=> $this->input->post('nim'),
            'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
            'jurusan'    	=> $this->input->post('jurusan'),
        ];
		*/

		$nama 			= $this->input->post('nama');
		$nim 			= $this->input->post('nim');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jurusan 		= $this->input->post('jurusan');
		$alamat 		= $this->input->post('alamat');
		$email 			= $this->input->post('email');
		$no_telp 		= $this->input->post('no_telp');
		$foto 			= $_FILES['foto'];
		if ($foto=''){}else{
			$config['upload_path'] 		= './assets/foto';
			$config['allowed_types'] 	= 'jpg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal"; die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		$data = array(
			'nama' 			=> $nama,
			'nim' 			=> $nim,
			'tanggal_lahir'	=> $tanggal_lahir,
			'jurusan' 		=> $jurusan,
			'alamat' 		=> $alamat,
			'email' 		=> $email,
			'no_telp' 		=> $no_telp,
			'foto'			=> $foto,
		);

		$this->model_mahasiswa->input_data($data, 'tb_mahasiswa');
		$this->session->set_flashdata('message','		<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Data Berhasil Ditambahkan!
		</div>');

		redirect('mahasiswa/index');
	}

	public function hapus($id) {
		$where = array('id' => $id);
		$this->model_mahasiswa->hapus_data($where, 'tb_mahasiswa');
		$this->session->set_flashdata('message','		<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Data Berhasil Dihapus!
		</div>');
		redirect('mahasiswa/index');
	}

	public function edit($id) {
		$where = array('id' => $id);
		$data['mahasiswa'] = $this->model_mahasiswa->edit_data($where, 'tb_mahasiswa')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$id 			= $this->input->post('id');
		$nama 			= $this->input->post('nama');
		$nim 			= $this->input->post('nim');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jurusan 		= $this->input->post('jurusan');
		$alamat 		= $this->input->post('alamat');
		$email 			= $this->input->post('email');
		$no_telp 		= $this->input->post('no_telp');

		$data = array(
			'nama' 			=> $nama,
			'nim' 			=> $nim,
			'tanggal_lahir'	=> $tanggal_lahir,
			'jurusan' 		=> $jurusan,
			'alamat' 		=> $alamat,
			'email' 		=> $email,
			'no_telp' 		=> $no_telp,
		);

		$where = array(
			'id' => $id
		);

		$this->model_mahasiswa->update_data($where, $data, 'tb_mahasiswa');
		$this->session->set_flashdata('message','		<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Data Berhasil Diupdate!
		</div>');
		redirect('mahasiswa/index');
	}

	public function detail($id) {
		$this->load->model('model_mahasiswa');
		$detail = $this->model_mahasiswa->detail_data($id);
		$data['detail'] = $detail;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('templates/footer');
	}

	public function print() {
		$data['mahasiswa'] = $this->model_mahasiswa->tampil_data('tb_mahasiswa')->result();
		$this->load->view('print_mahasiswa', $data);
	}

	public function pdf(){
		$this->load->library('dompdf_gen');

		$data['mahasiswa'] = $this->model_mahasiswa->tampil_data('tb_mahasiswa')->result();

		$this->load->view('laporan_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_mahasiswa.pdf", array('Attachment' =>0));
	}

	public function excel(){
		$data['mahasiswa'] = $this->model_mahasiswa->tampil_data('tb_mahasiswa')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Wilfredo Alexander Sutanto");
		$object->getProperties()->setLastModifiedBy("Wilfredo Alexander Sutanto");
		$object->getProperties()->setTitle("Daftar Mahasiswa");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'NAMA MAHASISWA');
		$object->getActiveSheet()->setCellValue('C1', 'NIM');
		$object->getActiveSheet()->setCellValue('D1', 'TANGGAL LAHIR');
		$object->getActiveSheet()->setCellValue('E1', 'JURUSAN');
		$object->getActiveSheet()->setCellValue('F1', 'ALAMAT');
		$object->getActiveSheet()->setCellValue('G1', 'EMAIL');
		$object->getActiveSheet()->setCellValue('H1', 'NO. TELEPON');

		$baris = 2;
		$no = 1;

		foreach($data['mahasiswa'] as $mahasiswa) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $mahasiswa->nama);
			$object->getActiveSheet()->setCellValue('C'.$baris, $mahasiswa->nim);
			$object->getActiveSheet()->setCellValue('D'.$baris, $mahasiswa->tanggal_lahir);
			$object->getActiveSheet()->setCellValue('E'.$baris, $mahasiswa->jurusan);
			$object->getActiveSheet()->setCellValue('F'.$baris, $mahasiswa->alamat);
			$object->getActiveSheet()->setCellValue('G'.$baris, $mahasiswa->email);
			$object->getActiveSheet()->setCellValue('H'.$baris, $mahasiswa->no_telp);

			$baris++;
		}

		$filename="Data_Mahasiswa".'xlsx';

		$object->getActiveSheet->setTitle("Data Mahasiswa");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$data['mahasiswa']=$this->model_mahasiswa->get_keyword($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('templates/footer');
	}
}

?>