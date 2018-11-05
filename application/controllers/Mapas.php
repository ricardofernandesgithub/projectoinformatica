<?php

class Mapas extends CI_Controller {

    public function view($pagina = 'mapa_geral') {
        // Verificar se sessão foi iniciada
        if (!$this->session->userdata('dentro')) {
            redirect('utilizadores/login');
        }

        if (!file_exists(APPPATH . 'views/mapas/' . $pagina . '.php')) {
            //show_404();
            echo 'Oops!';
        }

        $data['titulo'] = ucfirst($pagina);

        $this->load->view('templates/header2');
        $this->load->view('mapas/' . $pagina, $data);
        $this->load->view('templates/footer');
    }

}
