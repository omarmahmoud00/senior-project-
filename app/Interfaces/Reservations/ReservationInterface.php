<?php

namespace App\Interfaces\Reservations;

interface ReservationInterface{

    // main operations that will be in every sector .
    public function create();
    public function update();
    public function delete();
    public function get_all();
}