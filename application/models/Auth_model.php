<?php 
class Auth_model extends CI_Model{

    public function login() 
    {
        $email = $this->input->post('email' ,true);
        $password = $this->input->post('password' , true);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user)
        {
            if(password_verify($password,$user['password']))
            {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if($user['role_id'] == 1){
                    redirect('admin');
                } else {
                    redirect('costumer');
                }
            } else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                 email / Password Salah!
		  			</div>');
					redirect('auth');
            }
        } else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					email / Password Salah!
		  			</div>');
					redirect('auth');
        }
    }

}