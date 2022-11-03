<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drivers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('driver_model', 'driver');
        $this->load->model('trip_model', 'trip');
        $this->load->helper(array('form', 'url', 'security'));
        $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data['page_title'] = 'Drivers';
        $data['main_content'] = 'drivers/view';
        $data['driver_data'] = $this->driver->get_all();
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

    public function details($driver_id)
    {
        $data['page_title'] = 'View Driver Details';
        $data['main_content'] = 'drivers/details';
        $data['driver_data'] = $this->driver->get_by_id($driver_id);
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }


    public function edit($driver_id)
    {
        $data['page_title'] = 'Edit Driver Details';
        $data['main_content'] = 'drivers/edit';
        $data['driver_data'] = $this->driver->get_by_id($driver_id);
        $data['car_reg_id_unassigned'] = $this->car->get_unassigned_cabs();

        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }


    public function delete($driver_id)
    {
        $data['page_title'] = 'Drivers';
        $data['main_content'] = 'drivers/view';
        $data['driver_data'] = $this->car->get_all();

        if ($this->driver->delete($driver_id)) {
            $this->session->set_flashdata('success', " Deleted successfully!");
            redirect("drivers");
        } else {
            $this->session->set_flashdata('error', 'There was a problem deleting , please try again');
            $this->load->view('layout', $data);
        }
    }


    public function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('driver_id', 'driver_id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('name', 'Name:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('mob_no', 'Mobile Number:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('rating', 'Rating:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('car_reg_id', 'Car:', 'required|trim|xss_clean');

        $data['car_reg_id_unassigned'] = $this->car->get_unassigned_cabs();

        if ($this->form_validation->run() == TRUE) {
            $mdata['name'] = $this->input->post('name');
            $mdata['gender'] = $this->input->post('gender');
            $mdata['email'] = $this->input->post('email');
            $mdata['mob_no'] = $this->input->post('mob_no');
            $mdata['rating'] = $this->input->post('rating');
            $mdata['car_reg_id'] = $this->input->post('car_reg_id');

            if (!empty($this->input->post('password')) && ($this->input->post('password') != 'passwd')) {
                $mdata['password'] = $this->input->post('password');
            }

            if ($this->driver->update($this->input->post('driver_id'), $mdata)) {
                $this->session->set_flashdata('success', "Driver details updated successfully!");
                redirect("drivers/details/" . $this->input->post('driver_id'));
            } else {
                $this->session->set_flashdata('error', 'Update not appilied! No change in data.');
                $data['page_title'] = 'Edit Driver';
                $data['main_content'] = 'drivers/edit';
                $data['driver_data'] = $_POST;
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Edit Driver';
            $data['main_content'] = 'drivers/edit';
            $data['driver_data'] = $_POST;
            $this->load->view('layout', $data);
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

    public function add()
    {
        $data['page_title'] = 'Add Driver';
        $data['main_content'] = 'drivers/add';
        $data['car_reg_id_unassigned'] = $this->car->get_unassigned_cabs();
        $this->load->view('layout', $data);
    }


    public function save()
    {

        //print_r($_POST);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email:', 'required|trim|xss_clean|valid_email|is_unique[driver.email]');
        $this->form_validation->set_rules('mob_no', 'Mobile Number:', 'required|trim|xss_clean|is_unique[driver.mob_no]');
        $this->form_validation->set_rules('rating', 'Rating:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim|xss_clean');


        if ($this->form_validation->run() == TRUE) {

            $uploaddata = $this->do_upload('image_url');

            $_POST['image_url'] = $uploaddata['upload_data']['file_name'];
            if ($driver_id = $this->driver->insert($_POST) and $uploaddata) { 
                $this->session->set_flashdata('success', "{$this->input->post('name')} added successfully!");
                redirect("drivers/details/" . $driver_id);
            } else {
                $this->session->set_flashdata('error', 'Update failed! Please check the data.');
                $data['page_title'] = 'Add Driver';
                $data['main_content'] = 'drivers/add';
                $data['driver_data'] = $_POST;
                $data['car_reg_id_unassigned'] = $this->car->get_unassigned_cabs();
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Add Inventory';
            $data['main_content'] = 'drivers/add';
            $data['driver_data'] = $_POST;
            $data['car_reg_id_unassigned'] = $this->car->get_unassigned_cabs();
            $this->load->view('layout', $data);
        }
    }



    public function trips()
    {
        $data['page_title'] = 'View My Trips';
        $data['main_content'] = 'drivers/viewtrips';
        $data['trip_data'] = $this->trip->get_full_details_by_userid($this->session->userdata('role'), $this->session->userdata('userid'));
        if ($this->session->userdata('currently_logged_in')) {
            empty($data['trip_data']) ? $this->session->set_flashdata('error', 'Sorry ! No trips found') : '';
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }
}
