<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of programs
 *
 * @author Bartek
 */
class rankings extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('baza');
        $this->load->helper('url');
		$this->load->library('template');
    }
    
    public function index()
    {                      
        $data['css'] = $this->config->item('css');
        $data['logged'] = $this->session->userdata('logged_in');
		if ($data['logged'])
		{
			$res = $this->baza->get_role($this->session->userdata('user_id'));
			$data['user_role'] = $res[0]->rola_id;
		}
        
        $this->template->write('title', 'O mnie - C++ Game Programming');
		$this->template->write_view('menu', 'menu', $data);
		$this->template->write_view('content', 'rankings');
		$this->template->write_view('footer', 'footer');
		$this->template->render();
    }      
	
	public function tetris()
	{
        $data['logged'] = $this->session->userdata('logged_in');
		if ($data['logged'])
		{
			$res = $this->baza->get_role($this->session->userdata('user_id'));
			$data['user_role'] = $res[0]->rola_id;
		}
		$data['query'] = $this->baza->get_tetris_table();
		
		$this->template->write('title', 'Rankingi - C++ Game Programming');
		$this->template->write_view('menu', 'menu', $data);
		$this->template->write_view('content', 'tetris', $data);
		$this->template->write_view('footer', 'footer');
		$this->template->render();
  	}
	
	public function add_record_tetris()
	{
		$this->baza->add_record_to_tetris_table($this->input->post('name'), 
												date("d-m-y"), 
												$this->input->post('time'), 
												$this->input->post('level'), 
												$this->input->post('lines'), 
												$this->input->post('scores'));
	}
}
