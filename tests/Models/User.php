<?php

namespace Ocus\LaravelLaunchDarkly\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LaunchDarkly\LDUser;
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
     * @return LDUser
     *
     * @see \LaunchDarkly\LDUserBuilder
     * @link https://docs.launchdarkly.com/sdk/features/user-config#php
     */
    public function getLaunchDarklyUserAttribute(): LDUser
    {
        return new LDUser(
            key: $this->getKey(),
            secondary: self::class,
            email: $this->email,
            name: $this->name
        );
    }
}
