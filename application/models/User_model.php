<?php
/*
  * This is the Model class for Login  
  */

class User_Model extends CI_Model
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
        $this->db->from('user');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_by_id($user_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('user');
        if (!empty($user_id)) {
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    /* 
     * This method update all the cars details
     */
    public function update($user_id, $data)
    {
        if (!isset($data['password']) && !empty($data['password'])) {
            $data['password'] = $this->bcrypt->hash_password($data['password']);
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /* 
     * This method detete  the cars from inventory
     */
    public function delete($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
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
        $data['password'] = $this->bcrypt->hash_password($data['password']);
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }


    public function exists($feild, $str)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($feild, $str);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // get all cars available. ie cars that have drivers assigned and are not in Active trip 
    public function list_available_cabs($filter = NULL)
    {
        $query = $this->db->query("SELECT driver.driver_id, driver.rating, driver.name, driver.gender, driver.email, driver.mob_no, driver.image_url, car.* FROM driver JOIN car ON driver.car_reg_id = car.car_reg_id where driver.driver_id NOT IN (SELECT driver_id from trip where status IN ('Active','Accept')) AND car.category = '$filter'");
        $available_cars=$query->result_array();

        if (empty($available_cars)) {
            return false;
        } else {
            return $available_cars;
        }
    }
}
