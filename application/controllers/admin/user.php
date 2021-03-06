<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management
 * Accessible only if user is admin.
 *
 * @author Marko Aleksic <iam@markoaleksic.com>
 * @copyright Copyright (c) 2013 Marko Aleksic.
 * @link https://github.com/psybaron/Unleash
 * @license https://raw.github.com/psybaron/Unleash/master/LICENSE
 * @package Unleash
 */
class User extends Admin_Controller
{
    public function index()
    {
        $this->data['users'] = $this->ion_auth->users()->result();
    }

    public function create()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('company', 'Company', 'xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'xss_clean|numeric');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

        if($this->form_validation->run())
        {
            $additionalData = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'company'    => $this->input->post('company'),
                    'phone'      => $this->input->post('phone')
                );

            if($this->ion_auth->register($this->input->post('username'),
                $this->input->post('password'), $this->input->post('email'), $additionalData))
            {
                $this->flash->success('Successfully created new record.');
                redirect('admin/user');
            }
        }
    }

    public function edit($id = false)
    {
        $this->data['user'] = $this->ion_auth->user($id)->row();

        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required|xss_clean');

        if($this->form_validation->run())
        {
            $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'company'    => $this->input->post('company'),
                    'phone'      => $this->input->post('phone'),
                );

            if ($this->input->post('password') AND !$this->ion_auth->is_admin($this->data['user']->id))
            {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

                $data['password'] = $this->input->post('password');
            }

            if($this->form_validation->run() AND $this->ion_auth->update($this->data['user']->id, $data))
            {
                $this->flash->success('Successfully updated the record.');
                redirect('admin/user');
            }
        }

        if(!$this->data['user'] OR ($this->ion_auth->is_admin($this->data['user']->id)))
        {
            show_404();
        }
    }

    public function delete($id = false)
    {
        if($user = $this->ion_auth->user($id)->row())
        {
            if(!$this->ion_auth->is_admin($user->id))
            {
                $this->ion_auth->delete_user($id);
                $this->flash->success('Successfully deleted the record.');
                redirect('admin/user');
            }
        }

        show_404();
    }
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */