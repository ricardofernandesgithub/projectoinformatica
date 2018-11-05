<?php
    class Edificio_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function obter_edificios(){
			$this->db->order_by('Nome_Edificio');
			$query = $this->db->get('edificios');
			return $query->result_array();
        }
        

        public function obter_edificio($ID_Edificio){
            $query = $this->db->get_where('edificios', array('ID_Edificio' => $ID_Edificio));
            //if($query->num_rows()>0){
            return $query->row();
            //}
        }

    }