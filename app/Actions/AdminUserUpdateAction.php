<?php

namespace App\Actions;

class AdminUserUpdateAction
{
    public function handle($user, $data)
    {
        if (isset($data['password']) && $data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
       // $user->roles()->sync($data['roles'] ?? []);

    }

}
