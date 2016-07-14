<?php
		
	require_once APPPATH . 'libraries\PHPExcel-1.8\Classes\PHPExcel.php';
		
class Excel extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('excel_model', '', TRUE);
		
	}
	
	public function index() {
		
		$excel = $this->input->post('excel');
		
		if ($excel == 'upload'){
			$this->uploadExcel();
		}else if ($excel == 'backHome'){
			$this->load->view('templates/header');
			$this->load->view('home_view');
			$this->load->view('templates/footer');
		}
		else{
			$this->load->view('templates/header');
			$this->load->view('home_view');
			$this->load->view('templates/footer');
		}
			
	}
	
	public function uploadExcel(){
		$file = 'files/myExcel.xls';	//file path
		$objPHPExcel = PHPExcel_IOFactory::load($file); 	//read file from path
	
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		
		for ($row = 2; $row <= $highestRow; $row++){  		//iteration of rows
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE); //Read a row of data into an array
			
			$data['student_no'] = $rowData[0][0];  			//student record from the XLS file
			$data['first_name'] = $rowData[0][1];
			$data['last_name'] = $rowData[0][2];
			$data['course'] = $rowData[0][3];
			
			$result = $this->excel_model->check_profile($data['student_no'], $data);
			
			if ($result){
				$rowProfile = array(  
					'student_no' => $rowData[0][0], 		//student record from the XLS file
					'first_name' => $rowData[0][1],
					'last_name' => $rowData[0][2],
					'course' => $rowData[0][3]
				);
				$this->excel_model->add_profile($rowProfile);		//add active row from .xls to database
			}

		}
		
		$hist['query'] = $this->db->get('profile');  //get record from DB
		
		$this->load->view('templates/header');
		$this->load->view('excel_view', $hist);
		$this->load->view('templates/footer');
	
	}

	
}

?>