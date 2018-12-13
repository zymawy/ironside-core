<?php

namespace Zymawy\Ironside\Models;

use Zymawy\Ironside\Models\Traits\UserAdmin;
use Zymawy\Ironside\Models\Traits\UserHelper;
use Zymawy\Ironside\Models\Traits\UserRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
class IronsideUser extends Authenticatable
{
    use Notifiable, SoftDeletes, UserHelper,LaratrustUserTrait;

}
