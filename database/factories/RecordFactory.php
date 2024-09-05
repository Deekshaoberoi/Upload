<?php

namespace Database\Factories;

use App\Models\Record;
use App\Models\Upload_Files;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    protected $model = Record::class;

    public function definition()
    {
        return [
            'field1' => $this->faker->word,
            'field2' => $this->faker->word,
            'field3' => $this->faker->randomNumber(),
            'field4' => $this->faker->word,
            'upload_file_id' => Upload_Files::factory(),
        ];
    }
}
