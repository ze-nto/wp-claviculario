<?php 
require_once(ABSPATH . "wp-content/themes/api/utils/translators.php");

function user_model ($user) {
  $tipo = role_translator($user->roles[0]);
  $response = [
    'id' => $user->ID,
    'nome' => $user->first_name,
    'sobrenome' => $user->last_name,
    'email' => $user->user_email,
    'senha' => $user->user_pass,
    'matricula' => $user->matricula,
    'departamento' => $user->departamento,
    'tipo' => $tipo
  ];
  return $response;
}

