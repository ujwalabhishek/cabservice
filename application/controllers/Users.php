<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('driver_model', 'driver');
        $this->load->model('car_model', 'car');
        $this->load->model('user_model', 'user');
        $this->load->helper(array('form', 'url', 'security'));
        //$this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data['page_title'] = 'Users';
        $data['main_content'] = 'users/view';
        $data['user_data'] = $this->user->get_all();
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

    public function do_upload($inputname = NULL)
    {
        $config['upload_path'] = "assets/img/faces/";
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = 1000;
        //$config['max_width']  = 1024;
        //$config['max_height'] = 768;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($inputname)) {
            $error = array('error' => $this->upload->display_errors());
            return FALSE;
        } else {
            return $data = array('upload_data' => $this->upload->data());
        }
    }

    public function dashboard()
    {
        $data['page_title'] = 'Users';
        $data['main_content'] = 'users/dashboard';
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login/user');
        }
    }


    public function bookcabs()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Cab Type', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pickup_location', 'Pickup Location', 'required|trim|xss_clean');
        $this->form_validation->set_rules('drop_location', 'Drop Location', 'required|trim|xss_clean');
        $this->form_validation->set_rules('trip_datetime', 'Trip Date & Time', 'required|trim|xss_clean');
        $data['pickup_location'] = $this->input->post('pickup_location');
        $data['drop_location'] = $this->input->post('drop_location');
        $data['trip_datetime'] = $this->input->post('trip_datetime');
        if ($this->form_validation->run() == TRUE) {

            $data['user_id'] = $this->session->userdata('userid');

            $data['cab_data'] = $this->user->list_available_cabs($this->input->post('category'));

            if (!$data['cab_data']) {
                $this->session->set_flashdata('error', 'Sorry ! No cabs found in your search category.');
            }

            $data['page_title'] = 'Book Cabs';
            $data['main_content'] = 'users/bookcabs';
            $this->load->view('layout', $data);
        } else {
            $data['page_title'] = 'Book Cabs';
            $data['main_content'] = 'users/bookcabs';
            $this->load->view('layout', $data);
        }
    }

    public function register()
    {

        if ($this->session->userdata('currently_logged_in')) {
            $this->session->sess_destroy();
        }
        $this->load->view('register/register_view_user');
    }
    public function signup()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number:', 'required|trim|xss_clean|is_unique[user.mobile_no]');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim|xss_clean');


        if ($this->form_validation->run() == TRUE) {
            if ($user_id = $this->user->insert($_POST)) {
                $this->session->set_flashdata('success', "Registration success! Please login below.");
                redirect("Login/user");
            } else {
                $this->session->set_flashdata('error', 'Signup failed! Please check the data.');
                $this->load->view('register/register_view_user');
            }
        } else {
            $this->load->view('register/register_view_user');
        }
    }


    public function details($user_id)
    {
        $data['page_title'] = 'View Driver Details';
        $data['main_content'] = 'users/details';
        $data['user_data'] = $this->user->get_by_id($user_id);
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }


    public function edit($user_id)
    {
        $data['page_title'] = 'Edit Driver Details';
        $data['main_content'] = 'users/edit';
        $data['user_data'] = $this->user->get_by_id($user_id);

        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }


    public function delete($user_id)
    {
        $data['page_title'] = 'Users';
        $data['main_content'] = 'users/view';
        $data['driver_data'] = $this->car->get_all();

        if ($this->user->delete($user_id)) {
            $this->session->set_flashdata('success', " Deleted successfully!");
            redirect("users");
        } else {
            $this->session->set_flashdata('error', 'There was a problem deleting , please try again');
            $this->load->view('layout', $data);
        }
    }


    public function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_id', 'driver_id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('name', 'Name:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('rating', 'Rating:', 'required|trim|xss_clean');


        if ($this->form_validation->run() == TRUE) {
            $mdata['name'] = $this->input->post('name');
            $mdata['gender'] = $this->input->post('gender');
            $mdata['email'] = $this->input->post('email');
            $mdata['mobile_no'] = $this->input->post('mobile_no');
            $mdata['rating'] = $this->input->post('rating');

            $uploaddata = $this->do_upload('image_url');
            if (!empty($uploaddata)){
                $mdata['image_url'] = $uploaddata['upload_data']['file_name'];
            }
            
            if (!empty($this->input->post('password')) && ($this->input->post('password') != 'passwd')) {
                $mdata['password'] = $this->input->post('password');
            }

            if ($this->user->update($this->input->post('user_id'), $mdata)) {
                $this->session->set_flashdata('success', "Driver details updated successfully!");
                redirect("Users/details/" . $this->input->post('user_id'));
            } else {
                $this->session->set_flashdata('error', 'Update not appilied! No change in data.');
                $data['page_title'] = 'Edit User';
                $data['main_content'] = 'users/edit';
                $data['user_data'] = $_POST;
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Edit User';
            $data['main_content'] = 'users/edit';
            $data['user_data'] = $_POST;
            $this->load->view('layout', $data);
        }
    }


    public function add()
    {
        $data['page_title'] = 'Add Driver';
        $data['main_content'] = 'users/add';
        $this->load->view('layout', $data);
    }


    public function save()
    {

        //print_r($_POST);exit;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number:', 'required|trim|xss_clean|is_unique[user.mobile_no]');
        $this->form_validation->set_rules('rating', 'Rating:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim|xss_clean');


        if ($this->form_validation->run() == TRUE) {
            if ($user_id = $this->user->insert($_POST)) {
                $this->session->set_flashdata('success', "{$this->input->post('name')} added successfully!");
                redirect("users/details/" . $user_id);
            } else {
                $this->session->set_flashdata('error', 'Update failed! Please check the data.');
                $data['page_title'] = 'Add User';
                $data['main_content'] = 'user/add';
                $data['user_data'] = $_POST;
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Add Inventory';
            $data['main_content'] = 'users/add';
            $data['user_data'] = $_POST;
            $this->load->view('layout', $data);
        }
    }
}
