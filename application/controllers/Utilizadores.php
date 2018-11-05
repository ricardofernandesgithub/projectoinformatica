<?php

class Utilizadores extends CI_Controller {

    public function registar() {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        $data['titulo'] = 'Registar Utilizador';

        $this->form_validation->set_rules('Nome', 'Nome', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required|callback_verificar_se_username_existe');
        $this->form_validation->set_rules('Email', 'Email', 'required|callback_verificar_se_email_existe');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('Password2', 'Confirmar Password', 'matches[Password]');

        if ($this->form_validation->run() === FALSE) { // se houver erros
            $this->load->view('templates/header2');
            $this->load->view('utilizadores/registar', $data);
            $this->load->view('templates/footer');
        } else {
            $hash = password_hash($this->input->post('Password'), PASSWORD_DEFAULT); // usa o algoritmo bcrypt
            //$hash = md5($this->input->post('Password')); // Extremamente inseguro!

            $this->utilizador_model->registar($hash);

            $this->session->set_flashdata('utilizador_registado', 'Utilizador registado.');

            redirect('/dispositivos');
        }
    }

    public function login() {
        $data['titulo'] = 'Aceder à Aplicação';

        $this->form_validation->set_rules('Username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header2');
            $this->load->view('utilizadores/login', $data);
            $this->load->view('templates/footer');
        } else {

            // Obter Username
            $username = $this->input->post('Username');
            // Obter Password
            $password = $this->input->post('Password');

            // Login do Utilizador
            $ID_Utilizador = $this->utilizador_model->login($username, $password);

            if ($ID_Utilizador) {
                $dados_utilizador = array(
                    "ID_Utilizador" => $ID_Utilizador['ID_Utilizador'],
                    "Username" => $username,
                    "Tipo" => $ID_Utilizador['Tipo'],
                    "dentro" => true // tem sessão activa
                );
                
                $this->session->set_userdata($dados_utilizador);

                $this->session->set_flashdata('utilizador_efectuou_login', 'Tem agora acesso à aplicação.');
                redirect('/');
            } else {
                $this->session->set_flashdata('login_falhou', 'Login inválido.');
                redirect('utilizadores/login');
            }
        }
    }

    public function logout() {
        // 'remover dados do utilizador'
        $this->session->unset_userdata('dentro');
        $this->session->unset_userdata('ID_Utilizador');
        $this->session->unset_userdata('Username');

        $this->session->set_flashdata('utilizador_efectuou_logout', 'Terminou a sessão.');

        redirect('utilizadores/login');
    }

    public function verificar_se_username_existe($username) {
        $this->form_validation->set_message('verificar_se_username_existe', 'Esse Username já está a ser utilizado. Escolher outro sff.');
        if ($this->utilizador_model->verificar_se_username_existe($username)) {
            return true;
        } else {
            return false;
        }
    }

    public function verificar_se_email_existe($email) {
        $this->form_validation->set_message('verificar_se_email_existe', 'Esse Email já está a ser utilizado. Escolher outro sff.');
        if ($this->utilizador_model->verificar_se_email_existe($email)) {
            return true;
        } else {
            return false;
        }
    }

}
