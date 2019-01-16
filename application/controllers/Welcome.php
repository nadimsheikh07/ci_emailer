<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->send();
        $this->load->view('welcome_message');
    }

    public function send() {
        $config = array();
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "nadim.sheikh.07@gmail.com";
        $config['smtp_pass'] = "";
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from('nadim.sheikh.07@gmail.com', 'nadim');
        $this->email->to('nadim.sheikh.07@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        if (!$this->email->send()):
            show_error($this->email->print_debugger());
            exit;
        endif;
    }

}
