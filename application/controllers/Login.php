<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->library('bcrypt');
        $this->load->helper(array('form', 'url', 'security'));
    }
    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('login/login_view');
    }

    public function driver()
    {
        $this->session->sess_destroy();
        $this->load->view('login/login_view_driver');
    }
    public function user()
    {
        $this->session->sess_destroy();
        $this->load->view('login/login_view_user');
    }
    public function validate_admin()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_username_check');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim', array('required' => 'You must provide a %s.'));


        if ($this->form_validation->run() == TRUE) {
            if ($userData = $this->login->check_admin_valid()) {

                $data = array(
                    'username' => $this->input->post('username'),
                    'userid' => $userData->admin_id,
                    'role' =>  $userData->role_id,
                    'currently_logged_in' => 1
                );
                $this->session->set_userdata($data);
                redirect('welcome/');
            } else {
                $this->session->set_flashdata('success', 'Login failed! Invalid Username/Password');
                $this->load->view('login/login_view');
            }
        } else {
            $this->load->view('login_view');
        }
    }
    public function validate_driver()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim', array('required' => 'You must provide a %s.'));


        if ($this->form_validation->run() == TRUE) {
            if ($userData = $this->login->check_driver_valid()) {

                $data = array(
                    'username' => $this->input->post('email'),
                    'userid' => $userData->driver_id,
                    'role' =>  $userData->role_id,
                    'currently_logged_in' => 1
                );
                $this->session->set_userdata($data);
                redirect('welcome/');
            } else {
                $this->session->set_flashdata('success', 'Login failed! Invalid Email/Password');
                $this->load->view('Login/login_view_driver');
            }
        } else {
            $this->load->view('Login/login_view_driver');
        }
    }


    public function validate_user()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email|callback_email_check_user');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim', array('required' => 'You must provide a %s.'));


        if ($this->form_validation->run() == TRUE) {
            if ($userData = $this->login->check_user_valid()) {

                $data = array(
                    'username' => $this->input->post('email'),
                    'userid' => $userData->user_id,
                    'role' =>  $userData->role_id,
                    'currently_logged_in' => 1
                );
                $this->session->set_userdata($data);
                redirect('Users/dashboard');
            } else {
                $this->session->set_flashdata('success', 'Login failed! Invalid Email/Password');
                $this->load->view('Login/login_view_user');
            }
        } else {
            $this->load->view('Login/login_view_user');
        }
    }
    public function username_check($str)
    {
        if ($this->login->username_exists($this->input->post('username')) == false) {
            $this->form_validation->set_message('username_check', 'This {field} doesnot exist in our database, please check again');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function email_check($str)
    {
        if ($this->login->email_exists_driver($this->input->post('email')) == false) {
            $this->form_validation->set_message('email_check', 'This {field} doesnot exist in our database, please check again');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function email_check_user($str)
    {
        if ($this->login->email_exists_user($this->input->post('email')) == false) {
            $this->form_validation->set_message('email_check_user', 'This {field} doesnot exist in our database, please check again');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function logout()
    {
        //removing session  
        $this->session->sess_destroy();
        redirect("Login");
    }
}
