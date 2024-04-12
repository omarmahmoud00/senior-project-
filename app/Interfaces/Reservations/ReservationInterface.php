<?php

namespace App\Interfaces\Reservations;

interface ReservationInterface {

    // Create a new reservation
    public function create();

    // Update an existing reservation
    public function update();

    // Delete a reservation by its ID
    public function delete($id);

    // Retrieve all reservations
    public function get_all();

}
