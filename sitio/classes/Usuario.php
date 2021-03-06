<?php

class Usuario
{
    /**
     * @var int
     */
    protected $usuario_id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @param string $email
     * @return Usuario|null
     */
    public function traerPorEmail(string $email): ?Usuario
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM usuarios
                  WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $usuario = $stmt->fetch();

        if(!$usuario) {
            return null;
        }

        return $usuario;
    }
    

    /**
     * @var int
     */
    protected $roles_id;

    /**
     * @return int
     */
    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    /**
     * @param int $usuario_id
     */
    public function setUsuarioId(int $usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getRolFk(): int
    {
        return $this->roles_id;
    }

    /**
     * @param int $roles_id
     */
    public function setRolFk(int $roles_id): void
    {
        $this->roles_id = $roles_id;
    }
}
