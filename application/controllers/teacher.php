<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	 
 *	 
 *	  
 *	 
 *	 
 */

class Teacher extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
		$this->load->database();
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('teacher_login') == 1)
            redirect(base_url() . 'index.php?teacher/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('teacher_dashboard');
        $this->load->view('index', $page_data);
    }
    
    
    /*ENTRY OF A NEW STUDENT*/
    
    
    /****MANAGE STUDENTS CLASSWISE*****/
    function student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['religion']    = $this->input->post('religion');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['father_name'] = $this->input->post('father_name');
            $data['mother_name'] = $this->input->post('mother_name');
            $data['class_id']    = $this->input->post('class_id');
            $data['roll']        = $this->input->post('roll');
            $data['password']    = rand(1000000, 10000000);
            $this->db->insert('student', $data);
            $student_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');
            $this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?teacher/student', 'refresh');
        }
        if ($param2 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['religion']    = $this->input->post('religion');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['father_name'] = $this->input->post('father_name');
            $data['mother_name'] = $this->input->post('mother_name');
            $data['class_id']    = $this->input->post('class_id');
            $data['roll']        = $this->input->post('roll');
            
            $this->db->where('student_id', $param3);
            $this->db->update('student', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param3 . '.jpg');
            redirect(base_url() . 'index.php?teacher/student/' . $param1, 'refresh');
        } else if ($param2 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('student', array(
                'student_id' => $param3
            ))->result_array();
        } else if ($param2 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_student_id'] = $param3;
        } else if ($param2 == 'academic_result') {
            $page_data['academic_result']    = true;
            $page_data['current_student_id'] = $param3;
        }
        if ($param2 == 'delete') {
            $this->db->where('student_id', $param2);
            $this->db->delete('student');
            redirect(base_url() . 'index.php?teacher/student/' . $param1, 'refresh');
        }
        $page_data['class_id']   = $param1;
        $page_data['students']   = $this->db->get_where('student', array(
            'class_id' => $param1
        ))->result_array();
        $page_data['page_name']  = 'student';
        $page_data['page_title'] = get_phrase('manage_student');
        $this->load->view('index', $page_data);
    }
    
    /****MANAGE TEACHERS*****/
    function teacher_list($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        }
        $page_data['teachers']   = $this->db->get('teacher')->result_array();
        $page_data['page_name']  = 'teacher';
        $page_data['page_title'] = get_phrase('teacher_list');
        $this->load->view('index', $page_data);
    }
    
    
    
    /****MANAGE SUBJECTS*****/
    function subject($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            $this->db->insert('subject', $data);
            redirect(base_url() . 'index.php?teacher/subject/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            
            $this->db->where('subject_id', $param2);
            $this->db->update('subject', $data);
            redirect(base_url() . 'index.php?teacher/subject/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject', array(
                'subject_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('subject_id', $param2);
            $this->db->delete('subject');
            redirect(base_url() . 'index.php?teacher/subject/', 'refresh');
        }
        $page_data['subjects']   = $this->db->get('subject')->result_array();
        $page_data['page_name']  = 'subject';
        $page_data['page_title'] = get_phrase('manage_subject');
        $this->load->view('index', $page_data);
    }
    
    
    
    /****MANAGE EXAM MARKS*****/
    function marks($exam_id = '', $class_id = '', $subject_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = $this->input->post('exam_id');
            $page_data['class_id']   = $this->input->post('class_id');
            $page_data['subject_id'] = $this->input->post('subject_id');
            
            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0) {
                redirect(base_url() . 'index.php?teacher/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['subject_id'], 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
                redirect(base_url() . 'index.php?teacher/marks/', 'refresh');
            }
        }
        if ($this->input->post('operation') == 'update') {
            $data['mark_obtained'] = $this->input->post('mark_obtained');
            $data['attendance']    = $this->input->post('attendance');
            $data['comment']       = $this->input->post('comment');
            
            $this->db->where('mark_id', $this->input->post('mark_id'));
            $this->db->update('mark', $data);
            
            redirect(base_url() . 'index.php?teacher/marks/' . $this->input->post('exam_id') . '/' . $this->input->post('class_id') . '/' . $this->input->post('subject_id'), 'refresh');
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;
        $page_data['subject_id'] = $subject_id;
        
        $page_data['page_info'] = 'Exam marks';
        
        $page_data['page_name']  = 'marks';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('index', $page_data);
    }
    
    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
    function backup_restore($operation = '', $type = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($operation == 'create') {
            $this->crud_model->create_backup($type);
        }
        if ($operation == 'restore') {
            $this->crud_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(base_url() . 'index.php?teacher/backup_restore/', 'refresh');
        }
        if ($operation == 'delete') {
            $this->crud_model->truncate($type);
            $this->session->set_flashdata('backup_message', 'Data removed');
            redirect(base_url() . 'index.php?teacher/backup_restore/', 'refresh');
        }
        
        $page_data['page_info']  = 'Create backup / restore from backup';
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = get_phrase('manage_backup_restore');
        $this->load->view('index', $page_data);
    }
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['religion']    = $this->input->post('religion');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            
            $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
            $this->db->update('teacher', $data);
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?teacher/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('teacher', array(
                'teacher_id' => $this->session->userdata('teacher_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
                $this->db->update('teacher', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?teacher/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('teacher', array(
            'teacher_id' => $this->session->userdata('teacher_id')
        ))->result_array();
        $this->load->view('index', $page_data);
    }
    
    /**********MANAGING CLASS ROUTINE******************/
    function class_routine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['time_start'] = $this->input->post('time_start');
            $data['time_end']   = $this->input->post('time_end');
            $data['day']        = $this->input->post('day');
            $this->db->insert('class_routine', $data);
            redirect(base_url() . 'index.php?teacher/class_routine/', 'refresh');
        }
        if ($param1 == 'edit' && $param2 == 'do_update') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['time_start'] = $this->input->post('time_start');
            $data['time_end']   = $this->input->post('time_end');
            $data['day']        = $this->input->post('day');
            
            $this->db->where('class_routine_id', $param3);
            $this->db->update('class_routine', $data);
            redirect(base_url() . 'index.php?teacher/class_routine/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine', array(
                'class_routine_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_schedule_id', $param2);
            $this->db->delete('class_schedule');
            redirect(base_url() . 'index.php?teacher/class_routine/', 'refresh');
        }
        $page_data['page_name']  = 'class_routine';
        $page_data['page_title'] = get_phrase('manage_class_routine');
        $this->load->view('index', $page_data);
    }
    
    
    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('index', $page_data);
        
    }
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('index', $page_data);
        
    }
    
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);
            redirect(base_url() . 'index.php?teacher/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);
            $this->session->set_flashdata('flash_message', get_phrase('notice_updated'));
            redirect(base_url() . 'index.php?teacher/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            redirect(base_url() . 'index.php?teacher/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get('noticeboard')->result_array();
        $this->load->view('index', $page_data);
    }
    
    
    /**********MANAGE DOCUMENT / home work FOR A SPECIFIC CLASS or ALL*******************/
    function document($do = '', $document_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($do == 'upload') {
            move_uploaded_file($_FILES["userfile"]["tmp_name"], "uploads/document/" . $_FILES["userfile"]["name"]);
            $data['document_name'] = $this->input->post('document_name');
            $data['file_name']     = $_FILES["userfile"]["name"];
            $data['file_size']     = $_FILES["userfile"]["size"];
            $this->db->insert('document', $data);
            redirect(base_url() . 'admin/manage_document', 'refresh');
        }
        if ($do == 'delete') {
            $this->db->where('document_id', $document_id);
            $this->db->delete('document');
            redirect(base_url() . 'admin/manage_document', 'refresh');
        }
        $page_data['page_name']  = 'manage_document';
        $page_data['page_title'] = get_phrase('manage_documents');
        $page_data['documents']  = $this->db->get('document')->result_array();
        $this->load->view('index', $page_data);
    }
    
}
