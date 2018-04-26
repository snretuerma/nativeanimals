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
use App\Models\Generation;
use App\Models\Line;
use App\Models\Pen;
use App\Models\Family;


class UsersTableSeeder extends Seeder
{

    public function createProperty($propname, $propfname, $propdesc)
    {
      $property = new Property;
      $property->name = $propname;
      $property->fname = $propfname;
      $property->description = $propdesc;
      $property->save();

      return;
    }

    public function addAnimalProperty($animalid, $propid, $value, $date)
    {
      $aniprop = new AnimalProperty;
      $aniprop->animal_id = $animalid;
      $aniprop->property_id = $propid;
      $aniprop->value = $value;
      $aniprop->date_collected = $date;
      $aniprop->save();

      return;
    }

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
        $this->createProperty("Date Hatched", "date_hatched", "Date when chicken/duck hatched");
        $this->createProperty("Individual ID", "individual_id", "Individual ID derived from the wing band");
        $this->createProperty("Generation", "generation", "Generation of the animal add");
        $this->createProperty("Line", "line", "Line property of the animal to add");
        $this->createProperty("Family", "family", "Family of the animal to add");
        $this->createProperty("Gender", "gender", "Gender of the animal to add");
        $this->createProperty("Date Transferred", "date_transferred", "Date when the animal was transferred to the replacement stocks");
        $this->createProperty("Moved to Grower Pen No.", "moved_to_pen", "Where the animal was moved after brooder stage");
        $this->command->info('Chicken individual properties seeded');

        // Phenotypic Characteristics Seeder (Chicken)
        $this->createProperty("Plummage Color", "plummage_color", "Plummage color of the chicken");
        $this->createProperty("Plummage Pattern", "plummage_pattern", "Plummage pattern of the chicken");
        $this->createProperty("Hackle Color", "hackle_color", "Hackle color of the chicken");
        $this->createProperty("Hackle Pattern", "hackle_pattern", "Hackle pattern of the chicken");
        $this->createProperty("Body Carriage", "body_carriage", "Body carriage of the chicken");
        $this->createProperty("Comb Type", "comb_type", "Comb type of the chicken");
        $this->createProperty("Comb Color", "comb_color", "Comb color of the chicken");
        $this->createProperty("Earlobe Color", "earlobe_color", "Earlobe color of the chicken");
        $this->createProperty("Iris Color", "iris_color", "Iris color of the chicken");
        $this->createProperty("Beak Color", "beak_color", "Beak color of the chicken");
        $this->createProperty("Shank Color", "shank_color", "Shank color of the chicken");
        $this->createProperty("Skin Color", "skin_color", "Skin color of the chicken");
        $this->createProperty("Other Unique Features", "other_features", "Other noticeable features of the chicken");
        $this->command->info('Chicken phenotypic properties seeded');

        // Morphometric Characteristics
        $this->createProperty("Height", "height", "Height of the chicken");
        $this->createProperty("Weight", "weight", "Weight of the chicken");
        $this->createProperty("Body Lenght", "body_lenght", "Body lenght of the chicken");
        $this->createProperty("Chest Circumference", "chest_circumference", "Chest circumference of the chicken");
        $this->createProperty("Wing Span", "wing_span", "Wing span of the chicken");
        $this->createProperty("Shank Length", "shank_length", "Shank length of the chicken");
        $this->createProperty("Date at First Lay", "date_first_lay", "Date when the chicken first layed it's eggs");
        $this->command->info('Chicken morphometric properties seeded');

