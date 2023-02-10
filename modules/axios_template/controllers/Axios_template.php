<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Axios_template extends AdminController
	{
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('axios_template_model');
	        $this->load->helper('axios_template');
	        $this->load->library('axios_template_lib');
	    }

	    public function index()
	    {
	    	if($this->input->is_ajax_request()){
	    		$this->app->get_table_data(module_views_path(AXIOS_TEMPLATE_MODULE,'tables/axios_template_table'));
	    	}
	    	$this->load->view('axios_template');
	    }

	    public function add_template_details(){
	    	$this->load->view('add_template_details');
	    }

	    public function save(){
	    	$posted_data = $this->input->post();
	    	$res = $this->axios_template_model->saveTemplate($posted_data);
	    	if(empty($posted_data['id']) && $res){
	    		echo json_encode(['success' => true ,'message' => _l('added_successfully' , _l('axios_template'))]);
	    	}
	    	if(!empty($posted_data['id'] && $res)){
	    		echo json_encode(['success' => true , 'message' => _l('updated_successfully' , _l('axios_template'))]);
	    	}
	    }

	    public function deleteTemplate($id = ''){
	    	$res = $this->axios_template_model->deleteTemplate($id);
	    	if($res){
	    		echo json_encode(['success' => true , 'message' => _l('deleted' , _l('axios_template'))]);
	    	}
	    }

	    public function getTemplate($id = ''){
	    	$res = $this->axios_template_model->getTemplateDetails($id);
	    	if($res){
	    		echo json_encode($res);
	    	}
	    }
	}





	/* End of file Axios_template.php */