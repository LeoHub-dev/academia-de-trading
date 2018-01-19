<?php

        $config = array(
        'login' => array(
                array(
                        'field' => 'usuario',
                        'label' => 'Usuario',
                        'rules' => 'required|trim|noEsUnUsuarioUnico'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required'
                )  
        ),
        'registro' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|trim|esUnEmailUnico'
                ),
                array(
                        'field' => 'nombre',
                        'label' => 'Nombre',
                        'rules' => 'required',
                ),
                array(
                        'field' => 'apellido',
                        'label' => 'Apellido',
                        'rules' => 'required',
                ),
                array(
                        'field' => 'usuario',
                        'label' => 'Usuario',
                        'rules' => 'required|trim|min_length[3]|esUnUsuarioUnico',
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[3]'
                ),
                array(
                        'field' => 'confirmar_password',
                        'label' => 'Confirmar contraseña',
                        'rules' => 'trim|required|matches[password]|min_length[3]'
                ),
                array(
                        'field' => 'terminos',
                        'label' => 'Terminos y politicas',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'referido',
                        'label' => 'Referido',
                        'rules' => 'required|trim|numeric|referidoExiste',
                )

        ),
        'registro_admin' => array(
                array(
                        'field' => 'email',
                        'label' => 'Correo',
                        'rules' => 'required|valid_email|trim|esUnEmailUnico'
                ),
                array(
                        'field' => 'nombre',
                        'label' => 'Nombre',
                        'rules' => 'required',
                ),
                array(
                        'field' => 'apellido',
                        'label' => 'Apellido',
                        'rules' => 'required',
                ),
                array(
                        'field' => 'usuario',
                        'label' => 'Usuario',
                        'rules' => 'required|trim|min_length[3]|esUnUsuarioUnico',
                ),
                array(
                        'field' => 'clave',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[3]'
                )
        ),
        'editarusuario' => array(
                array(
                        'field' => 'nombre',
                        'label' => 'Nombre',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[3]'
                ),
                array(
                        'field' => 'apellido',
                        'label' => 'Apellido',
                        'rules' => 'required',
                )
        ),


          'contactos' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|trim'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Nombre',
                        'rules' => 'required',
                ),
          
              
                array(
                        'field' => 'whatsapp',
                        'label' => 'Whatsapp',
                        'rules' => 'required',
                ),


                array(
                        'field' => 'ciudad',
                        'label' => 'Ciudad',
                        'rules' => 'required',
                ),

                  array(
                        'field' => 'inversion',
                        'label' => 'Inversion',
                        'rules' => 'required',
                ),
    



        )
        );

?>