<?php

class login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('template');
    }
    
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        
        if ($this->session->userdata('logged_in'))
        {
            redirect('welcome');
        }
        
        $this->load->model('baza');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('pass', 'password', 'trim|required');
        
        $data['logged'] = $this->session->userdata('logged_in');
		if ($data['logged'])
		{
			$res = $this->baza->get_role($this->session->userdata('user_id'));
			$data['user_role'] = $res[0]->rola_id;
		}
		
		$this->template->write('title', 'Zaloguj siê - C++ Game Programming');
		$this->template->write_view('menu', 'menu', $data);
		$this->template->write_view('footer', 'footer');        
        
        if( $this->form_validation->run() == FALSE )
        {
            $this->template->write_view('content', 'login');
        }
        else
        {
            $id = $this->baza->auth_me($this->input->post('username'), $this->input->post('pass'));
            $results = $id->result();
            if ($results[0]->id != '' )
            {
                $newdata = array(
                   'username'  => $this->input->post('username'),
                   'user_id' => $results[0]->id,
                   'logged_in' => TRUE
               );

               $this->session->set_userdata($newdata);
               
               redirect('welcome');
            }
            else
            {
                redirect('/');
            }
        }
		
		$this->template->render();
    }
    
    public function logout()
    {
        $this->load->helper('url');
        $this->session->sess_destroy();
        redirect('/');
    }
    
    
}
