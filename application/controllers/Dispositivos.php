<?php

class Dispositivos extends CI_Controller {

    // Método que permite mostrar a lista de dispositivos
    public function index() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Lista de Dispositivos";

        $data['dispositivos'] = $this->dispositivo_model->obter_lista_dispositivos();
        //print_r($data['dispositivos']);

        $this->load->view('templates/header2');
        $this->load->view('dispositivos/index', $data);
        $this->load->view('templates/footer');
    }

    // Método que permite ver todos os atributos de um dispositivo
    public function ver($URL_Slug = NULL) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['dispositivo'] = $this->dispositivo_model->obter_lista_dispositivos($URL_Slug);

        $data['titulo'] = $data['dispositivo']['Nome_Dispositivo'];
        $data['categorias'] = $this->dispositivo_model->obter_categorias();
        $data['estados'] = $this->dispositivo_model->obter_estados();
        $data['edificios'] = $this->dispositivo_model->obter_edificios();

        if (empty($data['dispositivo'])) { // não existe dispositivo
            show_404();
        }

        $this->load->view('templates/header2');
        $this->load->view('dispositivos/ver', $data);
        $this->load->view('templates/footer');
    }

    // Método que permite adicionar um novo dispositvo
    public function criar() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Adicionar dispositivo";

        $data['categorias'] = $this->dispositivo_model->obter_categorias();
        $data['estados'] = $this->dispositivo_model->obter_estados();
        $data['edificios'] = $this->dispositivo_model->obter_edificios();

        $this->form_validation->set_rules('Nome_Dispositivo', 'Nome Dispostivo', 'required|callback_verificar_se_nome_dispositivo_existe');
        $this->form_validation->set_rules('Numero_Serie', 'Número Série', 'required|callback_verificar_se_numero_serie_existe');
        $this->form_validation->set_rules('Endereco_MAC', 'Endereço MAC', 'regex_match[/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/]');
        $this->form_validation->set_rules('Endereco_IP', 'Endereco IP', 'valid_ip');

        if ($this->form_validation->run() === FALSE) { // se houver campos inválidos no formulário
            $this->load->view('templates/header2');
            $this->load->view('dispositivos/criar', $data);
            $this->load->view('templates/footer');
        } else {
            // Carregar a fotografia
            $config['upload_path'] = './assets/fotografias';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2048';
            $config['max_height'] = '2048';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $fotografia = 'sem_foto.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $fotografia = $_FILES['userfile']['name'];
            }

            $this->dispositivo_model->criar_dispositivo($fotografia);

            $this->session->set_flashdata('dispositivo_adicionado', 'Dispositivo adicionado.');
            redirect('dispositivos');
        }
    }

    // Método que permite abrir formulário para alterar um dispositivo
    public function alterar($URL_Slug) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['dispositivo'] = $this->dispositivo_model->obter_lista_dispositivos($URL_Slug);
        $data['titulo'] = 'Alterar dispositivo';
        $data['categorias'] = $this->dispositivo_model->obter_categorias();
        $data['estados'] = $this->dispositivo_model->obter_estados();
        $data['edificios'] = $this->dispositivo_model->obter_edificios();

        if (empty($data['dispositivo'])) { // não existe dispositivo
            show_404();
        }

        $this->load->view('templates/header2');
        $this->load->view('dispositivos/alterar', $data);
        $this->load->view('templates/footer');
    }

    // Método actualizar permite alterar um dispositivo. Está relacionado com o método alterar()
    public function actualizar() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        //echo "Alterações submetidas";
        $this->dispositivo_model->actualizar_dispositivo();

        $this->session->set_flashdata('dispositivo_alterado', 'Dispositivo alterado.');
        redirect('dispositivos');
    }

    // Método que permite remover um dispositivo
    public function remover($ID_Dispositivo) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        //echo $ID_Dispositivo;
        $this->dispositivo_model->remover_dispositivo($ID_Dispositivo);
        redirect('dispositivos');
    }

    public function confirmar($ID_Dispositivo) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $this->dispositivo_model->inserir_coordenadas($ID_Dispositivo);

        redirect('/dispositivos/' . $_COOKIE['slug_cookie']);
    }

    public function remover_localizacao($ID_Dispositivo) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $this->dispositivo_model->remover_localizacao($ID_Dispositivo);
    }

    public function ver_dispositivos_no_mapa($segmento) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Lista de Dispositivos";
        $data['segmento'] = $segmento;
        //echo $segmento;

        $data['dispositivos'] = $this->dispositivo_model->obter_lista_dispositivos();
        //print_r($data['dispositivos']);

        $this->load->view('templates/header2');
        $this->load->view('dispositivos/' . $segmento . '_loc', $data);
        $this->load->view('templates/footer');
    }

    public function ver_dispositivo_no_mapa($URL_Slug) {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = "Localização do Dispositivo";

        $data['dispositivos'] = $this->dispositivo_model->obter_lista_dispositivos();
        //print_r($data['dispositivos']);

        $this->load->view('templates/header2');
        $this->load->view('dispositivos/nave1_loc_simples', $data);
        $this->load->view('templates/footer');
    }

    public function pesquisar() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $termo_pesquisa = $this->input->post('Termo_Pesquisa');

        $data['titulo'] = "Resultados da Pesquisa por: " . $termo_pesquisa;

        $data['resultados'] = $this->dispositivo_model->resultados_pesquisa($termo_pesquisa);

        $this->load->view('templates/header2');
        $this->load->view('dispositivos/pesquisa', $data);
        $this->load->view('templates/footer');
    }

    public function verificar_se_numero_serie_existe($Numero_Serie) {
        $this->form_validation->set_message('verificar_se_numero_serie_existe', 'Esse Número de Série já está registado.');
        if ($this->dispositivo_model->verificar_se_numero_serie_existe($Numero_Serie)) {
            return true;
        } else {
            return false;
        }
    }

    public function verificar_se_nome_dispositivo_existe($Nome_Dispositivo) {
        $this->form_validation->set_message('verificar_se_nome_dispositivo_existe', 'Esse Nome de Dispositivo já está registado.');
        if ($this->dispositivo_model->verificar_se_nome_dispositivo_existe($Nome_Dispositivo)) {
            return true;
        } else {
            return false;
        }
    }

}
