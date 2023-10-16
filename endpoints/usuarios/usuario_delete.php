<?php
require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");
require_once(ABSPATH . "wp-admin/includes/user.php");

  function api_usuario_delete ($request) {
    $user_cap = current_user_can('delete_users');
    $email = $request['email'];
    $user_id = intval(get_user_by('email', $email )->ID);

    if($user_cap) {
      $email_exists = email_exists($email);

      if($email_exists) {
        wp_delete_user($user_id);
        $response = "Usuário deleteado";
      }else {
        $response = lancar_erro('no_email');
      }
      
    }else{
      $response = lancar_erro('permissao');
    }

    return rest_ensure_response($response);
  }
?>