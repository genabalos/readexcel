<?php
		
		require_once APPPATH . 'libraries\PHPExcel-1.8\Classes\PHPExcel.php';
		
class Excel extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('excel_model', '', TRUE);
		
	}
	
	public function index() {
		
		$file = 'files/myExcel.xls';

		//load the excel library
		$this->load->library('excel');
		 
		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);
		 
		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		
		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {
			$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
		 
			//header will/should be in row 1 only. of course this can be modified to suit your need.
			//if ($row == 1){
				//$header[$row][$column] = $data_value;
			//}
			//else {
				$all_data[$row][$column] = $data_value;
				$profile_list = array(
					'student_no' => $all_data[$row][A],
					'first_name' => $all_data[$row][B],
					'last_name' => $all_data[$row][C],
					'course' => $all_data[$row][D]
				);
			//}
			$this->excel_model->add_profile($profile_list);
			
		}
		 
		//send the data in an array format
		//$data['header'] = $header;
		$data['values'] = $all_data;
		
		//print_r($data['header']);
		print_r($data['values']);
		print_r($row);
		print_r($column);
		
		
		if($result){
			foreach($result as $row){
			   $temporary = array(
				 'student_no' => $row->student_no,
				 'first_name' =>  $row->first_name,
				 'last_name' => $row->last_name,
				 'course' => $row->course
			   );
			}
			
		}
		
		/*$profile_list = array(
			'student_no' => "201424754",
			'first_name' => "Genifer",
			'last_name' => "Abalos",
			'course' => "ComSci"
		);*/
		
		//$this->excel_model->add_profile($profile_list);
		
		//echo $header_temp[0]['header'];

		$this->load->view('excel_view', $data);
		
		
			
	}

	
}

?>