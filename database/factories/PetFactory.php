<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $dogNames = [
            'Max', 'Luna', 'Rocky', 'Bella', 'Coco', 'Daisy', 'Toby', 'Lola', 'Bruno', 'Molly',
            'Zeus', 'Lucy', 'Pancho', 'Kira', 'Simba', 'Nala', 'Beto', 'Sasha', 'Thor', 'Mia',
            'Lucky', 'Maya', 'Pipo', 'Bimba', 'Duke', 'Penny', 'Cooper', 'Zoe', 'Buddy', 'Chloe',
            'Rex', 'Gala', 'Leo', 'Noa', 'Jack', 'Layla', 'Charly', 'Mika', 'Baco', 'Dina',
            'Rocco', 'Linda', 'Tito', 'Frida', 'Apolo', 'Cira', 'Dante', 'Blanca', 'Paco', 'Lua'
        ];
        $dogBreeds = ['Labrador Retriever', 'Pastor Alemán', 'Golden Retriever', 'Bulldog Francés', 'Beagle'];

        $catNames = [
            'Luna', 'Milo', 'Oliver', 'Bella', 'Leo', 'Charlie', 'Simba', 'Chloe', 'Max', 'Lily',
            'Lucy', 'Nala', 'Loki', 'Oreo', 'Coco', 'Willow', 'Mia', 'Gracie', 'Sasha', 'Kitty',
            'Shadow', 'Jasper', 'Mochi', 'Salem', 'Cleo', 'Sophie', 'Tigger', 'Smokey', 'Cookie', 'Binx',
            'Felix', 'Blue', 'Pumpkin', 'Penny', 'Pepper', 'Zoe', 'Lola', 'Boots', 'Minou', 'Gatsby',
            'Artemis', 'Ziggy', 'Mishi', 'Pantera', 'Tom', 'Garfield', 'Misifú', 'Pipo', 'Bimba', 'Kyra'
        ];
        $catBreeds = ['Persa', 'Maine Coon', 'Siamés', 'Bengala', 'Ragdoll'];

        $pigNames = [
            'Porky', 'Bacon', 'Peggy', 'Hammy', 'Peppa', 'George', 'Waddles', 'Puerqui', 'Chanchito', 'Babe',
            'Wilbur', 'Oink', 'Chuleta', 'Tocino', 'Pinky', 'Panceta', 'Gordi', 'Napoleon', 'Squealer', 'Hamilton',
            'Sir Oinksalot', 'Truffle', 'Chicharron', 'Pétalo', 'Piggley', 'Snort', 'Minnie', 'Chris P. Bacon', 'Kevin', 'Pua',
            'Petunia', 'Rosita', 'Jamón', 'Cochinito', 'Porky Jr', 'Tobby', 'Wiggles', 'Snout', 'Blossom', 'Bubbles',
            'Muddy', 'Curly', 'Piggasso', 'Hamlet', 'Sausage', 'Salami', 'Pancracio', 'Gordinflas', 'Boni', 'Pinkette'
        ];
        $pigBreeds = ['Duroc', 'Landrace', 'Yorkshire', 'Vietnamita', 'Kunekune'];

        $birdNames = [
            'Paco', 'Pichi', 'Kiko', 'Blue', 'Piolín', 'Rio', 'Lola', 'Coco', 'Pepe', 'Sky',
            'Zazu', 'Piki', 'Tico', 'Mandarina', 'Mango', 'Kiwi', 'Sunny', 'Perico', 'Charlie', 'Miki',
            'Luna', 'Piru', 'Nico', 'Pepa', 'Cielo', 'Tito', 'Roco', 'Pinto', 'Loro', 'Pajarete',
            'Iago', 'Hedwig', 'Arturito', 'Bibi', 'Chiripy', 'Goldie', 'Fénix', 'Pluma', 'Alitas', 'Jade',
            'Pocholo', 'Ringo', 'Sirenita', 'Zafiro', 'Cotorra', 'Pancracio', 'Boby', 'Pimienta', 'Curro', 'Milo'
        ];
        $birdBreeds = ['Canario Timbrado', 'Periquito Australiano', 'Ninfa Carolinas', 'Agapornis Roseicollis', 'Cacatúa Alba'];

        $kind = fake()->randomElement(['Dog', 'Cat', 'Pig', 'Bird']);

        switch ($kind) {
            case 'Dog':
                $breed = fake()->randomElement($dogBreeds);
                $name = fake()->randomElement($dogNames);
                break;
            case 'Cat':
                $breed = fake()->randomElement($catBreeds);
                $name = fake()->randomElement($catNames);
                break;
            case 'Pig':
                $breed = fake()->randomElement($pigBreeds);
                $name = fake()->randomElement($pigNames);
                break;
            case 'Bird':
                $breed = fake()->randomElement($birdBreeds);
                $name = fake()->randomElement($birdNames);
                break;
            }


        return [
            'name' => $name,
            'kind' => $kind,
            'weight' => fake()->numerify('#.#'),
            'age' => fake()->numberBetween(1,15),
            'breed' => $breed,
            'location' => fake()->city,
            'description' => fake()->sentence(5),
        ];
    }
}
