<?php

$template = get_template_directory();
require_once($template . "/cpt/chaves.php");
require_once($template . "/cpt/laboratorios.php");
require_once($template . "/cpt/registros.php");

/* ERROS */

require_once($template . "/utils/erros.php");


/* ENDPOINTS */

require_once($template . "/endpoints/usuarios/index.php");
require_once($template . "/endpoints/chaves/index.php");
require_once($template . "/endpoints/laboratorios/index.php");
require_once($template . "/endpoints/registros/index.php");



/* CONFIGURAÇÕES */

function expire_token() {
    return time() + (60 * 60 * 24);
}

add_action('jwt_auth_expire', 'expire_token');

?>