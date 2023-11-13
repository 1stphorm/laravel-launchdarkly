<?php

namespace Ocus\LaravelLaunchDarkly\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaunchDarkly\LDContext;
use Ocus\LaravelLaunchDarkly\Contracts\IsLaunchDarklyUser;

class User extends Authenticatable implements IsLaunchDarklyUser
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * @return LDContext
     *
     * @see \LaunchDarkly\LDContextBuilder
     * @link https://docs.launchdarkly.com/sdk/features/user-config#php
     */
    public function getLaunchDarklyUserAttribute(): LDContext
    {
        return new LDContext(
            kind: 'User',
            key: $this->getKey(),
            name: $this->name,
            anonymous: false,
            attributes: ['email', $this->email],
            privateAttributes: null,
            multiContexts: null,
            error: null,
        );
    }
}
