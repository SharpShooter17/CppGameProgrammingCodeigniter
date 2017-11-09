<?php

class programs extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Baza');
        $this->load->helper('url');
        $this->load->helper('form');		
		$this->load->library('template');
    }
    
    private function add_comment()
    {
        if (!$this->session->userdata('logged_in'))
        {
        	redirect('programs');
        }
        
        $this->Baza->add_comment( $this->security->xss_clean($this->input->post('comment')), $this->input->post('id_prog'), $this->session->userdata('user_id') );
                
        redirect('programs');
    }
    
    public function index()
    {    
        $this->form_validation->set_rules('comment', 'Comment','required');
        $data['query'] = $this->Baza->get_programs();
           
        $data['comments'] = $this->Baza->get_comments_by_prog_id(1, 20);        
        $data['logged'] = $this->session->userdata('logged_in');
		if ($data['logged'])
		{
			$res = $this->Baza->get_role($this->session->userdata('user_id'));
			$data['user_role'] = $res[0]->rola_id;
		}
        
		$this->template->write('title', 'Programy - C++ Game Programming');
		$this->template->write_view('menu', 'menu', $data);
		$this->template->write_view('content', 'programs', $data);
		$this->template->write_view('footer', 'footer');
		$this->template->render();
        
        if ( $this->form_validation->run() == TRUE )
            $this->add_comment();           
    }      
}
