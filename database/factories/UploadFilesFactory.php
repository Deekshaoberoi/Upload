<?php

namespace Database\Factories;

use App\Models\Upload_Files;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UploadFilesFactory extends Factory
{
    protected $model = Upload_Files::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'file_name' => $this->faker->word . '.' . $this->faker->fileExtension(),
            'file_path' => 'uploads/' . $this->faker->word . '.' . $this->faker->fileExtension(),
            'file_size' => $this->faker->numberBetween(1000, 2000000),
        ];
    }
}
