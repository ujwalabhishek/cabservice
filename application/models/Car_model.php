<?php
/*
  * This is the Model class for Login  
  */

class Car_Model extends CI_Model
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
        $this->db->from('car');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    /* 
     * Get list of cars that are not yet assigned to any driver
     * 
     */

    public function get_unassigned_cabs()
    {
        $query = $this->db->query('SELECT c.car_reg_id, c.model FROM car c WHERE NOT EXISTS ( SELECT 1 FROM driver d WHERE c.car_reg_id = d.car_reg_id ) order by c.created_at DESC;');
        $car_reg_ids = $query->result_array();

        if (empty($car_reg_ids)) {
            return false;
        } else {
            return $car_reg_ids;
        }
    }



    /**
     * @return [type]
     * get all assigned cabs
     */
    public function get_assigned_cabs()
    {
        $query = $this->db->query('SELECT c.car_reg_id, c.model FROM car c WHERE EXISTS ( SELECT 1 FROM driver d WHERE c.car_reg_id = d.car_reg_id ) order by c.created_at DESC;');
        $car_reg_ids = $query->result_array();

        if (empty($car_reg_ids)) {
            return false;
        } else {
            return $car_reg_ids;
        }
    }

    
    /**
     * @param null $car_reg_id
     * 
     * @return [type]
     */
    public function get_by_id($car_reg_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('car');
        if (!empty($car_reg_id)) {
            $this->db->where('car_reg_id', $car_reg_id);
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
    public function update($car_reg_id, $data)
    {
        $this->db->where('car_reg_id', $car_reg_id);
        $this->db->update('car', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /* 
     * This method detete  the cars from inventory
     */
    public function delete($car_reg_id)
    {
        $this->db->where('car_reg_id', $car_reg_id);
        $this->db->delete('car');
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
        return $this->db->insert('car', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function exists($str)
    {
        $this->db->select('*');
        $this->db->from('car');
        $this->db->where('car_reg_id', $str);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
