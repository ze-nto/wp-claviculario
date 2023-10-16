<?php

function role_translator($role) {
  $translated_role = '';

  switch ($role) {
    case 'administrator':
      $translated_role = 'administrador';
      break;
    case 'subscriber':
      $translated_role = 'usuário';
      break;
  }
  return $translated_role;
}


?>