<?php
/*
  * This is the Model class for Login  
  */

class Driver_Model extends CI_Model
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

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('driver');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_by_id($driver_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('driver');
        if (!empty($driver_id)) {
            $this->db->where('driver_id', $driver_id);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

// Get all driver and car details by joining the two tables 
// use argument driver_id  to filter result 

    public function get_car_and_driver($by_driver_id = NULL)
    {
        $sql = 'SELECT car.car_reg_id,car.rate_per_km,car.model,car.color,car.category,car.car_image , driver.driver_id,driver.name,driver.gender,driver.email,driver.mob_no, driver.rating, driver.image_url from driver join car on driver.car_reg_id = car.car_reg_id';
        if (!empty($by_driver_id)) {
            $sql .= " WHERE driver.driver_id ='$by_driver_id' ";
        }
        $query = $this->db->query($sql);

        $available_cars = $query->result_array();

        if (empty($available_cars)) {
            return false;
        } else {
            return $available_cars;
        }
    }

    /* 
     * This method update all the cars details
     */
    public function update($driver_id, $data)
    {
        if (!isset($data['password']) && !empty($data['password'])) {
            $data['password'] = $this->bcrypt->hash_password($data['password']);
        }

        $this->db->where('driver_id', $driver_id);
        $this->db->update('driver', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /* 
     * This method detete  the cars from inventory
     */
    public function delete($driver_id)
    {
        $this->db->where('driver_id', $driver_id);
        $this->db->delete('driver');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* 
     * This method inserts  the cars to the inventory
     */
    public function insert($data)
    {
        $data['admin_id'] = '1';
        $data['password'] = $this->bcrypt->hash_password($data['password']);
        $this->db->insert('driver', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }


    public function exists($feild, $str)
    {
        $this->db->select('*');
        $this->db->from('driver');
        $this->db->where($feild, $str);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
