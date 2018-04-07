<?php

namespace Tests\Feature;

use App\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalIndexTest extends TestCase
{
    use RefreshDatabase;

    private $animals;
    private $foundAnimals = 0;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testList()
    {
        $this->animals = factory(Animal::class, 11)->create();

        $this->iteratePagedListForUrl('/animal');
        $this->assertEquals($this->foundAnimals, count($this->animals));
    }

    function iteratePagedListForUrl($uri)
    {
        $response = $this->get($uri);

        $response->assertStatus(200);
        $response->assertViewHas('animals', function ($animals) {
            return $this->hasAnimals($animals);
        });

        /** @var \Illuminate\Pagination\Paginator $paginator */
        $paginator = $response->getOriginalContent()->getData()['animals'];
        $nextPageUrl = $paginator->nextPageUrl();

        if ($nextPageUrl) {
            $this->iteratePagedListForUrl($nextPageUrl);
        }
    }

    function hasAnimals($animals)
    {
        $result = true;
        foreach ($animals as $animal) {
            $contains = $this->hasAnimal($animal);
            $result = $result && $contains;
            if (!$contains) {
                break;
            }
        }
        return $result;
    }

    function hasAnimal($animal)
    {
        $contains = false;
        foreach ($this->animals as $compareAnimal) {
            $contains = self::compareAnimals($compareAnimal, $animal);
            if ($contains) {
                $this->foundAnimals++;
                break;
            }
        }

        return $contains;
    }

    static function compareAnimals($animal1, $animal2)
    {
        return $animal1->id == $animal2->id
            && $animal1->name == $animal2->name
            && $animal1->dob == $animal2->dob
            && $animal1->active == $animal2->active
            && $animal1->own == $animal2->own;
    }
}
