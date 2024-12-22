<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UserProfileList extends Component
{
    use WithPagination;

    public string $search = ''; // Búsqueda
    public int $perPage = 10; // Elementos por página
    public string $queryClass; // Clase del modelo
    public array $columns = []; // Columnas de la tabla

    protected string $paginationTheme = 'tailwind';

    #[Computed] // Propiedad computada para el query
    public function query(): Builder
    {
        return $this->queryClass::query();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $items = $this->query()
            ->where(function (Builder $q) {
                foreach (array_keys($this->columns) as $field) {
                    if (str_contains($field, 'users.')) {
                        // Búsqueda en la relación `user`
                        $relationField = str_replace('users.', '', $field);
                        $q->orWhereHas('user', function ($userQuery) use ($relationField) {
                            $userQuery->where($relationField, 'like', '%' . $this->search . '%');
                        });
                    } else {
                        // Búsqueda directa en la tabla principal
                        $q->orWhere($field, 'like', '%' . $this->search . '%');
                    }
                }
            })
            ->paginate($this->perPage);

        return view('livewire.user-profile-list', [
            'items' => $items,
            'columns' => $this->columns,
        ]);
    }
}
