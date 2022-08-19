<?php

namespace App\Repositories\Interfaces;

use App\Models\Ticket;

interface TicketRepositoryInterface
{
    public function get($take = 12);

    public function find(int $id);

    public function store($data);

    public function update($data, int $id);

    public function filter($data);

}
