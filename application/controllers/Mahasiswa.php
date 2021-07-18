<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa_model', 'mahasiswa');
    $this->load->library('form_validation');
  }

  public function get_prodi()
  {
    /* bukan 'id_jurusan' tetapi 'row'.
    *  Lihat fungsi getProdi di views/mahasiswa/add.php.
    */
		$id_jurusan = $this->input->post('row');
		$prodi = $this->mahasiswa->get_prodi($id_jurusan);

		echo '<select name="">';
    echo '<option value="">Pilih Prodi</option>';
		foreach ($prodi as $row)
		{
    	echo '<option value="'.$row->id.'">'.$row->nama_prodi.'</option>';
		}
		echo '</select>';
  }

  public function index()
  {
    $data = array('mahasiswa' => $this->mahasiswa->get_all());
    $this->load->view('mahasiswa/list', $data);
  }

  public function create()
  {
    $data = array('dd_jurusan' => $this->mahasiswa->get_jurusan());
    $this->load->view('mahasiswa/add', $data);
  }

  public function store()
  {
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
                    'nama' => $this->input->post('nama'),
                    'id_jurusan' => $this->input->post('id_jurusan'),
                    'id_prodi' => $this->input->post('id_prodi')
      );
      $this->mahasiswa->insert($data);
      $this->session->set_flashdata('message', 'Mahasiswa berhasil ditambah.');
      redirect('mahasiswa');
    }
  }

  public function edit($id)
  {
    $row = $this->mahasiswa->get_by_id($id);
    if ($row) {
      $data = array(
                    'id' => set_value('id', $row->id),
                    'nama' => set_value('nama', $row->nama),
                    'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
                    'dd_jurusan' => $this->mahasiswa->get_jurusan(),
                    'id_prodi' => set_value('id_prodi', $row->id_prodi),
                    'dd_prodi' => $this->mahasiswa->get_prodi($row->id_jurusan)
      );
    } else {
      $this->session->set_flashdata('message','Mahasiswa tidak ada');
      redirect('mahasiswa','refresh');
    }
    $this->load->view('mahasiswa/edit', $data);
  }

  public function update($id)
  {
    $this->rules();
    if ($this->form_validation->run() == FALSE) {
      $this->edit($id);
    } else {
      $id = $this->input->post('id');
      $data = array(
                  'nama' => $this->input->post('nama'),
                  'id_jurusan' => $this->input->post('id_jurusan'),
                  'id_prodi' => $this->input->post('id_prodi')
      );
      $this->mahasiswa->update($id, $data);
      $this->session->set_flashdata('message', 'Mahasiswa berhasil diubah.');
      redirect(site_url('mahasiswa'));
    }
  }

  public function delete($id)
  {
    $row = $this->mahasiswa->get_by_id($id);

    if ($row) {
      $this->mahasiswa->delete($id);
      $this->session->set_flashdata('message', 'Mahasiswa berhasil dihapus.');
      redirect(site_url('mahasiswa'));
    } else {
      $this->session->set_flashdata('message', 'Data tidak ditemukan.');
      redirect(site_url('mahasiswa'));
    }
  }

  public function rules()
  {
    $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required');
    $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
    $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-warning">', '</span>');
  }

}
