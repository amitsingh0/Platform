<?php

namespace Orchid\Foundation\Http\Forms\Systems\Roles;

use Orchid\Forms\FormGroup;
use Orchid\Foundation\Core\Models\Role;
use Orchid\Foundation\Events\Systems\RolesEvent;

class RoleFormGroup extends FormGroup
{
    /**
     * @var
     */
    public $event = RolesEvent::class;

    /**
     * Description Attributes for group.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'        => 'Роли',
            'description' => 'Разделение прав доступа',
        ];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        $role = new Role();
        $roles = $role->select('name', 'slug', 'created_at')->paginate();

        return view('dashboard::container.systems.roles.grid', [
            'roles' => $roles,
        ]);
    }
}
