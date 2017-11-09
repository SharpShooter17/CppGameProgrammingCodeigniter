
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');		
		$this->load->library('template');
		$this->load->model('baza');
    }
    
	public function index()
	{
            //$this->load->model('baza');
                     
            $data['logged'] = $this->session->userdata('logged_in');
			if ($data['logged'])
			{
				$res = $this->baza->get_role($this->session->userdata('user_id'));
				$data['user_role'] = $res[0]->rola_id;
			}
			
			$this->template->write('title', 'O mnie - C++ Game Programming');
			$this->template->write_view('menu', 'menu', $data);
			$this->template->write_view('content', 'welcome');
			$this->template->write_view('footer', 'footer');
			$this->template->render();
	}
}
?>