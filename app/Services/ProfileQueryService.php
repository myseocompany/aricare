<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class ProfileQueryService
{
    public function applySearch(Builder $query, array $columns, string $search): Builder
    {
        return $query->where(function (Builder $q) use ($columns, $search) {
            foreach ($columns as $field) {
                if (str_contains($field, 'users.')) {
                    // Búsqueda en relaciones
                    $relationField = str_replace('users.', '', $field);
                    $q->orWhereHas('user', function ($userQuery) use ($relationField, $search) {
                        $userQuery->where($relationField, 'like', "%{$search}%");
                    });
                } else {
                    $q->orWhere($field, 'like', "%{$search}%");
                }
            }
        });
    }
}
