<?php

class Edificios extends CI_Controller {

    public function index() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Edifícios";

        $data['edificios'] = $this->edificio_model->obter_edificios();

        $this->load->view('templates/header2');
        $this->load->view('edificios/index', $data);
        $this->load->view('templates/footer');
    }

    public function dispositivos($ID_Edificio) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = $this->edificio_model->obter_edificio($ID_Edificio)->Nome_Edificio;

        $data['dispositivos'] = $this->dispositivo_model->obter_dispositivos_por_edificio($ID_Edificio);

        $this->load->view('templates/header2');
        $this->load->view('edificios/dispositivos', $data);
        $this->load->view('templates/footer');
    }

}
