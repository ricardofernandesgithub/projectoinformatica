<?php

class Utilizador_model extends CI_Model {

    public function registar($hash) {
        $data = array(
            'Nome' => $this->input->post('Nome'),
            'Email' => $this->input->post('Email'),
            'Username' => $this->input->post('Username'),
            'Password' => $hash,
            'Tipo' => $this->input->post('Tipo')
        );

        return $this->db->insert('utilizadores', $data);
    }

    public function login($username, $password) {
        // validar
        //$this->db->where('Username', $username);
        //$this->db->where('Password', $password);

        $resultado = $this->db->get_where('utilizadores', array('Username' => $username));

        if ($resultado->num_rows() == 1) {
            $data['ID_Utilizador'] = $resultado->row(0)->ID_Utilizador;
            $data['Hash'] = $resultado->row(0)->Password;
            $data['Tipo'] = $resultado->row(0)->Tipo;
            if (password_verify($password, $data['Hash'])) {
                //echo 'Password válida';
                //return $resultado->row(0)->ID_Utilizador;
                return $data;
            }
        } else {
            return false;
        }
    }

    public function verificar_se_username_existe($username) {
        $query = $this->db->get_where('utilizadores', array('Username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function verificar_se_email_existe($email) {
        $query = $this->db->get_where('utilizadores', array('Email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

}
