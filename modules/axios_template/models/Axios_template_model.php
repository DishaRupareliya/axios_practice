<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Axios_template_model extends App_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function saveTemplate($posted_data){
            if(empty($posted_data['id'])){
                return $this->db->insert(db_prefix().'axios_template' , $posted_data);
            }
            if(!empty($posted_data['id'])){
                $this->db->where('id' , $posted_data['id']);
                $this->db->update(db_prefix().'axios_template' , $posted_data);
                return ($this->db->affected_rows() > 0) ? true : false;
            }
        }

        public function deleteTemplate($id){
            $this->db->delete(db_prefix().'axios_template' , ['id' => $id]);
            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function getTemplateDetails($id){
            return $this->db->get_where(db_prefix().'axios_template' , ['id' => $id])->row();
        }
    }