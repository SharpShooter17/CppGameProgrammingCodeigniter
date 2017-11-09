<?php

class register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('template');
    }

    public function index() {
        $this->load->helper(array('form', 'url'));

        if ($this->session->userdata('logged_in')) {
            redirect('welcome');
        }

        $this->load->model('baza');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
        //$data['css'] = $this->config->item('css');

        $data['logged'] = $this->session->userdata('logged_in');
		if ($data['logged'])
		{
			$res = $this->baza->get_role($this->session->userdata('user_id'));
			$data['user_role'] = $res[0]->rola_id;
		}
    	
		$this->template->write('title', 'Zarejestruj się - C++ Game Programming');
		$this->template->write_view('menu', 'menu', $data);
		$this->template->write_view('footer', 'footer');
	
        if ($this->form_validation->run() == FALSE) {
        	$this->template->write_view('content', 'register_form', $data);
        } else {
            $this->baza->add_user($this->input->post('username'), $this->input->post('email'), $this->input->post('password'));

            $this->load->library('email', array('mailtype' => 'html'));
            $this->email->from('matrixxx@cba.pl', 'SharpShooter');
            $this->email->to($this->input->post('email'));
            $this->email->subject('C++ Game Programming wita!');
            $this->email->message('<html>head></head>
<body>
    <div class="container">

        <nav class="nav navbar-default" role="navigation">
            <button type="button" class="btn btn-default navbar-btn"><a href=\'http://matrixxx.cba.pl/index.php/\'>O mnie</a></button>
            <button type="button" class="btn btn-default navbar-btn"><a href=\'http://matrixxx.cba.pl/index.php/programs/\'>Programy</a></button>
            <button type="button" class="btn btn-default navbar-btn"><a href=\'http://matrixxx.cba.pl/index.php/login/\'>Zaloguj si�</a></button>
        </nav>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">C++ Game Programming Wita!</h1>
            </div>
            <div class="panel-body">
                <h1>Witamy!</h1>
                <p>Cieszymy si�, �e do nas do��czy�e�/a�.</p>
                <p>Oto Twoje dane do logowania:</p>
                <ul>
                    <li>Has�o: '.$this->input->post('password').'</li>
                    <li>Login: '.$this->input->post('username').'</li>
                </ul>
                <p>
                    Pozdrawiamy,<br />
                    Zesp� matrixxx.cba.pl
                </p>
            </div>
            <div class="panel-footer">
                <a href=\'http://matrixxx.cba.pl/\'>matrixxx.cba.pl</a>
            </div>
        </div>
    </div>
</body>
</html>');

            $this->email->send();

            $this->template->write_view('content', 'register_success', $data);
        }
		$this->template->render();
    }

}
