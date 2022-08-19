<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Ticket;
use App\Repositories\Interfaces\TicketRepositoryInterface;

class TicketRepository implements TicketRepositoryInterface
{

    public function get($take = 12){
        return Ticket::active()->with('category:id,name')->select('id', 'name', 'category_id')->paginate($take);
    }

    public function find($id){
        return Ticket::findOrFail($id);
    }

    public function store($data){
        return Ticket::create($data);
    }

    public function update($data, $id){
        $ticket = Ticket::findOrFail($id);

        $ticket->update($data);

        return $ticket;
    }

    public function filter($id){
//        return Ticket::findOrFail($id);
    }

}
