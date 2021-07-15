<?php


namespace RotateApp\Backoffice\Vehicles\Domain;


class Vehicle
{

    private int $id;

    private string $nombre;

    private string $marca;

    private string $modelo;

    private $entrada;

    private $salida;

    /**
     * Vehicle constructor.
     * @param int $id
     * @param string $nombre
     * @param string $marca
     * @param string $modelo
     * @param $entrada
     * @param $salida
     */
    public function __construct(int $id, string $nombre, string $marca, string $modelo, $entrada, $salida)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->entrada = $entrada;
        $this->salida = $salida;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @return string
     */
    public function getModelo(): string
    {
        return $this->modelo;
    }

    /**
     * @return mixed
     */
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * @return mixed
     */
    public function getSalida()
    {
        return $this->salida;
    }


}