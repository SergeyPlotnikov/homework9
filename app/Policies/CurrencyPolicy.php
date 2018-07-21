<?php

namespace App\Policies;

use App\User;
use App\Currency;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the currency.
     *
     * @param  \App\User $user
     * @param  \App\Currency $currency
     * @return mixed
     */
    public function view(User $user, Currency $currency)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can create currencies.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->isAdmin($user);
    }


    /**
     * Determine whether the user can delete the currency.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->isAdmin($user);
    }

    public function edit(User $user)
    {
        return $this->isAdmin($user);
    }

    public function save(User $user)
    {
        return $this->isAdmin($user);
    }

    public function update(User $user)
    {
        return $this->isAdmin($user);
    }

    public function showEditDeleteButtons(User $user)
    {
        return $this->isAdmin($user);
    }

    public function showAddButton(User $user)
    {
        return (bool)$this->isAdmin($user);
    }

    private function isAdmin(User $user)
    {
        return $user->is_admin;
    }
}
