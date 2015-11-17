<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initialize extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->input->is_cli_request()) {
            show_error();
        }
        $this->load->database();
    }
    public function index()
    {
        $this->db->insert('oauth_clients', array(
            'client_id'     => 'abcdefg',
            'client_secret' => 'hijklmnopqrstuvwxyz',
            'redirect_uri'  => 'http://localhost:8080/',
        ));

        $this->db->insert('oauth_users', array(
            'username'      => 'demo@timers-inc.com',
            'password'      => sha1('demo'),
            'name'          => 'DEMO',
        ));

        echo "DONE!".PHP_EOL;
    }
}
