<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends LH_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
    	parent::__construct();

    	/*if($this->Auth_model->isLoggedIn())
        {
        	if(!$this->Auth_model->isPaid())
        	{
        		redirect('/payment' ,'refresh');
        	}
		}
        else
        {
        	redirect('/signin' ,'refresh');
        }*/

        $this->load->model('Course_model');


    }

	public function index()
	{
		$this->scope['head_title'] = 'Cursos';
		$this->scope['list_courses'] = $this->Course_model->listCoursesUser($this->session->userdata('id_usuario'));
		$this->load->view('Dashboard_view',$this->scope);
	}

	public function panel()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if($this->input->post('course_pw') == 'coursepw123')
			{
				$this->session->set_userdata('course_panel',TRUE);
			}
		}

	 	if($this->session->userdata('course_panel'))
        {
        	$this->scope['course_login'] = TRUE;
			$this->scope['head_title'] = 'Cursos';
			$this->scope['list_courses'] = $this->Course_model->listCourses();
			$this->scope['list_teachers'] = $this->Course_model->listTeachers();
			$this->load->view('course_admin_view_new',$this->scope);
		}
		else
		{
			$this->scope['course_login'] = FALSE;
			$this->load->view('course_admin_view_new',$this->scope);
		}
	}

	public function id($id_course = NULL)
	{
		$this->Course_model->setIdCourse($id_course);
		$this->Course_model->setIdUser($this->session->userdata('id_user'));
		$level_selected = (int) $this->input->get('level');
		$course_info = $this->Course_model->getCourse($id_course);

		if($course_info != NULL)
		{
			
			$participant = $this->Course_model->getParticipant();

			if(!$participant)
			{
				$participant = $this->Course_model->insertParticipant();
			}
			else
			{
				$this->Course_model->updateParticipantTime();
			}

			if(isset($level_selected) && $level_selected != "" && $participant->actual_level < $level_selected && $level_selected > 0 && $level_selected != 0)
			{
				redirect('course','refresh');
			}
			else
			{
				if(isset($level_selected) && $level_selected != "")
				{
					$this->scope['video'] = $this->Course_model->getCourseVideo($level_selected);
				}
				else
				{
					$this->scope['video'] = $this->Course_model->getCourseVideo($participant->actual_level);
				}
				
				$this->scope['participant'] = $participant;

				$this->scope['course'] = $course_info;

				$this->scope['last_level'] = $this->Course_model->getCourseLastLevel($id_course);

				$this->load->view('course_video_view_new',$this->scope);


			}

			
		}
		else
		{
			echo "error";
		}
	}

	public function verify_course($id_course = NULL)
	{
		
		if($id_course != NULL)
		{
			$this->Course_model->setIdCourse($id_course);
			$this->Course_model->setIdUser($this->session->userdata('id_user'));
			$course_info = $this->Course_model->getCourse($id_course);

			if($course_info != NULL)
			{
				
				if($this->Course_model->checkNextLevel())
				{
					response_good(false,false);
					return;
				}
				else
				{
					response_bad('Tienes que ver el video completo');
					return;
				}
			}

			response_bad('Tienes que ver el video completo');
			return;
		}
		response_bad('Tienes que ver el video completo');
		return;

	}

	public function next_level($id_course = NULL)
	{
		if($id_course != NULL)
		{
			$this->Course_model->setIdCourse($id_course);
			$this->Course_model->setIdUser($this->session->userdata('id_user'));
			$course_info = $this->Course_model->getCourse($id_course);

			if($course_info != NULL)
			{
				
				if($this->Course_model->checkNextLevel())
				{
					$this->Course_model->moveToNextLevel();
					redirect('/course/id/'.$course_info->id_course ,'refresh');
					return;
				}
				else
				{
					redirect('/course/id/'.$course_info->id_course ,'refresh');
					return;
				}
			}

			redirect('/course/id/'.$course_info->id_course ,'refresh');
			return;
		}
		redirect('/course/id/'.$course_info->id_course ,'refresh');
		return;

	}


	public function add_course()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$course_id = $this->Course_model->addCourse($this->input->post('name'),$this->input->post('course_image'),$this->input->post('teacher'));

			if($course_id)
			{
				response_good('Correcto','Curso agregado',array('id_course' => $course_id, 'data' => $this->input->post()));
				return;
			}

        }
	    
	}

	public function add_teacher()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$teacher_id = $this->Course_model->addTeacher($this->input->post('teacher'),$this->input->post('teacher_image'));

			if($teacher_id)
			{
				response_good('Correcto','Profesor/ra agregado',array('id_teacher' => $teacher_id, 'data' => $this->input->post()));
				return;
			}

        }
	    
	}



	public function add_video()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$video_id = $this->Course_model->addVideo($this->input->post('course'),$this->input->post('title'),$this->input->post('link'),$this->input->post('level'),$this->input->post('time'));

			if($video_id)
			{
				response_good('Correcto','Video agregado',array('id_video' => $video_id, 'data' => $this->input->post()));
				return;
			}

        }
	    
	}


	public function upload_img()
	{

		$config['upload_path']          = './assets/course/upload';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_ext_tolower'] = TRUE;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('imgPerfil'))
        {
                $error = array('error' => $this->upload->display_errors());

      
            echo json_encode($error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                echo json_encode($data['upload_data']['file_name']);
        }
	}



}
