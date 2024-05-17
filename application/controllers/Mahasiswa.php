<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function index()
    {
        $this->load->view('input_data');
    }

    public function tampilkan_data()
    {

        $this->load->library('form_validation');


        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi.'
        ]);
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric', [
            'required' => 'NPM harus diisi.',
            'numeric' => 'NPM hanya boleh berisi angka.'
        ]);
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|exact_length[4]|numeric', [
            'required' => 'Angkatan harus diisi.',
            'exact_length' => 'Angkatan harus berupa tahun (4 angka).',
            'numeric' => 'Angkatan hanya boleh berisi angka.'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|exact_length[1]|alpha|regex_match[/^[A-Z]$/]', [
            'required' => 'Kelas harus diisi.',
            'exact_length' => 'Kelas harus berupa 1 huruf.',
            'alpha' => 'Kelas hanya boleh berisi huruf.',
            'regex_match' => 'Kelas harus berupa huruf besar.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[20]', [
            'required' => 'Alamat harus diisi.',
            'min_length' => 'Alamat harus memiliki minimal 20 karakter.'
        ]);
        $this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah Favorit', 'required', [
            'required' => 'Mata Kuliah Favorit harus diisi.'
        ]);


        if ($this->form_validation->run() == false) {

            $this->load->view('input_data');
        } else {

            $data['nama'] = $this->input->post('nama');
            $data['npm'] = $this->input->post('npm');
            $data['angkatan'] = $this->input->post('angkatan');
            $data['kelas'] = $this->input->post('kelas');
            $data['alamat'] = $this->input->post('alamat');
            $data['mata_kuliah'] = $this->input->post('mata_kuliah');

            $this->load->view('hasil_data', $data);
        }
    }
}
