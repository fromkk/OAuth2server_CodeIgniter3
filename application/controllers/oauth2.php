<?php

use OAuth2\Server;
use OAuth2\Request;
use OAuth2\Response;
use OAuth2\GrantType\UserCredentials;
use OAuth2\GrantType\RefreshToken;

class Oauth2 extends CI_Controller
{
    /* @var OAuth2\Storage\Pdo $_storage */
    protected $_storage;

    /* @var OAuth2\Server $_server */
    protected $_server;

    /* @var OAuth2\Request $_request */
    protected $_request;

    /* @var OAuth2\Response $_response */
    protected $_response;

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');

        OAuth2\Autoloader::register();
        $this->load->database();
        $config = array(
            'dsn'      => $this->db->dsn,
            'username' => $this->db->username,
            'password' => $this->db->password,
        );
        $this->_storage = new OAuth2\Storage\Pdo($config);

        $grant_types = array(
            'user_credentials' => new UserCredentials($this->_storage),
            'refresh_token'    => new RefreshToken($this->_storage, array(
                'always_issue_new_refresh_token' => TRUE,
            )),
        );

        $this->_server  = new Server($this->_storage, array(
            'enforce_state' => FALSE,
            'allow_implicit' => TRUE,
            'issuer' => $this->input->server('HTTP_HOST'),
        ), $grant_types);
        $this->_request  = Request::createFromGlobals();
        $this->_response = new Response();
    }

    public function token()
    {
        log_message('debug', print_r($this->input->get(), TRUE).' POST:'.print_r($this->input->post(), TRUE).' '.__METHOD__.':'.__LINE__);
        $this->_server->handleTokenRequest($this->_request)->send();
    }

    public function api()
    {
        $scope_required = NULL;
        if (! $this->_server->verifyResourceRequest(OAuth2\Request::createFromGlobals(), $this->_response, $scope_required))
        {
            $this->_response->send();
            return;
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode(array('oauth2' => 'OK!')));
    }

    public function api2()
    {
        $scope_required = NULL;
        if (! $this->_server->verifyResourceRequest(OAuth2\Request::createFromGlobals(), $this->_response, $scope_required))
        {
            $this->_response->send();
            return;
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode(array('oauth2' => 'OK?')));
    }
}
