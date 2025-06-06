<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'admin',
            'lastname'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'manager'
        ]);

        //B1 Cergy
        $florian = User::create([
            'name'=>'florian',
            'lastname'=>'bounon',
            'email'=>'florian.bounon@edu.esiee-it.fr',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 1,
        ]);
        $matheo = User::create([
            'name'=>'matheo',
            'lastname'=>'lapolizia',
            'email'=>'mat958.b@gmail.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 1,
        ]);
        $shayan = User::create([
            'name'=>'shayan',
            'lastname'=>'cahelo',
            'email'=>'shayan.cahelo@edu.esiee-it.fr',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 1,
        ]);
        $estelle = User::create([
            'name'=>'estelle',
            'lastname'=>'bandhavong',
            'email'=>'e.bandhavong@outlook.fr',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 1,
        ]);

        //B1 Paris
        $roslyn = User::create([
            'name'=>'roslyn',
            'lastname'=>'durand',
            'email'=>'RoslynDurand@dayrep.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 2,
        ]);
        $aurelie = User::create([
            'name'=>'aurelie',
            'lastname'=>'sansouci',
            'email'=>'AurelieSansouci@jourrapide.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 2,
        ]);
        $stephane= User::create([
            'name'=>'stephane',
            'lastname'=>'boule',
            'email'=>'StephaneBoule@dayrep.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 2,
        ]);
        $quennel = User::create([
            'name'=>'quennel',
            'lastname'=>'riviere',
            'email'=>'QuennelRiviere@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 2,
        ]);

        //B2 Cergy
        $russell = User::create([
            'name'=>'russell',
            'lastname'=>'labbe',
            'email'=>'RussellLabbe@jourrapide.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 3,
        ]);
        $agathe = User::create([
            'name'=>'agathe',
            'lastname'=>'poisson',
            'email'=>'AgatePoisson@rhyta.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 3,
        ]);
        $donatien = User::create([
            'name'=>'donatien',
            'lastname'=>'quessy',
            'email'=>'DonatienQuessy@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 3,
        ]);
        $marphisa = User::create([
            'name'=>'marphisa',
            'lastname'=>'rossignol',
            'email'=>'MarphisaRossignol@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 3,
        ]);

        //B2 Paris
        $olympia = User::create([
            'name'=>'olympia',
            'lastname'=>'pirouet',
            'email'=>'OlympiaPirouet@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 4,
        ]);
        $melvil = User::create([
            'name'=>'melvil',
            'lastname'=>'sansouci',
            'email'=>'MelvilleSansouci@teleworm.us',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 4,
        ]);
        $christian = User::create([
            'name'=>'christian',
            'lastname'=>'talon',
            'email'=>'ChristianTalon@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 4,
        ]);
        $calandre = User::create([
            'name'=>'calandre',
            'lastname'=>'chauvet',
            'email'=>'CalandreChauvet@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 4,
        ]);

        //B3 Cergy
        $zerbino = User::create([
            'name'=>'zerbino',
            'lastname'=>'jardine',
            'email'=>'ZerbinoJardine@teleworm.us',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 5,
        ]);
        $orva = User::create([
            'name'=>'orva',
            'lastname'=>'dulin',
            'email'=>'OrvaDuLin@rhyta.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 5,
        ]);
        $albracca = User::create([
            'name'=>'albracca',
            'lastname'=>'lamy',
            'email'=>'AlbraccaLamy@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 5,
        ]);
        $alexandrin = User::create([
            'name'=>'alexandrin',
            'lastname'=>'davignon',
            'email'=>'AlexandrinDavignon@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 5,
        ]);

        //B3 Paris
        $gaetan = User::create([
            'name'=>'gaetan',
            'lastname'=>'audet',
            'email'=>'GaetanAudet@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 6,
        ]);
        $satordi = User::create([
            'name'=>'satordi',
            'lastname'=>'clavet',
            'email'=>'SatordiClavet@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 6,
        ]);
        $leroy = User::create([
            'name'=>'leroy',
            'lastname'=>'jomphe',
            'email'=>'LeroyJomphe@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 6,
        ]);
        $ancelina = User::create([
            'name'=>'ancelina',
            'lastname'=>'dagenais',
            'email'=>'AncelinaDagenais@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 6,
        ]);

        //M1 Lead Dev
        $pryor = User::create([
            'name'=>'pryor',
            'lastname'=>'langelier',
            'email'=>'PryorLangelier@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 7,
        ]);
        $clarice = User::create([
            'name'=>'clarice',
            'lastname'=>'bosse',
            'email'=>'ClariceBosse@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 7,
        ]);
        $ambra = User::create([
            'name'=>'ambra',
            'lastname'=>'mazure',
            'email'=>'AmbraMazuret@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 7,
        ]);
        $dorene = User::create([
            'name'=>'dorene',
            'lastname'=>'beaudry',
            'email'=>'DoreneBeaudry@dayrep.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 7,
        ]);

        //M2 Lead Dev
        $satordi = User::create([
            'name'=>'satordi',
            'lastname'=>'du lin',
            'email'=>'SatordiDuLin@teleworm.us',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 8,
        ]);
        $brice = User::create([
            'name'=>'brice',
            'lastname'=>'lapresse',
            'email'=>'BriceLapresse@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 8,
        ]);
        $evrard = User::create([
            'name'=>'evrard',
            'lastname'=>'levasseur',
            'email'=>'EvrardLevasseur@teleworm.us',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 8,
        ]);
        $dominic = User::create([
            'name'=>'dominic',
            'lastname'=>'demers',
            'email'=>'DominicDemers@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 8,
        ]);

        //M1 Game Dev
        $gaston = User::create([
            'name'=>'gaston',
            'lastname'=>'du trieux',
            'email'=>'GastonDuTrieux@teleworm.us',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 9,
        ]);
        $victoire = User::create([
            'name'=>'victoire',
            'lastname'=>'faubert',
            'email'=>'VictoireFaubert@rhyta.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 9,
        ]);
        $ophelia = User::create([
            'name'=>'ophelia',
            'lastname'=>'laboissoniere',
            'email'=>'OpheliaLaboissonniere@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 9,
        ]);
        $mallory = User::create([
            'name'=>'mallory',
            'lastname'=>'lamour',
            'email'=>'MalloryLamour@jourrapide.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 9,
        ]);

        //M2 Game Dev
        $gemma = User::create([
            'name'=>'gemma',
            'lastname'=>'patry',
            'email'=>'GemmaPatry@armyspy.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 10,
        ]);
        $leon = User::create([
            'name'=>'leon',
            'lastname'=>'davignon',
            'email'=>'LeonDavignon@dayrep.com',
            'password'=> Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 10,
        ]);
        $olive = User::create([
            'name'=>'olive',
            'lastname'=>'lemelin',
            'email'=>'OlivieLemelin@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 10,
        ]);
        $pierpont = User::create([
            'name'=>'pierpont',
            'lastname'=>'gervais',
            'email'=>'PierpontGervais@rhyta.com',
            'password'=>Hash::make('123456789'),
            'phone_number'=>'0120305649',
            'role'=>'student',
            'class_id' => 10,
        ]);
    }
}
