<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\RoleModule;
use App\Models\Role;
use App\Models\Module;


class RoleController extends Controller {
    public function index(Request $request)
{
    $modules = Module::all();
    $roles = Role::with(['modules' => function ($query) {
        $query->withPivot('created', 'readed', 'updated', 'deleted', 'list');
    }])->get();

    return view('config.user_role.index', compact('roles', 'modules'));
}


    public function RolModuleChangePermission(Request $request)
{
    
    // Validar los datos de entrada
    $request->validate([
        'role_id' => 'required|exists:roles,id',
        'module_id' => 'required|exists:modules,id',
        'input' => 'required|in:created,readed,updated,deleted,list',
        'value' => 'required|boolean',
    ]);

    // Buscar o crear el registro en role_modules
    $model = RoleModule::firstOrNew(
        ['role_id' => $request->role_id, 'module_id' => $request->module_id]
    );

    // Asignar el valor del permiso correspondiente
    $model->{$request->input} = $request->value;
    $model->save();

    return response()->json(['message' => 'Permission updated successfully'], 200);
}

 
     public function getModules($id){
 
         $modules_from_role = RoleModule::where('role_id', $id)->get();
 
         $modules_id_from_role = array();
         foreach ($modules_from_role as $item) {
             $modules_id_from_role[] = $item->module_id;
         }
 
         $modules = Module::whereNotIn('id', $modules_id_from_role)->get();
         return $modules->toJson();
     }
 
     public function saveRoleModule($rid, $mid){
         $model = new RoleModule;
         $model->role_id = $rid;
         $model->module_id = $mid;
         $model->save();
 
         $role_module = RoleModule::join('roles', 'roles.id', 'role_modules.role_id')
                                 ->join('modules', 'modules.id', 'role_modules.module_id')
                                 ->where('role_id', $rid)
                                 ->where('module_id', $mid)
                                 ->select(DB::raw('roles.name as rol_name, modules.name as module_name'))
                                 ->first();
         //dd($role_module);
         return $role_module->toJson();
     }


     public function getRolePermissions($moduleId)
     {
         // Validar que el módulo exista
         $module = Module::findOrFail($moduleId);
     
         // Obtener todos los roles
         $roles = Role::all();
     
         // Crear una respuesta completa con valores por defecto
         $permissions = [];
         foreach ($roles as $role) {
             // Verificar si existe una entrada en role_modules para este rol y módulo
             $roleModule = RoleModule::where('role_id', $role->id)
                                     ->where('module_id', $moduleId)
                                     ->first();
     
             // Si no existe, inicializamos los valores por defecto
             $permissions[] = [
                 'role_id' => $role->id,
                 'module_id' => $moduleId,
                 'type' => 'created',
                 'value' => $roleModule ? $roleModule->created : 0,
             ];
             $permissions[] = [
                 'role_id' => $role->id,
                 'module_id' => $moduleId,
                 'type' => 'readed',
                 'value' => $roleModule ? $roleModule->readed : 0,
             ];
             $permissions[] = [
                 'role_id' => $role->id,
                 'module_id' => $moduleId,
                 'type' => 'updated',
                 'value' => $roleModule ? $roleModule->updated : 0,
             ];
             $permissions[] = [
                 'role_id' => $role->id,
                 'module_id' => $moduleId,
                 'type' => 'deleted',
                 'value' => $roleModule ? $roleModule->deleted : 0,
             ];
             $permissions[] = [
                 'role_id' => $role->id,
                 'module_id' => $moduleId,
                 'type' => 'list',
                 'value' => $roleModule ? $roleModule->list : 0,
             ];
         }
     
         // Retornar como JSON
         return response()->json($permissions);
     }
     
     

}