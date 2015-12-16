<?php

return [

    ///////////////////////////
    // Titles
    ///////////////////////////

    'signup_browser_title'      			            => 'Crea tu cuenta',
    'signup_panel_title'        			            => 'Crea tu cuenta',

    'login_browser_title'                               => 'Ingresa con tu cuenta',
    'login_panel_title'                                 => 'Ingresa con tu cuenta',

    'password_reset_request_browser_title'              => 'Restablece tu Contraseña',
    'password_reset_request_panel_title'                => 'Restablece tu Contraseña',

    'password_reset_browser_title'                      => 'Crea una nueva Contraseña',
    'password_reset_panel_title'                        => 'Crea una nueva Contraseña',
    'password_reset_invalid_token_browser_title'        => 'Token Inválido',
    'password_reset_invalid_token_body_title'           => 'Token Inválido',

    ///////////////////////////
    // Form Fields
    ///////////////////////////

    'name_label'                			            => 'Nombre',
    'name_placeholder'          			            => '',

    'username_label'            			            => 'Usuario',
    'username_placeholder'      			            => '',

    'email_label'               			            => 'Correo',
    'email_placeholder'         			            => '',

    'password_label'            			            => 'Contraseña',
    'password_placeholder'      			            => '',

    'password_confirmation_label'                       => 'Confirma tu Contraseña',
    'password_confirmation_placeholder'                 => '',

    ///////////////////////////
    // Texts
    ///////////////////////////

    'accept_disclaimer_text'				            => 'He leído, entendido y aceptado los <a href=":tos_url" target="_blank">Términos y Condiciones de Uso</a> y las <a href=":privacy_url">Políticas de Privacidad</a> de :app_name',
    'login_max_attemps_exceeded'                        => 'Haz alcanzado el máximo número de intentos. Por favor prueba de nuevo en algunos instantes.',
    'remember_me_text'                                  => 'Mantenerme conectado',
    'password_reset_request_text'                       => 'Ingresa la dirección de correo con la que te registraste y te enviaremos las instrucciones para poder restablecer tu contraseña.',
    'password_reset_request_email_sent_text'            => 'Ya hemos enviado las instrucciones para que puedas restablecer tu contraseña al correo que nos has indicado:',
    'password_reset_request_email_sent_hint_text'       => 'Si luego de unos segundos no has recibido el correo, revisa tu casilla de correo no deseado (spam).',
    'password_reset_request_max_attemps_exceeded'       => 'Haz alcanzado el máximo número de intentos. Por favor prueba de nuevo en algunos instantes.',
    'password_reset_text'                               => 'Has comprobado tu identidad. Ahora crea una nueva contraseña para tu cuenta y podrás ingresar.',
    'password_reset_token_invalid_text'                 => 'El token que estás utilizando no es válido o ha expirado. De todas formas, puedes solicitar restablecer tu contraseña nuevamente.',

    ///////////////////////////
    // Buttons
    ///////////////////////////

    'signup_btn'							            => 'Crear mi cuenta',
    'login_btn'                                         => 'Ingresar',
    'password_reset_btn'                                => 'Restablecer',

    ///////////////////////////
    // Call to Action
    ///////////////////////////

    'login_call_to_action'					            => '¿Ya tienes una cuenta? Ingresa aquí',
    'signup_call_to_action'                             => '¿No tienes una cuenta? Crea una aquí',
    'reset_password_call_to_action'                     => '¿Olvidaste tu Contraseña?',
    'reset_password_call_to_action_alternative'         => 'Restablece tu Contraseña',

    ///////////////////////////
    // Alerts
    ///////////////////////////

    'signup_success_alert'                              => 'Se ha creado tu cuenta correctamente. ¡Bienvenido!',
    'logout_success_alert'                              => 'Has cerrado la sesión correctamente.',
    'password_reset_success_alert'                      => 'Has restablecido tu contraseña correctamente',

    ///////////////////////////
    //Validation Errors
    ///////////////////////////

    'accept_disclaimer_error'                           => 'Para poder hacer uso de la plataforma debes aceptar los Términos y Condiciones de Uso y la Política de Privacidad',
    'email_error_unique'                                => 'Este Correo ya está registrado',
    'email_error_exists'                                => 'Este Correo no se encuentra registrado',
    'email_error_login_attempt'                         => 'Los datos de acceso no son válidos',
    'username_error_regex'                              => 'Sólo puedes usar números, minúsculas (alfabeto inglés) y guión bajo',
    'username_error_unique'                             => 'Este Usuario ya se encuentra en uso',

    ///////////////////////////
    // Emails
    ///////////////////////////

    'password_reset_request_email_title'                => 'Has solicitado restablecer la Contraseña',
    'password_reset_request_email_subject'              => 'Restablecer Contraseña',
    'password_reset_request_email_text'                 => 'Para poder restablecer tu contraseña, simplemente haz click en el siguiente enlace:',
    'password_reset_request_email_no_request_text'      => 'Si nos has solicitado restablecer tu contraseña, no te preocupes, puedes ignorar este correo, no realizaremos ningún cambio en tu cuenta.',


];
