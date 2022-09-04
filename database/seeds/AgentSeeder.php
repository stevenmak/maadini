<?php

use App\Agents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $agent = Agents::create([
        	'prenom' => 'Steven',
            'nom' => 'MBIYA',
            'codeAgent' => 'AG001',
            'matriculeAgent' => 'MAT001',
            'genre' => 'M',
            'telephone' => '0970872897',
            'mobile' => '0892537933',
            'courriel' => 'steven@ventech-sarl.com',
            'titreAgent' => 'Super Utilisateur',
            'profession' => 'Developpeur web',
        	'niveauEtude' => 'Master II',
            'etatCivil' => 'Celibataire',
            'adresse' => '002 KASESE GOLF METEO LUBUMBASHI',
            'ville' => 'Lubumbashi',
            'province' => 'Haut-Katanga',
            'pays' => 'RD CONGO',
            
        ]);
    }
}
