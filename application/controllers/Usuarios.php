<?php

defined('BASEPATH') OR exit('Acao nao permitida');

class Usuarios extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    public function index() {
        $data = array(

            'titulo' => 'Usuarios Cadastrados',

            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'usuarios' => $this->ion_auth->users()->result(),
        );
        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

    public function edit($user_id = NULL) {
        if(!$user_id || !$this->ion_auth->user($user_id)->row()) {
            $this->session->set_flashdata('error', 'Usuario nao encontrado');
                redirect('usuarios');
            }

            $this->form_validation->set_rules('first_name', '', 'trim|required');
            if($this->form_validation->run()) {
                $data = elements(
                    array(
                        'first_name',
                        'last_name',
                        'email',
                        'username',
                        'password',
                    ), $this->input->post()
                );

                $data = $this->security->xss_clean($data);
                $password = $this->input->post('password');
                if(!$password) {
                    unset($data['password']);
                }

                if($this->ion_auth->update($user_id, $data)) {
                    $perfil_usuario_db = $this->ion_auth->get_users_groups($user_id)->row();
                    $perfil_usuario_post = $this->input->post('perfil_usuario');

                    if($perfil_usuario_db->id != $perfil_usuario_post) {
                        $this->ion_auth->remove_from_group($perfil_usuario_db->id, $user_id);
                        $this->ion_auth->add_to_group($perfil_usuario_post, $user_id);
                    }

                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
                }else{
                    $this->session->set_flashdata('error', 'Erro ao salvar os dados');
                }
                redirect('usuarios');

        }else{
            $data = array(
                'titulo' => 'Editar Usuario',
                'usuario' => $this->ion_auth->user($user_id)->row(),
                'perfil_usuario' => $this->ion_auth->get_users_groups($user_id)->row(),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/footer');
        }
    }
}