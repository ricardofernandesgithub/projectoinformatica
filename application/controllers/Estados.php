<?php

class Estados extends CI_Controller {

    public function index() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Estados";

        $data['estados'] = $this->estado_model->obter_estados();

        $this->load->view('templates/header2');
        $this->load->view('estados/index', $data);
        $this->load->view('templates/footer');
    }

    public function criar() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Criar Estado";

        $this->form_validation->set_rules('Nome_Estado', 'Nome Estado', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header2');
            $this->load->view('estados/criar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->estado_model->criar_estado();

            $this->session->set_flashdata('estado_criado', 'Estado criado.');
            redirect('estados');
        }
    }

    public function dispositivos($ID_Estado) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = $this->estado_model->obter_estado($ID_Estado)->Nome_Estado;

        $data['dispositivos'] = $this->dispositivo_model->obter_dispositivos_por_estado($ID_Estado);

        $this->load->view('templates/header2');
        $this->load->view('estados/dispositivos', $data);
        $this->load->view('templates/footer');
    }

    public function actualizar($ID_Estado) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = 'Actualizar Estado';

        $registo = $this->estado_model->obter_estado($ID_Estado);
        print_r($registo);

        $this->load->view('templates/header2');
        $this->load->view('estados/actualizar', $data);
        $this->load->view('templates/footer');
    }

    /* public function teste(){
      $this->load->view('templates/header2');
      } */
}
