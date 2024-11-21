<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function getAllUsers(){
        return $this->db->raw('select * from jpacm_users', array(), PDO::FETCH_ASSOC);
    }
    
    public function create($lastname, $firstname, $email, $gender, $address){
        $user_data = array(
            'JPACM_lastname' => $lastname,
            'JPACM_firstname' => $firstname,
            'JPACM_email' => $email,
            'JPACM_gender' => $gender,
            'JPACM_address' => $address,
        );
        return $this->db->table('jpacm_users')->insert($user_data);
    }
    public function get_user($id) {
        return $this->db->table('jpacm_users')->where('JPACM_id', $id)->get();
    }
    public function update($lastname, $firstname, $email, $gender, $address, $id){
        $user_data = array(
            'JPACM_lastname' => $lastname,
            'JPACM_firstname' => $firstname,
            'JPACM_email' => $email,
            'JPACM_gender' => $gender,
            'JPACM_address' => $address
        );
        return $this->db->table('jpacm_users')->where('JPACM_id', $id)->update($user_data);
    }
    public function delete($id){
        return $this->db->table('jpacm_users')->where('JPACM_id', $id)->delete();
    }
}
?>
