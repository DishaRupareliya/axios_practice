<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
    Module Name: Axios template
    Description: this custom module is developed for This is axios template
    Version: 1.0
    Requires at least: 2.3.*
    Author: <a href="https://corbitaltechnologies.com" target="_blank">Corbital Technologies<a/>
*/

/*
* Define module name
* Module Name Must be in CAPITAL LETTERS
*/
define('AXIOS_TEMPLATE_MODULE', 'axios_template');

//get codeigniter instance
$CI = &get_instance();

/*
 *  Register activation module hook
 */
 register_activation_hook(AXIOS_TEMPLATE_MODULE, 'axios_template_module_activation_hook');
 function axios_template_module_activation_hook()
 {
    $CI = &get_instance();
    require_once __DIR__.'/install.php';
 }

/*
*  Register language files, must be registered if the module is using languages
*/
register_language_files(AXIOS_TEMPLATE_MODULE, [AXIOS_TEMPLATE_MODULE]);

    /*
     *  Load module helper file
    */
    $CI->load->helper(AXIOS_TEMPLATE_MODULE.'/axios_template');

    /*
     *  Load module Library file
    */
    $CI->load->library(AXIOS_TEMPLATE_MODULE.'/axios_template_lib');

    /*
     *  Inject css file for axios_template module
    */
    hooks()->add_action('app_admin_head', 'axios_template_add_head_components');
    function axios_template_add_head_components()
    {
        //check module is enable or not (refer install.php)
        if ('1' == get_option('axios_template_enabled')) {
            $CI = &get_instance();
            // echo '<link href="'.module_dir_url('axios_template', 'assets/css/axios_template.css').'?v='.$CI->app_scripts->core_version().'"  rel="stylesheet" type="text/css" />';
        }
    }

    /*
     *  Inject Javascript file for axios_template module
    */
    hooks()->add_action('app_admin_footer', 'axios_template_load_js');
    function axios_template_load_js()
    {
        if ('1' == get_option('axios_template_enabled')) {
            $CI = &get_instance();
            echo '<script src="'.module_dir_url('axios_template', 'assets/js/axios.min.js').'?v='.$CI->app_scripts->core_version().'"></script>';
            echo '<script src="'.module_dir_url('axios_template', 'assets/js/axios_template.js').'?v='.$CI->app_scripts->core_version().'"></script>';
        }
    }

    //inject permissions Feature and Capabilities for axios_template module

    hooks()->add_filter('staff_permissions', 'axios_template_module_permissions_for_staff');
    function axios_template_module_permissions_for_staff($permissions)
    {
        $viewGlobalName      = _l('permission_view').'('._l('permission_global').')';
        $allPermissionsArray = [
            'view'     => $viewGlobalName,
            'create'   => _l('permission_create'),
            'edit'     => _l('permission_edit'),
            'delete'   => _l('permission_delete'),
        ];
        $permissions['AXIOS_TEMPLATE'] = [
                    'name'         => _l('axios_template'),
                    'capabilities' => $allPermissionsArray,
                ];

        return $permissions;
    }

    /*
     *  Inject email template for axios_template module
    */
    hooks()->add_action('after_email_templates', 'add_email_template_axios_template');
    function add_email_template_axios_template()
    {
        $CI                        = &get_instance();
        $data['hasPermissionEdit'] = has_permission('email_templates', '', 'edit');
        $data['axios_template']          = $CI->emails_model->get([
            'type'     => 'axios_template',
            'language' => 'english',
        ]);
        $CI->load->view('axios_template/mail_lists/email_templates_list', $data, false);
    }

    /*
     *  Inject sidebar menu and links for axios_template module
    */
    hooks()->add_action('admin_init', 'axios_template_module_init_menu_items');
    function axios_template_module_init_menu_items()
    {
        $CI = &get_instance();
        if (has_permission('axios_template', '', 'view')) {
            $CI->app_menu->add_sidebar_menu_item('axios_template', [
                'slug'     => 'axios_template',
                'name'     => _l('module_name'),
                'icon'     => 'fa-brands fa-gitlab',
                'href'     => '#',
                'position' => 30,
            ]);
        }

        if (has_permission('axios_template', '', 'view')) {
            $CI->app_menu->add_sidebar_children_item('axios_template', [
                'slug'     => 'axios_template_modal',
                'name'     => _l('axios_template'),
                'href'     => admin_url('axios_template'),
                'position' => 1,
            ]);
        }
    }