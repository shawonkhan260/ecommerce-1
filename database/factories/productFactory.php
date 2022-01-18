<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(15),
            'image'=>'["1642340359above-cloud-top-view-amazing.jpg","1642340359field-nature-sky-1.jpg","164234035911018791.jpg","1642340359wallpapersden.com_76165-3840x2160.jpg","16423403595443415.jpg"]',
            'cat_id'=>'5',
            'small_description'=>$this->faker->text(50),
            'description'=>$this->faker->text(50),
            'meta_title'=>$this->faker->text(50),
            'meta_description'=>$this->faker->text(50),
            'meta_keywords'=>$this->faker->text(50),
            'original_price'=>'50',
            'selling_price'=>'40',
            'qty'=>'30',
            'tax'=>'2',
            'status'=>'1',
            'tranding'=>'1',
        ];
    }
}
