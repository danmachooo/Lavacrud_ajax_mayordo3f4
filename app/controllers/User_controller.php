<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_controller extends Controller {
    public function __construct(){
        parent::__construct();
        $this->call->model('user_model');
    }
	public function read(){
        $data['users'] = $this->user_model->getAllUsers();
        $this->call->view('users/display', $data);
    }
    public function create(){
        if($this->form_validation->submitted()) {
            $lastname = $this->io->post('lastname');
            $firstname = $this->io->post('firstname');
            $email = $this->io->post('email');
            $gender = $this->io->post('gender');
            $address = $this->io->post('address');

            if($this->user_model->create($lastname, $firstname, $email, $gender, $address)){
                set_flash_alert('success', 'User has been added.');
            } else {
                set_flash_alert('danger', 'User has not been added.');
            }
        }
        $this->call->view('users/create');
    }

    public function update($id){
        if($this->form_validation->submitted()) {
            $lastname = $this->io->post('lastname');
            $firstname = $this->io->post('firstname');
            $email = $this->io->post('email');
            $gender = $this->io->post('gender');
            $address = $this->io->post('address');

            if($this->user_model->update($lastname, $firstname, $email, $gender, $address, $id)){
                set_flash_alert('success', 'User has been updated.');
            } else {
                set_flash_alert('danger', 'User has not been updated.');
            }

        }
        $data['u'] = $this->user_model->get_user($id);
        $this->call->view('users/update', $data);
    }
    public function delete($id) {
        if($this->user_model->delete($id)) {
            set_flash_alert('success', 'User has been deleted.');
            redirect('/');
        } else {
            set_flash_alert('danger', 'User has not been deleted.');
            redirect('/');
        }
    }

    
}
?>
