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
        $date = Carbon::now();

        $sampleFarm = new Farm;
        $sampleFarm->name = "SampleFarm";
        $sampleFarm->code = "QUEBAIBP";
        $sampleFarm->address = "Quezon";


        $sampleUser = new User;
        $sampleUser->name = "SampleUser";
        $sampleUser->email = "sfretuerma@gmail.com";



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
        $quezon->breed = "BP";
        $quezon->animaltype_id = $pig->id;
        $quezon->save();
        $isabela = new Breed;
        $isabela->breed = "IP";
        $isabela->animaltype_id = $pig->id;
        $isabela->save();
        $benguet = new Breed;
        $benguet->breed = "BO";
        $benguet->animaltype_id = $pig->id;
        $benguet->save();
        $marinduque = new Breed;
        $marinduque->breed = "MP";
        $marinduque->animaltype_id = $pig->id;
        $marinduque->save();
        $this->command->info('Breed seeded');

        $sampleFarm->breedable_id = $benguet->id;
        $sampleFarm->save();

        $sampleFarm->users()->save($sampleUser);
        $this->command->info('User seeded');

        $animal = new Animal;
        $sampleFarm->animaltypes()->attach($pig->id);
        $animal->animaltype_id = $pig->id;
        $animal->farm_id = $sampleFarm->id;
        $animal->breed_id = $quezon->id;
        $animal->registryid = "QUEBAIBP-20161F1234";
        $animal->save();
        $this->command->info('Animal seeded');

        $hairtypeprop = new Property;
        $hairtypeprop->name = "Hair Type";
        $hairtypeprop->description = "Swine Hair Type";
        $hairtypeprop->save();

        $tuskprop = new Property;
        $tuskprop->name = "Tusks";
        $tuskprop->description = "Tusk Type";
        $tuskprop->save();

        $snoutprop = new Property;
        $snoutprop->name = "Snout Shape";
        $snoutprop->description = "Snout Type";
        $snoutprop->save();

        $coatprop = new Property;
        $coatprop->name = "Coat Color";
        $coatprop->description = "Coat Color";
        $coatprop->save();

        $colorpatternprop = new Property;
        $colorpatternprop->name = "Color Pattern";
        $colorpatternprop->description = "Color Pattern";
        $colorpatternprop->save();

        $headprop = new Property;
        $headprop->name = "Head Shape";
        $headprop->description = "Head Shape";
        $headprop->save();

        $skintypeprop = new Property;
        $skintypeprop->name = "Skin Type";
        $skintypeprop->description = "Skin Type";
        $skintypeprop->save();

        $eartypeprop = new Property;
        $eartypeprop->name = "Ear Type";
        $eartypeprop->description = "Ear Type";
        $eartypeprop->save();

        $earorientationprop = new Property;
        $earorientationprop->name = "Ear Orientation";
        $earorientationprop->description = "Ear Orientation";
        $earorientationprop->save();

        $tailtypeprop = new Property;
        $tailtypeprop->name = "Tail Type";
        $tailtypeprop->description = "Tail Type";
        $tailtypeprop->save();

        $backlineprop = new Property;
        $backlineprop->name = "Backline";
        $backlineprop->description = "Backline";
        $backlineprop->save();

        $othermarksprop = new Property;
        $othermarksprop->name = "Other Marks";
        $othermarksprop->description = "Other Marks";
        $othermarksprop->save();
        $this->command->info('Property seeded');

        $agefirstmateprop = new Property;
        $agefirstmateprop->name = "Age at First Mating (months)";
        $agefirstmateprop->description = "Age at first mating";
        $agefirstmateprop->save();

        $wfirstbreedprop = new Property;
        $wfirstbreedprop->name = "Body weight prior to first breeding (kg)";
        $wfirstbreedprop->description = "Body weight prior to first breeding in kilogram";
        $wfirstbreedprop->save();

        $wfinalprop = new Property;
        $wfinalprop->name = "Final weight at 8 months (kg)";
        $wfinalprop->description = "Body weight at eight months";
        $wfinalprop->save();

        $hlengthprop = new Property;
        $hlengthprop->name = "Head lenght (cm)";
        $hlengthprop->description = "Head lenght";
        $hlengthprop->save();

        $blengthprop = new Property;
        $blengthprop->name = "Body lenght (cm)";
        $blengthprop->description = "Body lenght in centimeters";
        $blengthprop->save();

        $pwidthprop = new Property;
        $pwidthprop->name = "Pelvic width (cm)";
        $pwidthprop->description = "Pelvic width in centimeters";
        $pwidthprop->save();

        $hgirthprop = new Property;
        $hgirthprop->name = "Hearth girth (cm)";
        $hgirthprop->description = "Hearth girth in centimeters";
        $hgirthprop->save();

        $pindexprop = new Property;
        $pindexprop->name = "Ponderal index (kg)";
        $pindexprop->description = "Ponderal index in kilogram";
        $pindexprop->save();

        $nnteatsprop = new Property;
        $nnteatsprop->name = "Number of normal teats";
        $nnteatsprop->description = "Number of normal teats";
        $nnteatsprop->save();

        $animalproperty = new AnimalProperty;
        $animalproperty->animal_id = $animal->id;
        $animalproperty->property_id = $hairtypeprop->id;
        $animalproperty->value = "Curly,Short,Dense";
        $animalproperty->save();
        $this->command->info('AnimalProperty seeded');
    }
}
