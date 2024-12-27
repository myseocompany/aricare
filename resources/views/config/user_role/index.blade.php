<x-app-layout>
    <form action="{{ route('roles.change_permission') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-5">
                <div id="modules">
                    <select name="id_module" id="id_module" onchange="updateModuleId(this.value)">
                        @foreach($modules as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach    
                    </select>
                    <script>
                        let selectedModuleId = document.getElementById('id_module').value;
                    
                        function updateModuleId(moduleId) {
                            selectedModuleId = moduleId;
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Read</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>List</th>
                    </tr>
                </thead>
				<tbody>
					@foreach($roles as $role)
						<tr>
							<td>{{ $role->name }}</td>
							@foreach(['created', 'readed', 'updated', 'deleted', 'list'] as $permission)
								<td>
									<div>
										<input
											type="checkbox"
											class="switch"
											id="permission_{{ $permission }}_{{ $role->id }}"
											onchange="changePermission(this, {{ $role->id }}, '{{ $permission }}')"
											{{ $role->modules->firstWhere('id', $modules->first()->id)?->pivot->$permission ? 'checked' : '' }}
										>
									</div>
								</td>
							@endforeach
						</tr>
					@endforeach
				</tbody>
				
				
				
            </table>
        </div>
        <input type="submit">
    </form>

    <script>
        function changePermission(checkbox, roleId, permission) {
    const moduleId = document.getElementById('id_module').value;
    const value = checkbox.checked ? 1 : 0;

    fetch('/roles/permission', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            role_id: roleId,
            module_id: moduleId,
            input: permission,
            value: value
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error updating permission');
        }
        return response.json();
    })
    .then(data => {
        console.log(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


function updateModuleId(moduleId) {
    fetch(`/roles/${moduleId}/permissions`)
        .then(response => response.json())
        .then(data => {
            // Actualizar los checkboxes dinámicamente con los datos recibidos
            data.forEach(permission => {
                const checkbox = document.getElementById(`permission_${permission.type}_${permission.role_id}`);
                if (checkbox) {
                    checkbox.checked = permission.value;
                }
            });
        })
        .catch(error => console.error('Error:', error));
}
</script>
</x-app-layout>
