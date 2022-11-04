<?php
/*
  * This is the Model class for Login  
  */

class Trip_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
    }
    /* 
     * This method gets all the cars in the inventory
     * This method gets specific car details if the regestration id is passed as argument
     */

    // public function get_all()
    // {
    //     $this->db->select('*');
    //     $this->db->from('car');
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->result_array();
    //     } else {
    //         return false;
    //     }
    // }


    /* 
     * Get list of all trips details
     * $trip_id Use argument for filtering trip details
     */



    public function get_by_id($trip_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('trip');
        if (!empty($trip_id)) {
            $this->db->where('trip_id', $trip_id);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    /* 
     * Get total sales
     * 
     */



    public function get_sales($filter = NULL)
    {
        $this->db->select_sum("trip_cost", "total_sales");
        $this->db->from('trip');
        $this->db->where('status', 'Completed');
        if (!empty($filter)) {
            $this->db->where($filter);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    /* 
     * Get list of all trips details along with driver , car & user details
     * $trip_id Use argument for filtering trip details
     */



    public function get_full_details_by_id($trip_id = NULL)
    {
        $sql = "SELECT trip.*, user.name as passenger_name, user.mobile_no as passenger_mobile, user.gender as passenger_gender, user.email as passenger_email, car.car_reg_id,car.rate_per_km,car.model,car.color,car.category,car.car_image , driver.driver_id,driver.name,driver.gender,driver.email,driver.mob_no, driver.rating, driver.image_url FROM `trip` JOIN driver ON trip.driver_id = driver.driver_id JOIN car ON driver.car_reg_id = car.car_reg_id JOIN user ON trip.user_id=user.user_id ";
        if (!empty($trip_id)) {
            $sql .= " WHERE trip.trip_id ='$trip_id' ";
        }
        $sql .= " ORDER BY trip_id DESC";
        $query = $this->db->query($sql);

        $trip_details = $query->result_array();

        if (empty($trip_details)) {
            return false;
        } else {
            return $trip_details[0];
        }
    }

    /* 
     * Get list of all trips details along with driver , car & user details
     * $trip_id Use argument for filtering trip details
     */



    public function get_full_details_by_id_array($trip_id = NULL)
    {
        $sql = "SELECT trip.*, user.name as passenger_name, user.mobile_no as passenger_mobile, user.gender as passenger_gender, user.email as passenger_email, car.car_reg_id,car.rate_per_km,car.model,car.color,car.category,car.car_image , driver.driver_id,driver.name,driver.gender,driver.email,driver.mob_no, driver.rating, driver.image_url FROM `trip` JOIN driver ON trip.driver_id = driver.driver_id JOIN car ON driver.car_reg_id = car.car_reg_id JOIN user ON trip.user_id=user.user_id ";
        if (!empty($trip_id)) {
            $sql .= " WHERE trip.trip_id ='$trip_id' ";
        }

        $sql .= " ORDER BY trip_id DESC";
        $query = $this->db->query($sql);

        $trip_details = $query->result_array();

        if (empty($trip_details)) {
            return false;
        } else {
            return $trip_details;
        }
    }
    /* 
     * Get list of all trips details along with driver , car & user details
     * $trip_id Use argument for filtering trip details
     */



    public function get_full_details_by_userid($role = NULL, $userid = NULL)
    {
        $sql = "SELECT trip.*, user.name as passenger_name, user.mobile_no as passenger_mobile, user.gender as passenger_gender, user.email as passenger_email, car.car_reg_id,car.rate_per_km,car.model,car.color,car.category,car.car_image , driver.driver_id,driver.name,driver.gender,driver.email,driver.mob_no, driver.rating, driver.image_url FROM `trip` JOIN driver ON trip.driver_id = driver.driver_id JOIN car ON driver.car_reg_id = car.car_reg_id JOIN user ON trip.user_id=user.user_id ";
        if (!empty($userid)) {
            $sql .= " WHERE $role.{$role}_id ='$userid' ";
        }
        $sql .= " ORDER BY trip_id DESC";
        $query = $this->db->query($sql);

        $trip_details = $query->result_array();
        //echo '<pre>';print_r($trip_details);exit;
        if (empty($trip_details)) {
            return false;
        } else {
            return $trip_details;
        }
    }
    /* 
     * This method update the trip details
     */

    public function update($trip_id, $data)
    {
        $this->db->where('trip_id', $trip_id);
        $this->db->update('trip', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /* 
     * This method inserts  the trip booking to the table
     */
    public function insert($data)
    {
        $date = strtotime($data['trip_datetime']);
        $data['trip_datetime'] = date('Y-m-d H:i:s', $date);
        $this->db->insert('trip', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    // fetch all honoured trips and other filters can be appilied
    public function get_all_trips($whereFeild = NULL, $whereData = NULL)
    {

        $sql = "SELECT * FROM `trip` ";
        if (!empty($whereFeild)) {
            $sql .= "WHERE $whereFeild = '$whereData' ";
        }

        $sql .= " ORDER BY trip_id DESC";
        $query = $this->db->query($sql);

        $trip_details = $query->result_array();
        
        if (empty($trip_details)) {
            return false;
        } else {
            return $trip_details;
        }
    }
}
