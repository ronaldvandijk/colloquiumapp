<?php

namespace App\Models\Presenters;

class UserPresenter
{
    /**
     * Returns the full user name
     * @return String
     */
    public function full_name()
    {
        return $this->first_name . ' ' . $this->insertion . ' ' . $this->last_name;
    }
}
