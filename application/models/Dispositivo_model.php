<?php

class Dispositivo_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function obter_lista_dispositivos($URL_Slug = FALSE) {
        if ($URL_Slug === FALSE) { // ?
            $this->db->join('categorias', 'categorias.ID_Categoria = dispositivos.ID_Categoria');
            $this->db->join('estados', 'estados.ID_Estado = dispositivos.ID_Estado');
            $this->db->join('edificios', 'edificios.ID_Edificio = dispositivos.ID_Edificio');
            $query = $this->db->get('dispositivos'); // obtém todos os registos da tabela 'dispositivos'
            return $query->result_array();
        }

        $query = $this->db->get_where('dispositivos', array('URL_Slug' => $URL_Slug)); // ?
        return $query->row_array(); // ?
    }

    public function criar_dispositivo($fotografia) {
        $URL_Slug = url_title($this->input->post('Numero_Serie')); // rever

        $data = array(
            'Nome_Dispositivo' => $this->input->post('Nome_Dispositivo'),
            'Modelo' => $this->input->post('Modelo'),
            'Endereco_IP' => $this->input->post('Endereco_IP'),
            'Endereco_MAC' => $this->input->post('Endereco_MAC'),
            'Numero_Serie' => $this->input->post('Numero_Serie'),
            'Localizacao' => $this->input->post('Localizacao'),
            'Codigo_Imobilizado' => $this->input->post('Codigo_Imobilizado'),
            'Comentario' => $this->input->post('Comentario'),
            'ID_Categoria' => $this->input->post('ID_Categoria'),
            'ID_Estado' => $this->input->post('ID_Estado'),
            'ID_Edificio' => $this->input->post('ID_Edificio'),
            'URL_Slug' => $URL_Slug,
            'Fotografia' => $fotografia
        );

        $dados_limpos = $this->security->xss_clean($data);
        return $this->db->insert('dispositivos', $dados_limpos);
    }

    public function inserir_coordenadas($ID_Dispositivo) {
        $sql = "UPDATE dispositivos SET Coordenada_X = " . $_COOKIE['cookie_x'] . ", Coordenada_Y = " . $_COOKIE['cookie_y'] . ", Localizacao_Mapa = 1 WHERE ID_Dispositivo = " . $ID_Dispositivo;
        $this->db->query($sql);
    }

    public function remover_localizacao($ID_Dispositivo) {
        $sql = "UPDATE dispositivos SET Localizacao_Mapa = 0" . " WHERE ID_Dispositivo = " . $ID_Dispositivo;
        $this->db->query($sql);
    }

    public function actualizar_dispositivo() {
        $URL_Slug = url_title($this->input->post('Numero_Serie'));

        $data = array(
            'Nome_Dispositivo' => $this->input->post('Nome_Dispositivo'),
            'Modelo' => $this->input->post('Modelo'),
            'Endereco_IP' => $this->input->post('Endereco_IP'),
            'Endereco_MAC' => $this->input->post('Endereco_MAC'),
            'Numero_Serie' => $this->input->post('Numero_Serie'),
            'Localizacao' => $this->input->post('Localizacao'),
            'Codigo_Imobilizado' => $this->input->post('Codigo_Imobilizado'),
            'Comentario' => $this->input->post('Comentario'),
            'ID_Categoria' => $this->input->post('ID_Categoria'),
            'ID_Estado' => $this->input->post('ID_Estado'),
            'ID_Edificio' => $this->input->post('ID_Edificio'),
            'Localizacao_Mapa' => $this->input->post('Localizacao_Mapa'),
            'URL_Slug' => $URL_Slug,
            'Fotografia' => $fotografia
        );

        $this->db->where('ID_Dispositivo', $this->input->post('ID_Dispositivo'));
        //print_r($data);
        return $this->db->update('dispositivos', $data);
    }

    public function remover_dispositivo($ID_Dispositvo) {
        $this->db->where('ID_Dispositivo', $ID_Dispositvo);
        $this->db->delete('dispositivos');
        return true;
    }

    // apagar
    public function obter_categorias() {
        $this->db->order_by('Nome_Categoria');
        $query = $this->db->get('categorias');
        return $query->result_array();
    }

    // apagar
    public function obter_categoria($ID_Categoria) {
        $query = $this->db->get_where('categorias', array('ID_Categoria' => $ID_Categoria));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function obter_dispositivos_por_categoria($ID_Categoria) {
        $this->db->order_by('dispositivos.ID_Dispositivo', 'DESC');
        $this->db->join('categorias', 'categorias.ID_Categoria = dispositivos.ID_Categoria');
        $query = $this->db->get_where('dispositivos', array('dispositivos.ID_Categoria' => $ID_Categoria));
        return $query->result_array();
    }

    public function obter_estados() {
        $this->db->order_by('Nome_Estado');
        $query = $this->db->get('estados');
        return $query->result_array();
    }

    public function obter_estado($ID_Estado) {
        $query = $this->db->get_where('estados', array('ID_Estado' => $ID_Estado));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function obter_dispositivos_por_estado($ID_Estado) {
        $this->db->order_by('dispositivos.ID_Dispositivo', 'DESC');
        $this->db->join('estados', 'estados.ID_Estado = dispositivos.ID_Estado');
        $query = $this->db->get_where('dispositivos', array('dispositivos.ID_Estado' => $ID_Estado));
        return $query->result_array();
    }

    public function obter_edificios() {
        $this->db->order_by('Nome_Edificio');
        $query = $this->db->get('edificios');
        return $query->result_array();
    }

    public function obter_edificio($ID_Edificio) {
        $query = $this->db->get_where('estados', array('ID_Estado' => $ID_Edificio));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function obter_dispositivos_por_edificio($ID_Edificio) {
        $this->db->order_by('dispositivos.ID_Dispositivo', 'DESC');
        $this->db->join('edificios', 'edificios.ID_Edificio = dispositivos.ID_Edificio');
        $query = $this->db->get_where('dispositivos', array('dispositivos.ID_Edificio' => $ID_Edificio));
        return $query->result_array();
    }

    public function resultados_pesquisa($termo_pesquisa) {
        $sql = "SELECT * FROM dispositivos WHERE CONCAT(Nome_Dispositivo, '', Modelo, '', Localizacao, '',  Endereco_IP, '') LIKE " . "'%" . $termo_pesquisa . "%'";
        $query = $this->db->query($sql);
        //echo $sql;
        return $query->result_array();
    }

    public function verificar_se_numero_serie_existe($Numero_Serie) {
        $query = $this->db->get_where('dispositivos', array('Numero_Serie' => $Numero_Serie));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function verificar_se_nome_dispositivo_existe($Nome_Dispositivo) {
        $query = $this->db->get_where('dispositivos', array('Nome_Dispositivo' => $Nome_Dispositivo));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

}
