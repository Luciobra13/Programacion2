<?php

class Autenticacion
{
    /**
     * @var Usuario
     */
    protected $usuario;

    /**
     * @param string $email
     * @param string $password
     * @return bool - 
     */
    public function iniciarSesion(string $email, string $password): bool
    {
        $this->usuario = (new Usuario())->traerPorEmail($email);
        if($this->usuario === null) {
            return false;
        }

        if(!password_verify($password, $this->usuario->getPassword())) {
            
        }

        $this->autenticarUsuario($this->usuario);
        return true;
        
    }

    /**
     * @param Usuario $usuario
     */
    public function autenticarUsuario(Usuario $usuario)
    {
      $_SESSION['id'] = $usuario->getUsuarioId();
    }

    public function cerrarSesion()
    {
        unset($_SESSION['id']);
    }

    /**
     * @return bool
     */
    public function estaAutenticado(): bool
    {
        return isset($_SESSION['id']);
    }
}
