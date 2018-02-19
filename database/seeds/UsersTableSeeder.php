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
use App\Models\Grouping;
use App\Models\GroupingMember;


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

        $group = new Grouping;

        /**********************************/
        /********* Chicken Seeder *********/
        /**********************************/

        // Individual Records Seeder (Chicken)
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

        $individuale8 = new Property;
        $individuale8->name = "Moved to Grower Pen No.";
        $individuale8->fname = "moved_to_pen";
        $individuale8->description = "Where the animal was moved after brooder stage";
        $individuale8->save();

        $this->command->info('Chicken individual properties seeded');

        // Phenotypic Characteristics Seeder (Chicken)
        $pheno1 = new Property;
        $pheno1->name = "Plummage Color";
        $pheno1->fname = "plummage_color";
        $pheno1->description = "Plummage color of the chicken";
        $pheno1->save();

        $pheno2 = new Property;
        $pheno2->name = "Plummage Pattern";
        $pheno2->fname = "plummage_pattern";
        $pheno2->description = "Plummage pattern of the chicken";
        $pheno2->save();

        $pheno3 = new Property;
        $pheno3->name = "Hackle Color";
        $pheno3->fname = "hackle_color";
        $pheno3->description = "Hackle color of the chicken";
        $pheno3->save();

        $pheno4 = new Property;
        $pheno4->name = "Hackle Pattern";
        $pheno4->fname = "hackle_pattern";
        $pheno4->description = "Hackle pattern of the chicken";
        $pheno4->save();

        $pheno5 = new Property;
        $pheno5->name = "Body Carriage";
        $pheno5->fname = "body_carriage";
        $pheno5->description = "Body carriage of the chicken";
        $pheno5->save();

        $pheno6 = new Property;
        $pheno6->name = "Comb Type";
        $pheno6->fname = "comb_type";
        $pheno6->description = "Comb type of the chicken";
        $pheno6->save();

        $pheno7 = new Property;
        $pheno7->name = "Comb Color";
        $pheno7->fname = "comb_color";
        $pheno7->description = "Comb color of the chicken";
        $pheno7->save();

        $pheno8 = new Property;
        $pheno8->name = "Earlobe Color";
        $pheno8->fname = "earlobe_color";
        $pheno8->description = "Earlobe color of the chicken";
        $pheno8->save();

        $pheno9 = new Property;
        $pheno9->name = "Iris Color";
        $pheno9->fname = "iris_color";
        $pheno9->description = "Iris color of the chicken";
        $pheno9->save();

        $pheno10 = new Property;
        $pheno10->name = "Beak Color";
        $pheno10->fname = "beak_color";
        $pheno10->description = "Beak color of the chicken";
        $pheno10->save();

        $pheno11 = new Property;
        $pheno11->name = "Shank Color";
        $pheno11->fname = "shank_color";
        $pheno11->description = "Shank color of the chicken";
        $pheno11->save();

        $pheno12 = new Property;
        $pheno12->name = "Skin Color";
        $pheno12->fname = "skin_color";
        $pheno12->description = "Skin color of the chicken";
        $pheno12->save();

        $pheno13 = new Property;
        $pheno13->name = "Other Unique Features";
        $pheno13->fname = "other_features";
        $pheno13->description = "Other noticeable features of the chicken";
        $pheno13->save();

        $this->command->info('Chicken phenotypic properties seeded');

        // Morphometric Characteristics
        $morpho1 = new Property;
        $morpho1->name = "Height";
        $morpho1->fname = "height";
        $morpho1->description = "Height of the chicken";
        $morpho1->save();

        $morpho2 = new Property;
        $morpho2->name = "Weight";
        $morpho2->fname = "weight";
        $morpho2->description = "Weight of the chicken";
        $morpho2->save();

        $morpho3 = new Property;
        $morpho3->name = "Body Lenght";
        $morpho3->fname = "body_lenght";
        $morpho3->description = "Body lenght of the chicken";
        $morpho3->save();

        $morpho4 = new Property;
        $morpho4->name = "Chest Circumference";
        $morpho4->fname = "chest_circumference";
        $morpho4->description = "Chest circumference of the chicken";
        $morpho4->save();

        $morpho5 = new Property;
        $morpho5->name = "Wing Span";
        $morpho5->fname = "wing_span";
        $morpho5->description = "Wing span of the chicken";
        $morpho5->save();

        $morpho6 = new Property;
        $morpho6->name = "Shank Lenghth";
        $morpho6->fname = "shank_length";
        $morpho6->description = "Shank length of the chicken";
        $morpho6->save();

        $morpho7 = new Property;
        $morpho7->name = "Date at First Lay";
        $morpho7->fname = "date_first_lay";
        $morpho7->description = "Date when the chicken first layed it's eggs";
        $morpho7->save();

        $this->command->info('Chicken morphometric properties seeded');

        // Family Properties
        $fprop1 = new Property;
        $fprop1->name = "Family ID";
        $fprop1->fname = "family_id";
        $fprop1->description = "Family ID when creating family";
        $fprop1->save();

        $fprop2 = new Property;
        $fprop2->name = "Date Transferred to Breeder Area";
        $fprop2->fname = "date_transferred";
        $fprop2->description = "Date when replacement was transferred";
        $fprop2->save();

        $fprop3 = new Property;
        $fprop3->name = "Generation";
        $fprop3->fname = "generation";
        $fprop3->description = "Generation of family created";
        $fprop3->save();

        $fprop4 = new Property;
        $fprop4->name = "Date Hatched";
        $fprop4->fname = "date_hatched";
        $fprop4->description = "Date hatched of family";
        $fprop4->save();

        $fprop5 = new Property;
        $fprop5->name = "Line";
        $fprop5->fname = "line";
        $fprop5->description = "Line of family";
        $fprop5->save();

        $fprop6 = new Property;
        $fprop6->name = "Age at First Egg";
        $fprop6->fname = "age_first_egg";
        $fprop6->description = "Age when eggs first eggs where layed";
        $fprop6->save();

        $fprop7 = new Property;
        $fprop7->name = "Pen No.";
        $fprop7->fname = "pen_no";
        $fprop7->description = "Pen no. of the family";
        $fprop7->save();


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

        $darag =  new Breed;
        $darag->breed = "DRG";
        $darag->animaltype_id = $chicken->id;
        $darag->save();

        $boholano = new Breed;
        $boholano->breed = "BHL";
        $boholano->animaltype_id = $chicken->id;
        $boholano->save();

        $zampen = new Breed;
        $zampen->breed = "ZAM";
        $zampen->animaltype_id = $chicken->id;
        $zampen->save();

        $camarines = new Breed;
        $camarines->breed = "CAM";
        $camarines->animaltype_id = $chicken->id;
        $camarines->save();

        $this->command->info('Breed seeded');

        $sampleFarm->breedable_id = $darag->id;
        $sampleFarm->save();

        $sampleFarm->users()->save($sampleUser);
        $this->command->info('User seeded');

        $sampleFarm->animaltypes()->attach($chicken->id);

        // $animal = new Animal;
        // $animalbreeder = new Animal;
        //
        // $animal->animaltype_id = $chicken->id;
        // $animal->farm_id = $sampleFarm->id;
        // $animal->breed_id = $quezon->id;
        // $animal->status = "replacement";
        // $animal->growth = 0;
        // $animal->save();
        //
        // $animalbreeder->animaltype_id = $chicken->id;
        // $animalbreeder->farm_id = $sampleFarm->id;
        // $animalbreeder->breed_id = $quezon->id;
        // $animalbreeder->status = "breeder";
        // $animalbreeder->growth = 0;
        // $animalbreeder->save();
        //
        // $this->command->info('Animal seeded');
        //
        // $animalproperty1 = new AnimalProperty;
        // $animalproperty1->animal_id = $animal->id;
        // $animalproperty1->property_id = $individuale1->id;
        // $date = new Carbon();
        // $animalproperty1->value = $date->subMonths(2)->toDateString();
        // $animalproperty1->save();
        //
        // $breederproperty1 = new AnimalProperty;
        // $breederproperty1->animal_id = $animalbreeder->id;
        // $breederproperty1->property_id = $individuale1->id;
        // $date2 = new Carbon();
        // $breederproperty1->value = $date2->subMonths(1)->toDateString();
        // $breederproperty1->save();
        //
        // $animalproperty2 = new AnimalProperty;
        // $animalproperty2->animal_id = $animal->id;
        // $animalproperty2->property_id = $individuale2->id;
        // $animalproperty2->value = "13";
        // $animalproperty2->save();
        //
        // $breederproperty2 = new AnimalProperty;
        // $breederproperty2->animal_id = $animalbreeder->id;
        // $breederproperty2->property_id = $individuale2->id;
        // $breederproperty2->value = "33";
        // $breederproperty2->save();
        //
        // $animalproperty3 = new AnimalProperty;
        // $animalproperty3->animal_id = $animal->id;
        // $animalproperty3->property_id = $individuale3->id;
        // $animalproperty3->value = "A";
        // $animalproperty3->save();
        //
        // $breederproperty3 = new AnimalProperty;
        // $breederproperty3->animal_id = $animalbreeder->id;
        // $breederproperty3->property_id = $individuale3->id;
        // $breederproperty3->value = "C";
        // $breederproperty3->save();
        //
        // $animalproperty4 = new AnimalProperty;
        // $animalproperty4->animal_id = $animal->id;
        // $animalproperty4->property_id = $individuale4->id;
        // $animalproperty4->value = "C";
        // $animalproperty4->save();
        //
        // $breederproperty4 = new AnimalProperty;
        // $breederproperty4->animal_id = $animalbreeder->id;
        // $breederproperty4->property_id = $individuale4->id;
        // $breederproperty4->value = "D";
        // $breederproperty4->save();
        //
        // $animalproperty5 = new AnimalProperty;
        // $animalproperty5->animal_id = $animal->id;
        // $animalproperty5->property_id = $individuale5->id;
        // $animalproperty5->value = "B";
        // $animalproperty5->save();
        //
        // $breederproperty5 = new AnimalProperty;
        // $breederproperty5->animal_id = $animalbreeder->id;
        // $breederproperty5->property_id = $individuale5->id;
        // $breederproperty5->value = "D";
        // $breederproperty5->save();
        //
        // $animalproperty6 = new AnimalProperty;
        // $animalproperty6->animal_id = $animal->id;
        // $animalproperty6->property_id = $individuale6->id;
        // $animalproperty6->value = "F";
        // $animalproperty6->save();
        //
        // $breederproperty6 = new AnimalProperty;
        // $breederproperty6->animal_id = $animalbreeder->id;
        // $breederproperty6->property_id = $individuale6->id;
        // $breederproperty6->value = "M";
        // $breederproperty6->save();
        //
        // $animalproperty7 = new AnimalProperty;
        // $animalproperty7->animal_id = $animal->id;
        // $animalproperty7->property_id = $individuale7->id;
        // $animalproperty7->value = $now->toDateString();
        // $animalproperty7->save();
        //
        // $breederproperty7 = new AnimalProperty;
        // $breederproperty7->animal_id = $animalbreeder->id;
        // $breederproperty7->property_id = $individuale7->id;
        // $breederproperty7->value = $now->toDateString();
        // $breederproperty7->save();
        //
        // $this->command->info('AnimalProperty seeded');
        //
        // $year = $date->subMonths(2)->year;
        // $year2 = $date2->subMonths(1)->year;
        // $animal->registryid = $sampleFarm->code."-".$year.$animalproperty3->value.$animalproperty4->value.$animalproperty5->value.$animalproperty6->value.$animalproperty2->value;
        // $animal->save();
        // $animalbreeder->registryid = $sampleFarm->code."-".$year.$breederproperty3->value.$breederproperty4->value.$breederproperty5->value.$breederproperty6->value.$breederproperty2->value;
        // $animalbreeder->save();
        // $this->command->info('Registry ID added to animal');

        // Seeding a group
        // $group->registryid = $animalbreeder->registryid;
        // $group->father_id = $animalbreeder->id;
        // $group->save();
        // $this->command->info('Group Seeded');

        // Seeding a group member
        // $breedermember = new GroupingMember;
        // $breedermember->grouping_id = $group->id;
        // $breedermember->animal_id = $animalbreeder->id;
        // $breedermember->save();
        // $this->command->info('Breeder added to Group');

        // Seed Group Properties

        /**********************************/
        /********** Duck Seeder ***********/
        /**********************************/

        /**********************************/
        /********** Swine Seeder **********/
        /**********************************/

    }
}
