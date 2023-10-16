<?php 


function lancar_erro ($tipo, $campos = [], $info = '') {
  $mensagem = '';
  $code = '';

  switch ($tipo) {
  case 'permissao':
    $mensagem = 'O usuário não possui permissão';
    $code = '401';
    break;

  case 'email':
    $mensagem = 'Email já cadastrado';
    $code = '403';
    break;

  case 'usuario':
    $mensagem = 'Nenhum usuário logado';
    $code = '401';
    break;

  case 'no_email':
    $mensagem = 'E-mail não cadastrado';
    $code = '404';
    break;
  
  case 'no_chave':
    $mensagem = 'Chave não cadastrada';
    $code = '404';
    break;
  
  case 'campo':
    $mensagem = 'Campos obrigatórios:';
    foreach ($campos as $key => $value) {
      $mensagem = $mensagem . ' [' . $value . ']' ;  
    }
    $code = '401';
    // $info = $campos;
    break;

  }
  
  return new WP_Error($code, $mensagem, ['status' => $code, 'more_info' => $info]);
}

?>