<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->model('driver_model', 'driver');
        $this->load->model('trip_model', 'trip');
        $this->load->helper(array('form', 'url', 'security'));

        //$this->output->enable_profiler(TRUE);
    } 
	public function index()
	{

		$data['total_cabs'] = count($this->car->get_all());
		$data['unassigned_cabs'] = count($this->car->get_unassigned_cabs());
		$data['assigned_cabs'] = count($this->car->get_assigned_cabs());
		$data['honoured_trips'] = count($this->trip->get_all_trips('status','Completed'));
		$data['cancelled_trips'] = count($this->trip->get_all_trips('status','Reject')) + count($this->trip->get_all_trips('status','Drivercancelled')) + count($this->trip->get_all_trips('status','Usercancelled'));
		$data['total_trips'] = count($this->trip->get_all_trips()) ;

		$data['page_title'] = 'AdminDashboard';
        $data['main_content'] = 'dashboard';
 
		if ($this->session->userdata('currently_logged_in')) {
			$this->load->view('layout', $data);
		} else {
			redirect('Login');
		}
	}
}
