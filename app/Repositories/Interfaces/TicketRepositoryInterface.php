<?php

namespace App\Repositories\Interfaces;

use App\Models\Ticket;

interface TicketRepositoryInterface
{
    public function get($data);

    public function find(int $id);

    public function store($data);

    public function update($data, int $id);

    public function filter($data);

}
