<?php
class baza extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }    
		
	public function add_record_to_tetris_table($username, $date, $time, $level, $lines, $scores)
	{
		$dane = array( 	'id' => '',
						'date' => $date,
						'name' => $username,
						'time' => $time,
						'level' => $level,
						'scores' => $scores,
						'lines' => $lines
		);
		
		$this->db->insert('Tetris', $dane);
	}
       
    public function add_user($username, $email, $password)
    {
        $dane = array(  'id' => '',
                        'username' => $username,
                        'email' => $email,
                        'password' => $password);
        
        $this->db->insert('users', $dane);
    }
    
    public function add_program( $name, $desc, $img_file_name, $prog_file )
    {
        $dane = array( 'id' => '',
                       'name' => $name,
                       'description' => $desc,
                       'img_path' => $img_file_name, 
                       'file_path' => $prog_file );
        
        $this->db->insert('programs', $dane);
    }
    
    public function add_comment($comment, $id_prog, $id_user)
    {
        $data = array( 'id_user' => $id_user, 'comment' => $comment, 'date' => date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']), 'id_prog' => $id_prog);
        $this->db->insert('comments', $data );
    }
            
            
    public function auth_me($user, $pass)
    {
        return $this->db->query('SELECT id FROM users WHERE username = \''.$user.'\' AND password = \''.$pass.'\'');
    }
    
    public function get_programs()
    {
        $this->db->select('*');
        $this->db->from('programs');
		$this->db->order_by('Date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_role($user_id)
    {
        $this->db->select('rola_id');
        $this->db->from('users');
        $this->db->where('users.id', $user_id);
        //$this->db->where('users.role', $user_id);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	public function get_tetris_table()
	{
		$this->db->select('*');
		$this->db->from('Tetris');
		$this->db->order_by('scores', 'desc');
		
		$query = $this->db->get();
		
		return $query->result();
	}
    
    public function get_comments_by_prog_id($from, $to)
    {
        $actual_id_prog = $from;
        
        $this->db->select_max('id');
        $this->db->from('programs');
		$results = $this->db->get()->result();
        $max_id = $results[0]->id;
       
        $query = array();
        
        for ( $i = 0; $i <= $to && $actual_id_prog <= $max_id; $actual_id_prog++ )
        {
            $sql = "SELECT id as istnieje FROM programs WHERE id = ".$actual_id_prog." ORDER BY id DESC LIMIT 1";
                       
            $id_exist = $this->db->query($sql);
			$results = $id_exist->result();
            //var_dump($id_exist->result()[0]->istnieje);
            //echo $this->db->last_query();
          
            if ( ($results[0]->istnieje == $actual_id_prog ))
            {
                $this->db->select('*');
                //$this->db->select('comment, date', 'username');
                $this->db->from('comments');
                $this->db->join('users', ' comments.id_user = users.id', 'inner');
                $this->db->where('id_prog', $actual_id_prog );
                $this->db->order_by('comments.date', 'desc'); 
                $results = $this->db->get();
                $query[$i] = $results->result();
                $i++;
            }
        }
       
       //var_dump($query);
        
        return $query;        
    }
    
}
