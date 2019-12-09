<?php

namespace App\Services;

use App\Services\Contracts\ItemServiceContract;
use App\Repositories\ItemRepository;

class ItemService implements ItemServiceContract
{
    protected $item;

    public function __construct(ItemRepository $item)
    {
        $this->item = $item;
    }

    public function all($columns = ['*'])
    {
        return $this->item->all();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->item->find($id);
    }

    public function create(array $attributes)
    {
        return $this->item->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->item->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->item->find($id);
    }
}
