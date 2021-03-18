<?php

namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    /**
     * Assign a role to a user
     *
     * @param $role
     */
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::firstOrCreate(['name' => $role]);
            $this->roles()->sync($role, false);
        }
    }

    /**
     * Remove a role from a user
     *
     * @param $role
     */
    public function removeRole($role)
    {
        $role = Role::whereName($role)->first();

        if ($role) {
            $this->roles()->detach($role->id);
        }
    }

    /**
     * Does the user have a particular role?
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) return true;
        }

        return false;
    }

    /**
     * A user can have many roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

}
