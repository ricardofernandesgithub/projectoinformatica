<?php

class Categoria_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // método para obter todas as categorias
    public function obter_categorias() {
        $this->db->order_by('Nome_Categoria');
        $query = $this->db->get('categorias');
        return $query->result_array();
    }

    // método para obter uma categoria
    public function obter_categoria($ID_Categoria) {
        $query = $this->db->get_where('categorias', array('ID_Categoria' => $ID_Categoria));
        //if($query->num_rows()>0){
        return $query->row();
        //}
    }

    public function criar_categoria() {
        $data = array(
            'Nome_Categoria' => $this->input->post('Nome_Categoria')
        );

        return $this->db->insert('categorias', $data);
    }

    public function actualizar_categoria() {
        /* $data = array(
          'Nome_Categoria' => $this->input->post('Nome_Categoria'),
          'ID_Categoria' => $this->input->post('ID_Categoria')
          );

          $this->db->where('ID_Categoria', $this->input->post('ID_Categoria'));
          return $this->db->update('categorias', $data); */
    }

}
