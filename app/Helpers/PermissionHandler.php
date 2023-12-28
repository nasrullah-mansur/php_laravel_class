<?php 

namespace App\Helpers;

class PermissionHandler 
{

    protected $controller_name;
    protected $permission_name;

    protected $method_name = [
        // 'method_name' => 'permission name',
        'index' => 'index',
        'create' => 'create',
        'store' => 'create',
        'edit' => 'edit',
        'update' => 'edit',
        'delete' => 'delete'
    ];

    public function __construct($controller_name, $permission_name) {
        $this->controller_name = $controller_name;
        $this->permission_name = $permission_name;
    }


    protected function givePermission($method, $permission) {
        $this->controller_name->middleware("permission:$this->permission_name $permission")->only($method);
    }

    public function only($arr) {
        $this->method_name = $arr;
        return $this;
    }

    public function except($arr) {
        // $this->method_name = $arr;
        return $this;
    }


    public function run() {
        foreach ($this->method_name as $method => $permission) {
            $this->givePermission($method, $permission);
        }
    }
}

