<?php
 class tokosepatu extends CI_Controller
 {
    public function index()
    {
        $this->load->view('view-form-tokosepatu');
    }

    public function cetak()
    {
        $this->form_validation->set_rules(
            'nama',
            'nama',
            'required|min_length[3]',
            [
                'required' => 'Harap isi Nama',
                'min_length' => 'Nama terlalu pendek'
            ]
        
        );
        
        $this->form_validation->set_rules(
            'no',
            'no hp',
            'required|min_length[11]',
            [
                'required' => 'Harap isi Nomor HP',
                'min_length' => 'No HP terlalu pendek'
            ]
        
        );

        if ($this->form_validation->run() != true) {
            $this->load->view('view-form-tokosepatu');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'no' => $this->input->post('no'),
                'merk' => $this->input->post('merk'),
                'size' => $this->input->post('size'),
                'harga' => $this->input->post('harga'),
            ];

            if ($this->input->post('merk') == 'NIKE') {
                $data['harga'] = 375000;
            } elseif ($this->input->post('merk') == 'ADIDAS') {
                $data['harga'] = 300000;
            } elseif ($this->input->post('merk') == 'KICKERS') {
                $data['harga'] = 250000;
            } elseif ($this->input->post('merk') == 'EIGER') {
                $data['harga'] = 275000;
            } elseif ($this->input->post('merk') == 'BUCHERRI') {
                $data['harga'] = 400000;
            }

            $this->load->view('view-data-tokosepatu' , $data);
        }
    }
}
