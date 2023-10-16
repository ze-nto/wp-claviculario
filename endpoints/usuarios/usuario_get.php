<?php
require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");
require_once(ABSPATH . "wp-content/themes/api/models/user_model.php");


function api_usuario_get ($request) {
  $user = wp_get_current_user();
  $user_id = $user->ID;
  $user_cap = current_user_can('list_users');
  $email = sanitize_email($request['email']);

  if($user_cap) {
    if($email) {
      $response = user_model(get_user_by('email', $email));
    }else{
      $response = user_model($user);
    }
  }else {
    $response = lancar_erro('permissao');
  }

  return rest_ensure_response($response);
}


?>