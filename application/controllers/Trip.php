<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('driver_model', 'driver');
        $this->load->model('trip_model', 'trip');
        $this->load->helper(array('form', 'url', 'security'));

        //$this->output->enable_profiler(TRUE);
    }
// list all the trips
    public function listall()
    {
        $data['page_title'] = 'View Trips';
        $data['main_content'] = 'trip/view';
        $data['trip_data'] = $this->trip->get_full_details_by_id_array();
        if ($this->session->userdata('currently_logged_in')) {
            empty($data['trip_data']) ? $this->session->set_flashdata('error', 'Sorry ! No trips found') : '';
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

// sales report
    public function salesreport()
    {
        $data['page_title'] = 'View Trips';
        $data['main_content'] = 'trip/salesreport';
        $data['trip_data'] = $this->trip->get_full_details_by_id_array();
        $data['total_sales'] = $this->trip->get_sales()['total_sales'];
        $data['total_revenue'] = $this->trip->get_sales(array('customer_payment!='=>''))['total_sales'];
        $data['pending_payments'] = $this->trip->get_sales(array('customer_payment'=>NULL))['total_sales'];
        if ($this->session->userdata('currently_logged_in')) {
            empty($data['trip_data']) ? $this->session->set_flashdata('error', 'Sorry ! No trips found') : '';
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

    public function mytrips()
    {
        $data['page_title'] = 'View My Trips';
        $data['main_content'] = 'trip/view';
        $data['trip_data'] = $this->trip->get_full_details_by_userid($this->session->userdata('role'), $this->session->userdata('userid'));
        if ($this->session->userdata('currently_logged_in')) {
            empty($data['trip_data']) ? $this->session->set_flashdata('error', 'Sorry ! No trips found') : '';
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

    public function create()
    {
        $data = $_POST;
        $data['car_data'] = $this->driver->get_car_and_driver($_POST['driver_id'])[0];
        $data['user_id'] = $this->session->userdata('userid');
        $data['page_title'] = 'Book Your Trip';
        $data['main_content'] = 'trip/create';
        //$data['booking_data'] = $_POST;
        //echo '<pre>'; print_r($data); exit("<pre>");
        $this->load->view('layout', $data);
    }

    public function details($trip_id)
    {
        $data['page_title'] = 'View Trip Details';
        $data['main_content'] = 'Trip/details';
        $data['trip_data'] = $this->trip->get_full_details_by_id($trip_id);
        if ($this->session->userdata('currently_logged_in')) {
            empty($data['trip_data']) ? $this->session->set_flashdata('error', 'Sorry ! No trip found with this id') : '';
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }

    public function cancel($trip_id)
    {
        $data['page_title'] = 'Cancel Trip';
        $data['main_content'] = 'trip/details';

        $logged_in_user_role = $this->session->userdata('role');
        $updateData['status'] = $logged_in_user_role == 'driver' ? 'Drivercancelled' : 'Usercancelled';
        $update_status = $this->trip->update($trip_id, $updateData);
        $data['trip_data'] = $this->trip->get_full_details_by_id($trip_id);
        if ($update_status) {
            $this->session->set_flashdata('success', 'Success! Your trip was cancelled successfully');
        } else {
            $this->session->set_flashdata('error', 'Sorry ! No trip found with this id');
        }


        $this->load->view('layout', $data);
    }

    public function payments()
    {
        $data['page_title'] = 'Pending Payments';
        $data['main_content'] = 'Trip/payments';

        $data['trip_data'] = $this->trip->get_full_details_by_userid($this->session->userdata('role'), $this->session->userdata('userid'));
        if (empty($data['trip_data'])) {
            $this->session->set_flashdata('error', 'Sorry ! No trips found');
            $this->load->view('layout', $data);
        } else {
            $this->load->view('layout', $data);
        }
    }


    public function pay($trip_id = NULL)
    {
        $data['page_title'] = 'Pay';
        $data['main_content'] = 'trip/payments';
        $data['trip_data'] = $this->trip->get_full_details_by_id_array($trip_id);
        $updateData['customer_payment'] = $data['trip_data'][0]['trip_cost'];
        $updateFlag = $this->trip->update($trip_id, $updateData);
        if (empty($updateFlag)) {
            $this->session->set_flashdata('error', 'Sorry ! payment failed for Trip ID: ' . $trip_id);
            $this->load->view('layout', $data);
        } else {
            $data['trip_data'] = $this->trip->get_full_details_by_id_array($trip_id);
            $this->session->set_flashdata('success', 'Payment success for Trip ID: ');
            $this->load->view('layout', $data);
        }
    }

    public function feedback($trip_id = NULL)
    {
        $data['page_title'] = 'Trip Feedback';
        $data['main_content'] = 'Trip/feedback';
        $data['trip_data'] = $this->trip->get_full_details_by_id($trip_id);
        if ($this->session->userdata('currently_logged_in')) {
            empty($data['trip_data']) ? $this->session->set_flashdata('error', 'Sorry ! No trip found with this id') : '';
            $this->load->view('layout', $data);
        } else {
            redirect('Login');
        }
    }


    public function update()
    {
        $trip_id = $this->input->post('trip_id');
        $updateFlag = $this->trip->update($trip_id, $_POST);

        if ($updateFlag) {
            $this->session->set_flashdata('success', 'Feedback submitted successfully!!');
            redirect(site_url("trip/details/$trip_id"));
        } else {
            $data['page_title'] = 'Trip Feedback';
            $data['main_content'] = 'Trip/feedback';
            $data['trip_data'] = $this->trip->get_full_details_by_id($trip_id);
            $this->session->set_flashdata('error', 'Sorry ! No trip found with this id');
            $this->load->view('layout', $data);
        }
    }

    public function updatetrip_by_driver($trip_id, $status)
    {
        //$data['trip_id'] = $trip_id;
        $data['status'] = $status;
        $updateFlag = $this->trip->update($trip_id, $data);

        if ($updateFlag) {
            $this->session->set_flashdata('success', "Trip ID- {$trip_id}  accepted successfully!!");
        } else {
            $this->session->set_flashdata('error', 'Sorry ! No trip found with this id');
        }
        redirect(site_url("Drivers/trips"));
    }


    public function commence_trip_by_driver($trip_id = NULL, $status = NULL)
    {
        $data['action'] = $status;
        $data['page_title'] = "$status Trip";
        $data['main_content'] = 'Trip/commence';
        $data['trip_data'] = $this->trip->get_full_details_by_id($trip_id);
        if ($status == "Start" and !empty($this->input->post('start_km'))) {
            $updatedata['start_km'] = $this->input->post('start_km');
            $updatedata['trip_start_datetime'] = date('Y-m-d H:i:s');
            $updatedata['status'] = 'Active';
            $updateFlag = $this->trip->update($trip_id, $updatedata);

            if ($updateFlag) {
                $this->session->set_flashdata('success', "Trip ID- {$trip_id}  started successfully!!");
                redirect(site_url("Drivers/trips/#activetrips"));
            } else {
                $this->session->set_flashdata('error', 'Sorry ! There was some error starting the trip');
            }
        }
        if ($status == "End" and !empty($this->input->post('end_km'))) {
            $updatedata['end_km'] = $this->input->post('end_km');
            $updatedata['trip_end_datetime'] = date('Y-m-d H:i:s');
            $updatedata['status'] = 'Completed';
            $updatedata['trip_cost'] = ($this->input->post('start_km') - $this->input->post('end_km')) * $this->input->post('rate_per_km');

            $updateFlag = $this->trip->update($trip_id, $updatedata);

            if ($updateFlag) {
                $this->session->set_flashdata('success', "Trip ID- {$trip_id}  ended successfully!!");
                redirect(site_url("Drivers/trips/#completedtrips"));
            } else {
                $this->session->set_flashdata('error', 'Sorry ! There was some error ending the trip');
            }
        }
        $data['trip_data'] = $this->trip->get_full_details_by_id($trip_id);
        $this->load->view('layout', $data);
    }


    public function save()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('driver_id', 'Driver ID:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('user_id', 'User ID:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pickup_location', 'Pickup Location:', 'required|trim|xss_clean');
        $this->form_validation->set_rules('drop_location', 'Drop Location:', 'required|trim|xss_clean|xss_clean');
        $this->form_validation->set_rules('trip_datetime', 'Trip Ttime:', 'required|trim|xss_clean|xss_clean');

        if ($this->form_validation->run() == TRUE) {

            if ($trip_id = $this->trip->insert($_POST)) {
                $this->session->set_flashdata('success', " Your booking was created successfully! Your booking reference no is our {$trip_id} added");
                redirect("Trip/details/" . $trip_id);
            } else {
                $this->session->set_flashdata('error', 'Booking! Please check the data.');
                $data['page_title'] = 'Confirm Trip';
                $data['main_content'] = 'trip/create';
                $data['car_data'] = $_POST;
                $this->load->view('layout', $data);
            }
        } else {
            $data['page_title'] = 'Confirm Trip';
            $data['main_content'] = 'trip/create';
            $data['car_data'] = $_POST;
            $this->load->view('layout', $data);
        }
    }
}
