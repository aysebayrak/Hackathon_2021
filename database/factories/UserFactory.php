<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Emircan Çetin",
            'email' => "ctnemircan@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2a$12$mnRGE5nlkbkm0aBlrKAMT.eY5hkZixA.9GQOaHpD5nuo.vq42sjXq',
            'remember_token' => Str::random(10),
        ];
    }
}