        /*** Family Properties ***/
        // Family Records
        $this->createProperty("Family ID", "family_id", "Family ID of the replacement");
        $this->createProperty("Date Transferred", "date_transferred", "Date the family was transferred");
        $this->createProperty("Generation", "generation", "Generation of the family");
        $this->createProperty("Date Hatched", "date_hatched", "Date when the family hatched");
        $this->createProperty("Line", "line", "Line of the family");
        $this->createProperty("Age at First Egg", "age_first_egg", "Age of the animals when first egg was recorded");
        $this->command->info('Family Record Properties Created');
        // Daily Records
        // + Egg Production
        $this->createProperty("Date Eggs Collected", "date_eggs_collected", "Date when eggs were collected for the day");
        $this->createProperty("Total Eggs Collected", "total_eggs_collected", "Total number of eggs collected for the day");
        $this->createProperty("Total Egg Weight", "total_egg_weight", "Total weight of the eggs for the day");
        $this->createProperty("No. of Broken Eggs", "no_broken_eggs", "Count of broken eggs for the day");
        $this->createProperty("No. of Soft-shelled/Shell-less", "no_soft_shelled", "Count of eggs that are shell-less or soft-shelled");
        $this->createProperty("Feed Offered", "feed_offered", "Feed offered for the day");
        $this->createProperty("Feed Refused", "feed_refused", "Feed refused for the day");
        $this->createProperty("No. of Dead Birds", "no_dead_birds", "Number of dead birds for the day");
        $this->createProperty("No. of Culled Birds", "no_culled_birds", "No of culled birds for the day");
        $this->createProperty("Remarks", "remarks", "Remarks");
        // + Feeding Records
        $this->createProperty("Date Collected", "date_collected", "Date when feeding record was collected");
        $this->createProperty("Pen No.", "pen_no", "Pen number where the data was collected");
        $this->createProperty("Type of Feed Offered", "type_feed_offered", "Type of feed offered");
        $this->createProperty("Amount of Feed Offered", "amount_feed_offered", "Amount of feed offered for the day");
        $this->createProperty("Amount of Feed Refusal", "amount_feed_refused", "Feed refused for the day");
        $this->createProperty("Mortality", "mortality", "Number of mortality recorded for the day");
        $this->createProperty("Culled", "culled", "Number of culled animal recorded for the day");
        // + Hatchery parameters
        // $this->createProperty("Date Eggs Set", "date_eggs_set", "Date when eggs were set");
        // $this->createProperty("Generation of Parents", "generation_parents", "Generation of the parents where the eggs where collected");
        // $this->createProperty("Line", "line", "Line where the eggs were collected");
        // $this->createProperty("Family", "family", "Family where the eggs were collected");
        // $this->createProperty("Pen No.", "pen_no", "Pen number where the eggs were collected");
        // $this->createProperty("No. of Eggs Set", "no_eggs_set", "Number of eggs set in pieces");
        // $this->createProperty("No. of Fertile Eggs", "no_fertile_eggs", "Number of fertile eggs in the batch in pieces");
        // $this->createProperty("Date Hatched", "date_hatched", "Date when eggs hatched");
        // $this->createProperty("No. of Hatched Eggs", "no_hatched_eggs", "Number of hatched eggs in the batch");
        // $this->createProperty("Moved to Brooder Pen No.", "moved_to_pen", "Pen number where the animal was moved");
        // $this->createProperty("Remarks", "remarks", "Remarks");
        // + Feeding Performance
        $this->createProperty("Date Collected", "date_collected", "Date when data is collected");
        $this->createProperty("Pen No.", "pen_no", "Pen number where data was gathered");
        $this->createProperty("Type of Feed Offered", "type_feed_offered", "Type of feed offered");
        $this->createProperty("Amount of Feed Offered", "amount_feed_offered", "Amount of feed offered in grams");
        $this->createProperty("Amount of Feed Refusal", "amount_feed_refusal", "Amoung of feed refusal in grams");
        $this->createProperty("Mortality", "mortality", "Mortality");
        $this->createProperty("Culled", "culled", "Culled animals");
        $this->createProperty("Remarks", "remarks", "Remarks");
        // + Growth Performance
        $this->createProperty("Date_collected", "date_collected", "Date when data is collected");
        $this->createProperty("Pen No.", "pen_number", "Pen number where the data is collected");
        $this->createProperty("Individual ID", "individual_id", "Individual ID of the animal");
        $this->createProperty("Gender", "gender", "Gender of the animal");
        $this->createProperty("Family", "family", "Family of the animal");
        $this->createProperty("Weight", "weight", "Weight of the animal");
        // // + Egg Quality
        // $this->createProperty("Egg Quality At", "egg_quality_at", "Egg qulaity at certain day");
        // $this->createProperty("Sample No.", "sample_no", "Sample number");
        // $this->createProperty("Generation", "generation", "Generation");
        // $this->createProperty("Line", "line", "Line");
        // $this->createProperty("Family", "family", "Family");
        // $this->createProperty("Egg Weight", "egg_weight", "Egg weight");
        // $this->createProperty("Egg Color", "egg_color", "Egg color");
        // $this->createProperty("Egg Shape", "egg_shape", "Egg shape");
        // $this->createProperty("Length", "length", "Length of egg");
        // $this->createProperty("Width", "width", "Width of egg");
        // $this->createProperty("Albumen Height", "albumen_height", "Albumen height");
        // $this->createProperty("Albumen Weight", "albumen_weight", "Albumen weight");
        // $this->createProperty("Yolk Weight", "yolk_weight", "Yolk weight");
        // $this->createProperty("Yolk Color", "yolk_color", "Yolk color");
        // $this->createProperty("Shell Weight", "shell_weight", "Shell weight");
        // $this->createProperty("Top", "top", "Top");
        // $this->createProperty("Middle", "middle", "Middle");
        // $this->createProperty("Bottom", "bottom", "Bottom");

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

        // Create Generation
        // $generation0 = new Generation;
        // $generation0->number = "0000";
        // $generation0->is_active = true;
        // $generation0->save();
        // $this->command->info('Generation 0000 seeded');

        // Add Lines to Generation
        // $line1 = new Line;
        // $line1->number = "0001";
        // $line1->generation_id = $generation0->id;
        // $line1->is_active = true;
        // $line1->save();

        // $line2 = new Line;
        // $line2->number = "0002";
        // $line2->generation_id = $generation0->id;
        // $line2->is_active = true;
        // $line2->save();
        //
        // $line3 = new Line;
        // $line3->number = "0003";
        // $line3->generation_id = $generation0->id;
        // $line3->is_active = false;
        // $line3->save();
        // $this->command->info('Lines 0001 (active), 0002 (active), 0003 (inactive) seeded');

