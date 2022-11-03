<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Car extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->helper(array('form', 'url', 'security'));
    }
    public function index()
    {
        $data['page_title'] = 'Inventory';
        $data['main_content'] = 'cars/view';
        $data['car_data'] = $this->car->get_all();
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

    public function details($car_reg_id)
    {
        $data['page_title'] = 'View Car Details';
        $data['main_content'] = 'cars/details';
        $data['car_data'] = $this->car->get_by_id($car_reg_id);
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }
    public function edit($car_reg_id)
    {
        $data['page_title'] = 'Edit Inventory';
        $data['main_content'] = 'cars/edit';
        $data['car_data'] = $this->car->get_by_id($car_reg_id);
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }
    public function delete($car_reg_id)
    {
        $data['page_title'] = 'Edit Inventory';
        $data['main_content'] = 'cars/view';
        $data['car_data'] = $this->car->get_all();

        if ($this->car->delete($car_reg_id)) {
            $this->session->set_flashdata('success', $car_reg_id . " deleted successfully!");
            redirect("car");
        } else {
            $this->session->set_flashdata('error', 'There was a problem deleting ' . $car_reg_id . '! This record doesnot exist.');
            $this->load->view('layout', $data);
        }
    }


    public function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('car_reg_id', 'Username:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('model', 'Model:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('color', 'Color:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('category', 'Category:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('rate_per_km', 'Rate:', 'required|trim|xss_clean|xss_clean');
        

        if ($this->form_validation->run() == TRUE) {
           $car_img = $_FILES['car_image']['name'];
            if(!empty($car_img)) {
                $uploaddata = $this->do_upload('car_image');
               $_POST['car_image'] = $uploaddata['upload_data']['file_name'];

            } else {
                $uploaddata = TRUE;
                $_POST['car_image'] = $this->input->post('car_image_old');

            }
            unset($_POST['car_image_old']);
           
            if ($this->car->update($this->input->post('car_reg_id'), $_POST) and $uploaddata) {
                $this->session->set_flashdata('success', "{$this->input->post('car_reg_id')} updated successfully!");
                redirect("car/details/" . $this->input->post('car_reg_id'));
            } else {
                $this->session->set_flashdata('error', 'Update failed! Please check the data.');
                $data['page_title'] = 'Edit Inventory';
                $data['main_content'] = 'cars/edit';
                $data['car_data'] = $_POST;
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Edit Inventory';
            $data['main_content'] = 'cars/edit';
            $data['car_data'] = $_POST;
            $this->load->view('layout', $data);
        }
    }

    public function add()
    {
        $data['page_title'] = 'Add Inventory';
        $data['main_content'] = 'cars/add';
        $this->load->view('layout', $data);
    }
    public function do_upload($inputname = NULL)
    {
        $config['upload_path'] = "assets/img/carimages/";
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = 1000;
        //$config['max_width']  = 1024;
        //$config['max_height'] = 768;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($inputname)) {
            //$error = array('error' => $this->upload->display_errors());
            return FALSE;
        } else {
            return $data = array('upload_data' => $this->upload->data());
        }
    }
    public function save()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('car_reg_id', 'Car:', 'required|trim|xss_clean|callback_car_check');
        $this->form_validation->set_rules('model', 'Model:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('color', 'Color:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('category', 'Category:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('rate_per_km', 'Rate:', 'required|trim|xss_clean|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $uploaddata = $this->do_upload('car_image');

            $_POST['car_image'] = $uploaddata['upload_data']['file_name'];
            if ($this->car->insert($_POST) and $uploaddata) {
                $this->session->set_flashdata('success', "{$this->input->post('car_reg_id')} added successfully!");
                redirect("car/details/" . $this->input->post('car_reg_id'));
            } else {
                $this->session->set_flashdata('error', 'Update failed! Please check the data.');
                $data['page_title'] = 'Add Inventory';
                $data['main_content'] = 'cars/add';
                $data['car_data'] = $_POST;
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Add Inventory';
            $data['main_content'] = 'cars/add';
            $data['car_data'] = $_POST;
            $this->load->view('layout', $data);
        }
    }

    public function car_check($str)
    {
        if ($this->car->exists($str) == TRUE) {
            $this->form_validation->set_message('car_check', 'This {field} already exist in our database, please check again');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
