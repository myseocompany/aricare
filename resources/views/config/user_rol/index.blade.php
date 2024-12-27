<div class="row">
	<div class="form-group col-md-5">
		<div id="modules"></div>
	</div>
</div>
<div class="table-responsive-sm">
	<table class="table" id="table">
		<thead>
			<tr>
				<th></th>
				<th>Module</th>
				<th>Create</th>
				<th>Read</th>
				<th>Update</th>
				<th>Delete</th>
				<th>List</th>
			</tr>
		</thead>
		<tbody>
			@foreach($role_modules as $item)
			<tr>
				<td>{{$item->role->name}}</td>
				<td>{{$item->module->name}}</td>

				<td>
					@if($item->created == 1)
						<div>
							<input checked="" class="switch" type="checkbox" id="isCheckedClass_created_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_created{{$item->role_id}}_{{$item->module_id}}">
						</div>
					@else
						<div>
							<input class="switch" type="checkbox" id="isCheckedClass_created_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_created{{$item->role_id}}_{{$item->module_id}}">
						</div>	
					@endif
				</td>
				<td>
					@if($item->readed == 1)
						<div>
							<input checked="" class="switch" type="checkbox" id="isCheckedClass_readed_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_readed{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'readed');" value="1">
						</div>
					@else
						<div>
							<input class="switch" type="checkbox" id="isCheckedClass_readed_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_readed{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'readed');" value="">
						</div>	
					@endif
				</td>
				<td>
					@if($item->updated == 1)
						<div>
							<input checked="" class="switch" type="checkbox" id="isCheckedClass_updated_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_updated{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'updated');" value="1">
						</div>
					@else
						<div>
							<input class="switch" type="checkbox" id="isCheckedClass_updated_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_updated{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'updated');" value="">
						</div>	
					@endif
				</td>
				<td>
					@if($item->deleted == 1)
						<div>
							<input checked="" class="switch" type="checkbox" id="isCheckedClass_deleted_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_deleted{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'deleted');" value="1">
						</div>
					@else
						<div>
							<input class="switch" type="checkbox" id="isCheckedClass_deleted_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_deleted{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'deleted');" value="">
						</div>	
					@endif
				</td>
				<td>
					@if($item->list == 1)
						<div>
							<input checked="" class="switch" type="checkbox" id="isCheckedClass_list_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_list{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'list');" value="1">
						</div>
					@else
						<div>
							<input class="switch" type="checkbox" id="isCheckedClass_list_{{$item->role_id}}{{$item->module_id}}" name="isCheckedClass_list{{$item->role_id}}_{{$item->module_id}}" onchange="changePermission({{$item->role_id}},{{$item->module_id}}, 'list');" value="">
						</div>	
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
		
	</table>
</div>