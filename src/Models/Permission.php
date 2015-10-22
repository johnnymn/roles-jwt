<?php

namespace Johnnymn\Sim\Roles\Models;

use Johnnymn\Sim\Roles\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Johnnymn\Sim\Roles\Traits\PermissionHasRelations;
use Johnnymn\Sim\Roles\Contracts\PermissionHasRelations as PermissionHasRelationsContract;

class Permission extends Model implements PermissionHasRelationsContract
{
    use Slugable, PermissionHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'model'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}
