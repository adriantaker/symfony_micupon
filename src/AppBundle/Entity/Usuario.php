<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="text")
     */
    private $direccion;

    /**
     * @var bool
     *
     * @ORM\Column(name="permiteEmail", type="boolean")
     */
    private $permiteEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaNacimiento", type="string", length=255)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=9)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroTarjeta", type="string", length=20)
     */
    private $numeroTarjeta;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ciudad")
     */
    private $ciudad;

    public function __construct(){
        $this->fechaAlta = new \DateTime();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set permiteEmail
     *
     * @param boolean $permiteEmail
     * @return Usuario
     */
    public function setPermiteEmail($permiteEmail)
    {
        $this->permiteEmail = $permiteEmail;

        return $this;
    }

    /**
     * Get permiteEmail
     *
     * @return boolean 
     */
    public function getPermiteEmail()
    {
        return $this->permiteEmail;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuario
     */
    public function setFechaAlta(\DateTime $fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaNacimiento
     *
     * @param string $fechaNacimiento
     * @return Usuario
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return string 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Usuario
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set numeroTarjeta
     *
     * @param string $numeroTarjeta
     * @return Usuario
     */
    public function setNumeroTarjeta($numeroTarjeta)
    {
        $this->numeroTarjeta = $numeroTarjeta;

        return $this;
    }

    /**
     * Get numeroTarjeta
     *
     * @return string 
     */
    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }

    /**
     * Set ciudad
     *
     * @param \AppBundle\Entity\Ciudad $ciudad
     * @return null
     */
    public function setCiudad(\AppBundle\Entity\Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * Get ciudad
     *
     * @return \AppBundle\Entity\Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * To String
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
    }
}