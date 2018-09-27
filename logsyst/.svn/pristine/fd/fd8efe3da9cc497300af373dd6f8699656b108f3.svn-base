<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function checkPermission($key)
    {
        $check = true;
        if (\Auth::user() && \Auth::user()->permision()->first()) {
            $permision = \Auth::user()->permision()->first()->permision;
            if (is_array($permision) && checkArray($key, $permision)) {
                $check = true;
            } else {
                $check = false;
            }
        }

        return $check;
    }

    public function create()
    {
        //return $this->checkPermission('create_transaction');
        return true;
    }


}
