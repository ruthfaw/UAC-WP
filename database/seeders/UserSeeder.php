<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'username' => "Andrew Kennard",
                'password' => Hash::make('Andrew123'),
                'gender' => "M",
                'profession' => "Programmer",
                "linkedIn" => "https://www.linkedin.com/in/AndrewKennard",
                "mobileNumber" => "08975678955",
                "oriImage" => "AndrewKennard.jpg",
                "image" => "AndrewKennard.jpg",
                "wallet" => "60000",
                "visibility" => true
            ],
            [
                'username' => "Juliette Evans",
                'password' => Hash::make('Juliette123'),
                'gender' => "F",
                'profession' => "Auditor",
                "linkedIn" => "https://www.linkedin.com/in/JulietteEvans",
                "mobileNumber" => "08123647637",
                'oriImage' => "JulietteEvans.jpg",
                "image" => "JulietteEvans.jpg",
                "wallet" => "30000",
                "visibility" => true
            ],
            [
                'username' => "Lily Simmons",
                'password' => Hash::make('Lily123'),
                'gender' => "F",
                'profession' => "Sales Manager",
                "linkedIn" => "https://www.linkedin.com/in/LilySimmons",
                "mobileNumber" => "08123647637",
                'oriImage' => "LilySimmons.jpg",
                "image" => "LilySimmons.jpg",
                "wallet" => "200000",
                "visibility" => true
            ],
            [
                'username' => "Andreas Jones",
                'password' => Hash::make('Andreas123'),
                'gender' => "M",
                'profession' => "Engineer",
                "linkedIn" => "https://www.linkedin.com/in/AndreasJones",
                "mobileNumber" => "08112342348",
                'oriImage' => "AndreasJones.jpg",
                "image" => "AndreasJones.jpg",
                "wallet" => "150000",
                "visibility" => true
            ],
            [
                'username' => "Evelyn Harrison",
                'password' => Hash::make('Evelyn123'),
                'gender' => "F",
                'profession' => "Doctor",
                "linkedIn" => "https://www.linkedin.com/in/AndreasJones",
                "mobileNumber" => "08457793458",
                'oriImage' => "EvelynHarrison.jpg",
                "image" => "EvelynHarrison.jpg",
                "wallet" => "300000",
                "visibility" => true
            ],
            [
                'username' => "Maggy Alison",
                'password' => Hash::make('Maggy123'),
                'gender' => "F",
                'profession' => "Designer",
                "linkedIn" => "https://www.linkedin.com/in/MaggyAlison",
                "mobileNumber" => "0845999888",
                'oriImage' => "MaggyAlison.jpg",
                "image" => "MaggyAlison.jpg",
                "wallet" => "380000",
                "visibility" => true
            ],
            [
                'username' => "Iliana Jordan",
                'password' => Hash::make('Iliana123'),
                'gender' => "F",
                'profession' => "Mediator",
                "linkedIn" => "https://www.linkedin.com/in/IlianaJordan",
                "mobileNumber" => "0845999768",
                'oriImage' => "IlianaJordan.jpg",
                "image" => "IlianaJordan.jpg",
                "wallet" => "900000",
                "visibility" => true
            ],
            [
                'username' => "Derrick Anderson",
                'password' => Hash::make('Derrick123'),
                'gender' => "M",
                'profession' => "Product Designer",
                "linkedIn" => "https://www.linkedin.com/in/DerrickAnderson",
                "mobileNumber" => "0845666777",
                'oriImage' => "DerrickAnderson.jpg",
                "image" => "DerrickAnderson.jpg",
                "wallet" => "520000",
                "visibility" => true
            ]
        ]);
    }
}