        // Generate Pens
        // $p1 = new Pen;
        // $p1->number = "01";
        // $p1->capacity = 10;
        // $p1->current_capacity = 10;
        // $p1->save();
        //
        // $p2 = new Pen;
        // $p2->number = "02";
        // $p2->capacity = 10;
        // $p2->current_capacity = 10;
        // $p2->save();
        //
        // $p3 = new Pen;
        // $p3->number = "03";
        // $p3->capacity = 10;
        // $p3->current_capacity = 10;
        // $p3->save();
        //
        // $p4 = new Pen;
        // $p4->number = "04";
        // $p4->capacity = 10;
        // $p4->current_capacity = 10;
        // $p4->save();
        //
        // $p5 = new Pen;
        // $p5->number = "05";
        // $p5->capacity = 5;
        // $p5->current_capacity = 5;
        // $p5->save();
        // $this->command->info('Pens 01, 02, 03, 04 and 05 seeded');

        // Generate Family
        // $f1 = new Family;
        // $f1->number = "0001";
        // $f1->line_id = $line2->id;
        // $f1->is_active = true;
        // $f1->pen_id = $p5->id;
        // $f1->save();
        //
        // $f2 = new Family;
        // $f2->number = "0002";
        // $f2->line_id = $line3->id;
        // $f2->is_active = false;
        // $f2->pen_id = $p2->id;
        // $f2->save();
        //
        // $f3 = new Family;
        // $f3->number = "0003";
        // $f3->line_id = $line1->id;
        // $f3->is_active = true;
        // $f3->pen_id = $p3->id;
        // $f3->save();
        // $this->command->info('Families 0001, 0002, 0003 seeded');

        // Create Animal
        // $a1 = new Animal;
        // $a1->animaltype_id = $chicken->id;
        // $a1->farm_id = $sampleFarm->id;
        // $a1->breed_id = $darag->id;
        // $a1->status = "replacement";
        // $a1->growth = "000000";
        // $a1->pen_id = $p5->id;
        // $a1->registryid = $sampleFarm->code.'-'.'2015'.$generation0->number.$line2->number.$f1->number.'F'.'0001';
        // $a1->save();
        // $p5->current_capacity = $p5->current_capacity - 1;
        // $p5->save();
        //
        // $a2 = new Animal;
        // $a2->animaltype_id = $chicken->id;
        // $a2->farm_id = $sampleFarm->id;
        // $a2->breed_id = $darag->id;
        // $a2->status = "replacement";
        // $a2->growth = "000000";
        // $a2->pen_id = $p5->id;
        // $a2->registryid = $sampleFarm->code.'-'.'2015'.$generation0->number.$line2->number.$f1->number.'M'.'0002';
        // $a2->save();
        // $p5->current_capacity = $p5->current_capacity - 1;
        // $p5->save();
        //
        // $a3 = new Animal;
        // $a3->animaltype_id = $chicken->id;
        // $a3->farm_id = $sampleFarm->id;
        // $a3->breed_id = $darag->id;
        // $a3->status = "replacement";
        // $a3->growth = "000000";
        // $a3->pen_id = $p5->id;
        // $a3->registryid = $sampleFarm->code.'-'.'2015'.$generation0->number.$line2->number.$f1->number.'F'.'0003';
        // $a3->save();
        // $p5->current_capacity = $p5->current_capacity - 1;
        // $p5->save();
        //
        // $a4 = new Animal;
        // $a4->animaltype_id = $chicken->id;
        // $a4->farm_id = $sampleFarm->id;
        // $a4->breed_id = $darag->id;
        // $a4->status = "replacement";
        // $a4->growth = "000000";
        // $a4->pen_id = $p5->id;
        // $a4->registryid = $sampleFarm->code.'-'.'2015'.$generation0->number.$line1->number.$f3->number.'F'.'0004';
        // $a4->save();
        // $p3->current_capacity = $p3->current_capacity - 1;
        // $p3->save();
        //
        // $a5 = new Animal;
        // $a5->animaltype_id = $chicken->id;
        // $a5->farm_id = $sampleFarm->id;
        // $a5->breed_id = $darag->id;
        // $a5->status = "replacement";
        // $a5->growth = "000000";
        // $a5->pen_id = $p5->id;
        // $a5->registryid = $sampleFarm->code.'-'.'2015'.$generation0->number.$line1->number.$f3->number.'F'.'0005';
        // $a5->save();
        // $p3->current_capacity = $p3->current_capacity - 1;
        // $p3->save();
        //
        // $this->command->info('Animal 1, 2, 3, 4, 5 seeded');

        // Generate Animal Property Values
        // $this->addAnimalProperty($animalid, $propid, $value, $date);

        // Seed Group Properties

        /**********************************/
        /********** Duck Seeder ***********/
        /**********************************/

        /**********************************/
        /********** Swine Seeder **********/
        /**********************************/

    }
}
