<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ProfileList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $query;
    public $columns;

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $items = $this->query
            ->where(function ($q) {
                foreach ($this->columns as $field => $label) {
                    $q->orWhere($field, 'like', '%' . $this->search . '%');
                }
            })
            ->paginate($this->perPage);

        return view('livewire.profile-list', [
            'items' => $items,
            'columns' => $this->columns,
        ]);
    }
}
