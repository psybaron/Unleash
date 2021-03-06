<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Admini Core controller
 *
 * @author Marko Aleksic <iam@markoaleksic.com>
 * @package Unleash
 */
class Admin_Controller extends Authorized_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->ion_auth->is_admin())
        {
            redirect(config_item('loginRoute'));
        }

        //Load administration specific libraries
        $this->load->library('flash');

        //Load administration specific helpers
        $this->load->helper('language');

        //Load administration specific language files
        $this->lang->load('auth');

        //Administration default layout
        $this->layout = LAYOUTS . 'admin';
    }
}