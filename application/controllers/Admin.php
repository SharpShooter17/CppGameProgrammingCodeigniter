<?php

class admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('template');
    }
    
    private function img_upload()
    {
        $config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048 ';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';

		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('img'))
		{
            echo $this->input->post('img');
            echo $this->upload->display_errors(); die();
            return FALSE;
        }
        
        return TRUE;
    }
    
    private function file_upload()
    {
        
        $config['upload_path'] = './download/';
	$config['allowed_types'] = 'zip|rar';
	$config['max_size'] = '0';

	$this->load->library('upload', $config);

	if ( !$this->upload->do_upload('file'))
	{
            echo $this->input->post('file');
            echo $this->upload->display_errors(); die();
            return FALSE;
        }
        
        return TRUE;
    }
    
    public function index() {
        
        $this->load->helper( array( 'form', 'url' ) );      
        $this->load->model('baza');
        	
        if (!($this->session->userdata('logged_in') == TRUE))
        {	
			redirect('welcome');
        }
		else
		{
			$res = $this->baza->get_role($this->session->userdata('user_id'));
			
			if ($res[0]->rola_id != 2)
			{
				redirect('welcome');
			}
		}
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'requied');        
        $data['logged'] = $this->session->userdata('logged_in');
		if ($data['logged'])
		{
			$res = $this->baza->get_role($this->session->userdata('user_id'));
			$data['user_role'] = $res[0]->rola_id;
		}
        
		$this->template->write('title', 'Panel administratora - C++ Game Programming');
		$this->template->write_view('menu', 'menu', $data);
		$this->template->write_view('footer', 'footer');
		
        if( $this->form_validation->run() == FALSE )
        {
        	$this->template->write_view('content', 'admin_add_program_form');
        }
        else
        {
            if( $this->img_upload() && $this->file_upload() )
            {
                $this->baza->add_program($this->input->post('name'),
                                         $this->input->post('description'),
                                         $this->input->post('img'),
                                         $this->input->post('file'));
            	$this->template->write_view('content', 'register_success');
            }
            else
            {
            	$this->template->write_view('content', 'admin_add_program_form');
            }
        }
		$this->template->render();
    }    
}
