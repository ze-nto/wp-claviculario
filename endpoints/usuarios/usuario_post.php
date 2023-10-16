<?php
require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");

function api_usuario_post ($request) {
  $user_cap = current_user_can('create_users');
  // $response = '';

  if ($user_cap){
    $email = sanitize_email($request['email']);
    $senha = $request['senha']; /* A senha é sanitizada pela função wp_create_user() */
    $nome = sanitize_text_field($request['nome']);
    $tipo = sanitize_text_field($request['tipo']);
    $matricula = sanitize_text_field($request['matricula']);

    /* VERIFICA SE O USUARIO JÁ EXISTE */
    $user_exists = username_exists($email);
    $email_exists = email_exists($email);

    if(!$user_exists && !$email_exists && $email && $senha && $tipo && $matricula) {
      $user_id = wp_create_user($email, $senha, $email);
      $response = [
        'ID' => $user_id,
        'display_name' => $nome,
        'first_name' => $nome,
        'matricula' => $matricula,
        'role' => $tipo
      ];

      wp_update_user($response);
    }else {
      $response = lancar_erro('email');
    }

  }else {
      $response = lancar_erro('permissao', $user_cap);
  }

  return rest_ensure_response($response);
}
?>