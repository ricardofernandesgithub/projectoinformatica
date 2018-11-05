<?php

class Estado_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // método para obter todos os estados
    public function obter_estados() {
        $this->db->order_by('Nome_Estado');
        $query = $this->db->get('estados');
        return $query->result_array();
    }

    // método para obter um estado
    public function obter_estado($ID_Estado) {
        $query = $this->db->get_where('estados', array('ID_Estado' => $ID_Estado));
        //if($query->num_rows()>0){
        return $query->row();
        //}
    }

    public function criar_estado() {
        $data = array(
            'Nome_Estado' => $this->input->post('Nome_Estado')
        );

        return $this->db->insert('estados', $data);
    }

    public function actualizar_estado() {
        /* $data = array(
          'Nome_Categoria' => $this->input->post('Nome_Categoria'),
          'ID_Categoria' => $this->input->post('ID_Categoria')
          );

          $this->db->where('ID_Categoria', $this->input->post('ID_Categoria'));
          return $this->db->update('categorias', $data); */
    }

}
