<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Organization;

class OrganizationObserver
{
    /**
     * Handle the Organization "created" event.
     *
     * @param  \App\Models\Organization  $organization
     * @return void
     */
    public function created(Organization $organization)
    {
        $organization->uuid = Str::random(30);
        $organization->save(); 
    }
}
