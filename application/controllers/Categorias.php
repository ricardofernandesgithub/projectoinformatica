<?php

class Categorias extends CI_Controller {

    public function index() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Categorias";

        $data['categorias'] = $this->categoria_model->obter_categorias();

        $this->load->view('templates/header2');
        $this->load->view('categorias/index', $data);
        $this->load->view('templates/footer');
    }

    public function criar() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Criar categoria";

        $this->form_validation->set_rules('Nome_Categoria', 'Nome Categoria', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header2');
            $this->load->view('categorias/criar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->categoria_model->criar_categoria();

            $this->session->set_flashdata('categoria_criada', 'Categoria criada.');
            redirect('categorias');
        }
    }

    public function dispositivos($ID_Categoria) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = $this->categoria_model->obter_categoria($ID_Categoria)->Nome_Categoria;

        $data['dispositivos'] = $this->dispositivo_model->obter_dispositivos_por_categoria($ID_Categoria);

        $this->load->view('templates/header2');
        $this->load->view('categorias/dispositivos', $data);
        $this->load->view('templates/footer');
    }

    public function actualizar($ID_Categoria) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = 'Actualizar Categoria';

        $registo = $this->categoria_model->obter_categoria($ID_Categoria);
        print_r($registo);

        $this->load->view('templates/header2');
        $this->load->view('categorias/actualizar', $data);
        $this->load->view('templates/footer');
    }

    /* public function teste(){
      $this->load->view('templates/header2');
      } */
}
