<?php

require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");
require_once(ABSPATH . "wp-content/themes/api/utils/translators.php");

function api_usuario_list_get ($request) {
  
  $user = wp_get_current_user();
  $user_id = $user->ID;
  $user_cap = current_user_can('list_users');

  if($user_cap) {
    $response= [];
    $users = get_users(['fields' => 'all_with_meta']);
    foreach ($users as $key => $value) {
      $user_meta = get_user_meta($value->ID);
      $tipo = role_translator($value->roles[0]);
      array_push($response, [ 
        "ID" => $value->ID, 
        "tipo" => $tipo,
        "username" => $value->user_login,
        "email" => $value->user_email,
        "nome" => $user_meta['first_name'][0],
        "sobrenome" => $user_meta['last_name'][0],
        "matricula" => $user_meta['matricula'][0],
        "departamento" => $user_meta['departamento'][0]
      ]);
    }   
  }else {
    $response = lancar_erro('permissao');
  }

  return rest_ensure_response($response);
}


?>