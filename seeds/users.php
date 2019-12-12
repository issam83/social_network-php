<?php 

require '../config/database.php';

require '../vendor/autoload.php';

$faker = Faker\Factory::create();


for ($i=0; $i <100 ; $i++) { 

    $q = $db->prepare("INSERT INTO users(name, pseudo, email, password,
    created_at, active, city, country, sex, available_for_hiring, bio) 
    VALUES(:name, :pseudo, :email, :password, :created_at, :active, :city, 
    :country, :sex, :available_for_hiring, :bio)");

$q->execute([
            'name' => $faker->unique()->name,
            'pseudo' => $faker->unique()->userName,
            'email' => $faker->unique()->email,
            'password' => password_hash('azerty', PASSWORD_BCRYPT),
            'created_at' => $faker->date(). ' ' .$faker->time(),
            'active' => 0,
            'city' => $faker->city,
            'country' => $faker->country,
            'sex' => $faker->randomElement(['H', 'F']),
            'available_for_hiring' => $faker->randomElement([0, 1]),
            'bio' => $faker->paragraph(),
        ]);
}


echo ' users added !!! ;)'


?>