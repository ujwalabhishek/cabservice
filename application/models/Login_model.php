<?php
/*
  * This is the Model class for Login  
  */

class Login_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
    }
    /* 
     * This method validates the user credentials 
     */
    public function check_admin_valid()
    {
        $user_name = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->select('*')
            ->from('admin')->where('username', $user_name);
        $result = $this->db->get()->row();


        if (!empty($result)) {
            if ($this->bcrypt->check_password($password, $result->password)) {
                unset($result->password);
                $result->role_id = 'admin';
                $result->first_name = 'Site Administrator';
                return $result;
            } else {
                return FALSE;
            }
        }
    }


    /* 
     * This method validates the driver credentials 
     */
    public function check_driver_valid()
    {
        $user_name = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->select('*')
            ->from('driver')->where('email', $user_name);
        $result = $this->db->get()->row();


        if (!empty($result)) {
            if ($this->bcrypt->check_password($password, $result->password)) {
                unset($result->password);
                $result->role_id = 'driver';
                return $result;
            } else {
                return FALSE;
            }
        }
    }

    /* 
     * This method validates the user credentials 
     */
    public function check_user_valid()
    {
        $user_name = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->select('*')
            ->from('user')->where('email', $user_name);
        $result = $this->db->get()->row();


        if (!empty($result)) {
            if ($this->bcrypt->check_password($password, $result->password)) {
                unset($result->password);
                $result->role_id = 'user';
                return $result;
            } else {
                return FALSE;
            }
        }
    }
    public function username_exists($username)
    {
        $this->db->select('username');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // method to check if driver username (email)  exists

    public function email_exists_driver($email)
    {
        $this->db->select('email');
        $this->db->from('driver');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // method to check if user username (email) exists 
    public function email_exists_user($email)
    {
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
