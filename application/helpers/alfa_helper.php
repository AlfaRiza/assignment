<?php

function cek_login()
{

    $ci = get_instance();
    if (!$ci->session->userdata('nim')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menuId = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menuId
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }

    function check_access($role_id, $menu_id)
    {
        $ci = get_instance();

        $result = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }
}
