<?php
namespace App\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App;

/**
 * 能夠被認證系統認證的Eloquent核心
 */
abstract class AuthEloquent extends Authenticatable
{
    use App\Accounts\Permission\RolePermissionTrait;
}
