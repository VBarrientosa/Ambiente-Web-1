<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
    // params
    // load data
		$this->load->view('user/login');
  }

	public function register()
	{
		$this->load->view('user/register');
	}

	/**
	 * Authenticates a user
	 */
	public function authenticate()
	{
		// get username and password
		$pass = $this->input->post('password');
		$user = $this->input->post('username');

		// check the database with that information
		$authUser = $this->user_model->authenticate($user, $pass);
		// return error or redirect to landing page
		if ($authUser) {
			echo "Welcome {$authUser->name}";
		} else {
			echo "redirect a login";
		}
	}
}
