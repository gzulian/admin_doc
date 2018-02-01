<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->user = $this->session->userdata('logged_in')) {
			$this->load->model('User_model');
		} else {
			redirect('Login/index', 'refresh');
		}
	}
	public function index()
	{
		$data['active'] = "users";
		$data['user']   = $this->session->userdata('logged_in');
		$data['users']  = $this->User_model->findAll();
		
		$this->load->view('header',$data);
		$this->load->view('users', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
	public function find($id)
	{
		if (!is_null($id) &&  is_numeric($id)  &&  !is_null($user = $this->User_model->findById($id)) ) {
			$response['user']     = $user->toArray();
			$response['profiles'] = $user->getPermission();
			echo json_encode($response);
		}
	}
	public function profile()
	{
		$data['user']   = $this->session->userdata('logged_in');
		$user  = $this->User_model->findById($this->user['id']);
		$data['loged']   = $user;
		$data['active'] = "users";
		if(!is_null($user) ){
			$response = array();

			if(isset($_POST['pwd1']) && isset($_POST['pwd2']) && !empty($_POST['pwd1']) && !empty($_POST['pwd2']) ){
				if($_POST['pwd1'] == $_POST['pwd2'])
				{
					$user->set('use_password',sha1($_POST['pwd1']));
					$user->save();
					$response['success'] = "Clave modificada correctamente";
				}else{
					$response['errors']   = "Las valores para su nueva clave no coinciden"; 

				}
			}
			/*
			if(isset($_REQUEST['userData'])){
				$response['errors'] = "";
				$formData['userData'] = $_REQUEST['userData']; 
				$user->setColumns($formData['userData']);
				$emptyColumns  = $user->validate();
				if(count($emptyColumns)  == 0    ){
					if(isset($_POST['pwd1']) && isset($_POST['pwd2'])){
						if($_POST['pwd1'] == $_POST['pwd2'])
						{
							$user-set('use_password',sha1($_POST['pwd1']));

						}else{
							$response['errors']   = "Las valores para su nueva clave no coinciden"; 

						}
					}
				}else{
					$response['errors']   = "Debes completar  todos los campos "; 
				}
				if(strlen($response['errors']) != 0){
					
				}
			}*/
		}else{
			redirect('login','refresh');
		}

		$data['response']  =  $response;
		$this->load->view('header',$data);
		$this->load->view('profile', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
	public function  save(){
		if(isset($_REQUEST['profile']) &&  isset($_REQUEST['userData'])){
			$formData['userData'] = $_REQUEST['userData']; 
			$formData['profiles'] = $_REQUEST['profile']; 
			if(isset($formData['userData']['use_id']) && !empty($formData['userData']['use_id']) &&  is_numeric($formData['userData']['use_id'])){
				$user  = $this->User_model->findById($formData['userData']['use_id']);
				$user->setColumns($formData['userData']);
			}else{
				$user  = $this->User_model->create($formData['userData']);
			}   
			$emptyColumns  = $user->validate();
			$response = array();

			if(count($emptyColumns)  == 0 ){
				if(count($formData['profiles'])  > 0) 
				{
					if($user->isNew()){
						$user->set('use_password',sha1(123456));
						if($user->exist()){
							$response['errors']   = "El correo ingresado ya está registrado"; 
							echo json_encode($response);
							exit();
						}
					}else{
						if(!$user->validateEmail($formData['userData']['use_email'])){
							$response['errors']   = "El correo ingresado ya está registrado"; 
							echo json_encode($response);
							exit();
						}
					}
					$user->save();
					$user->setPermissions($formData['profiles']);
					$response['success']   = "Datos actualizados correctamente"; 
				}else{
					$response['errors']   = "Debes Asignar a lo menos un perfil "; 
				}
			}else{
				$response['errors']   = "Debes completar  todos los campos "; 

			}
		}else{
			$response['errors']   = "Debes Asignar a lo menos un perfil "; 
		}
		echo json_encode($response);

	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */