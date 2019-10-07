<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventos
 *
 * @author Birra
 */
class eventos {
    private $Id_evento;
    private $Evento_nome;
    private $Data_evanto;
    private $Horario;
    private $Info;
    private $status_evento;
    
    function getId_evento() {
        return $this->Id_evento;
    }

    function getEvento_nome() {
        return $this->Evento_nome;
    }

    function getData_evanto() {
        return $this->Data_evanto;
    }

    function getHorario() {
        return $this->Horario;
    }

    function getInfo() {
        return $this->Info;
    }

    function getStatus_evento() {
        return $this->status_evento;
    }

    function setId_evento($Id_evento) {
        $this->Id_evento = $Id_evento;
    }

    function setEvento_nome($Evento_nome) {
        $this->Evento_nome = $Evento_nome;
    }

    function setData_evanto($Data_evanto) {
        $this->Data_evanto = $Data_evanto;
    }

    function setHorario($Horario) {
        $this->Horario = $Horario;
    }

    function setInfo($Info) {
        $this->Info = $Info;
    }

    function setStatus_evento($status_evento) {
        $this->status_evento = $status_evento;
    }


}
