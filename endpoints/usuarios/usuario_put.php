<?php

  function api_usuario_put ($request) {
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0) {
      $email = sanitize_email($request['email']);
      $senha = $request['senha']; /* A senha é sanitizada pela função wp_create_user() */
      $nome = sanitize_text_field($request['nome']);
      $tipo = sanitize_text_field($request['tipo']);

      $email_exists = email_exists($email);

      if(!$email_exists || $email_exists == $user_id) {
        $response = [
          'ID' => $user_id,
          'user_pass' => $senha,
          'user_email' => $email,
          'display_name' => $nome,
          'first_name' => $email,
        ];

        wp_update_user($response);

        update_user_meta( $user_id, 'tipo', $tipo );

      }else {
        $response = new WP_Error('email', 'Email já cadastrado', ['status' => 403] );
      }
    }else{
      $response = new WP_Error('permissao', 'Usuário não possui permissão', ['status' => 401] );
    }

    return rest_ensure_response($response);
  }
?>