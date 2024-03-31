<?php

class Envio {
    private $id_paises;
    private $moneda_de_envio;
    private $cantidad_enviada;
    private $cantidad_recibida;
    private $total;
    private $tipo_de_cambio;

    public function __construct($id_paises, $moneda_de_envio, $cantidad_enviada, $cantidad_recibida, $total, $tipo_de_cambio) {
        $this->id_paises = $id_paises;
        $this->moneda_de_envio = $moneda_de_envio;
        $this->cantidad_enviada = $cantidad_enviada;
        $this->cantidad_recibida = $cantidad_recibida;
        $this->total = $total;
        $this->tipo_de_cambio = $tipo_de_cambio;
    }

    public function getIdPaises() {
        return $this->id_paises;
    }

    public function getMonedaDeEnvio() {
        return $this->moneda_de_envio;
    }

    public function getCantidadEnviada() {
        return $this->cantidad_enviada;
    }

    public function getCantidadRecibida() {
        return $this->cantidad_recibida;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getTipoDeCambio() {
        return $this->tipo_de_cambio;
    }

    public function setIdPaises($id_paises) {
        $this->id_paises = $id_paises;
    }

    public function setMonedaDeEnvio($moneda_de_envio) {
        $this->moneda_de_envio = $moneda_de_envio;
    }

    public function setCantidadEnviada($cantidad_enviada) {
        $this->cantidad_enviada = $cantidad_enviada;
    }

    public function setCantidadRecibida($cantidad_recibida) {
        $this->cantidad_recibida = $cantidad_recibida;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setTipoDeCambio($tipo_de_cambio) {
        $this->tipo_de_cambio = $tipo_de_cambio;
    }
}
?>
