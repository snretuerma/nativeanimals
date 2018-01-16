<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Farm;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\AnimalProperty;
use App\Models\Property;
use App\Models\Breed;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $sampleFarm = new Farm;
        $sampleFarm->name = "SampleFarm";
        $sampleFarm->code = "QUEBAIBP";
        $sampleFarm->address = "Quezon";


        $sampleUser = new User;
        $sampleUser->name = "SampleUser";
        $sampleUser->email = "sfretuerma@gmail.com";

        /**********************************/
        /**** Chicken and Ducks Seeder ****/
        /**********************************/

        // individual records form seeder
        $individuale1 = new Property;
        $individuale1->name = "Date Hatched";
        $individuale1->fname = "date_hatched";
        $individuale1->description = "Date when chicken/duck hatched";
        $individuale1->save();

        $individuale2 = new Property;
        $individuale2->name = "Individual ID";
        $individuale2->fname = "individual_id";
        $individuale2->description = "Individual ID derived from the wing band";
        $individuale2->save();

        $individuale3 = new Property;
        $individuale3->name = "Generation";
        $individuale3->fname = "generation";
        $individuale3->description = "Generation of the animal add";
        $individuale3->save();

        $individuale4 = new Property;
        $individuale4->name = "Line";
        $individuale4->fname = "line";
        $individuale4->description = "Line property of the animal to add";
        $individuale4->save();

        $individuale5 = new Property;
        $individuale5->name = "Family";
        $individuale5->fname = "family";
        $individuale5->description = "Family of the animal to add";
        $individuale5->save();

        $individuale6 = new Property;
        $individuale6->name = "Gender";
        $individuale6->fname = "gender";
        $individuale6->description = "Gender of the animal to add";
        $individuale6->save();

        $individuale7 = new Property;
        $individuale7->name = "Date Transferred";
        $individuale7->fname = "date_transferred";
        $individuale7->description = "Date when the animal was transferred to the replacement stocks";
        $individuale7->save();

        $this->command->info('Properties value seeded');

        $duck = new AnimalType;
        $chicken = new AnimalType;
        $pig = new AnimalType;
        $duck->species = "duck";
        $chicken->species = "chicken";
        $pig->species = "pig";
        $chicken->save();
        $duck->save();
        $pig->save();
        $this->command->info('Animaltypes seeded');

        $quezon = new Breed;
        $quezon->breed = "BAI";
        $quezon->animaltype_id = $chicken->id;
        $quezon->save();
        $bohol = new Breed;
        $bohol->breed = "BOHOL";
        $bohol->animaltype_id = $chicken->id;
        $bohol->save();
        $this->command->info('Breed seeded');

        $sampleFarm->breedable_id = $quezon->id;
        $sampleFarm->save();

        $sampleFarm->users()->save($sampleUser);
        $this->command->info('User seeded');

        $animal = new Animal;
        $sampleFarm->animaltypes()->attach($chicken->id);
        $animal->animaltype_id = $chicken->id;
        $animal->farm_id = $sampleFarm->id;
        $animal->breed_id = $quezon->id;
        $animal->status = "replacement";
        $animal->save();
        $this->command->info('Animal seeded');

        $animalproperty1 = new AnimalProperty;
        $animalproperty1->animal_id = $animal->id;
        $animalproperty1->property_id = $individuale1->id;
        $date = new Carbon();
        $animalproperty1->value = $date->subMonths(2)->toDateString();
        $animalproperty1->save();

        $animalproperty2 = new AnimalProperty;
        $animalproperty2->animal_id = $animal->id;
        $animalproperty2->property_id = $individuale2->id;
        $animalproperty2->value = $sampleFarm->code.'-'.$now->year.'F1233';
        $animalproperty2->save();

        $animalproperty3 = new AnimalProperty;
        $animalproperty3->animal_id = $animal->id;
        $animalproperty3->property_id = $individuale3->id;
        $animalproperty3->value = "A";
        $animalproperty3->save();

        $animalproperty4 = new AnimalProperty;
        $animalproperty4->animal_id = $animal->id;
        $animalproperty4->property_id = $individuale4->id;
        $animalproperty4->value = "C";
        $animalproperty4->save();

        $animalproperty5 = new AnimalProperty;
        $animalproperty5->animal_id = $animal->id;
        $animalproperty5->property_id = $individuale1->id;
        $animalproperty5->value = "B";
        $animalproperty5->save();

        $animalproperty6 = new AnimalProperty;
        $animalproperty6->animal_id = $animal->id;
        $animalproperty6->property_id = $individuale1->id;
        $animalproperty6->value = "F";
        $animalproperty6->save();

        $animalproperty7 = new AnimalProperty;
        $animalproperty7->animal_id = $animal->id;
        $animalproperty7->property_id = $individuale1->id;
        $animalproperty7->value = $now->toDateString();
        $animalproperty7->save();
        $this->command->info('AnimalProperty seeded');

        $animal->registryid = $animalproperty2->value ;
        $animal->save();
        $this->command->info('Registry ID added to animal');

        /**********************************/
        /**** Swine Seeder ****/
        /**********************************/

    }
}
