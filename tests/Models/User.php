<?php

namespace Ocus\LaravelLaunchDarkly\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaunchDarkly\LDUser;
use LaunchDarkly\LDUserBuilder;
use Ocus\LaravelLaunchDarkly\Contracts\IsLaunchDarklyUser;

class User extends Model implements IsLaunchDarklyUser
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
        return (new LDUserBuilder($this->getKey()))
            ->secondary(self::class)
            ->email($this->email)
            ->name($this->name)
            ->build();
    }
}
