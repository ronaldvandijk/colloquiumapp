<?php

use Illuminate\Database\Seeder;

class ColloquiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Models\Colloquium::class, 10)->create();

    	DB::table('colloquia')->insert([
            'title' => 'Energy Data Hub: From Webservice to Mobile service', 
            'description' => 'Tijdens deze presentatie zullen jullie alles leren over een Data Hub. Ik vertel jullie over het proces van webservice tot mobileservice met alle bijbehorende zaken.',
            'user_id' => 2,
            'start_date' => '2015-10-11 13:00:00',
            'end_date' => '2015-10-11 14:45:00',
            'type_id' => 2,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 2,
            'approved' => 1,
            'room_id' => 4,
        ]);

    	DB::table('colloquia')->insert([
            'title' => 'Automatiseren van beveiligingsmaatregelen voor OSSO',
            'description' => 'Tijdens mijn presentatie zal ik veel vertellen over hoe ik heb meegeholpen in het automatiseren van beveiligingsregels voor het bedrijf OSSO.',
            'user_id' => 2,
            'start_date' => '2016-11-09 09:00:00',
            'end_date' => '2016-11-09 09:45:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => 'https://goo.gl/do6skK',
            'company_url' => 'http://www.hanze.nl/',
            'language_id' => 1,
            'approved' => 1,
            'room_id' => 4,
        ]);

        DB::table('colloquia')->insert([
            'title' => 'Service  Level Agreements Onder de Loep',
            'description' => 'SLA is een van de belangrijkste documenten met afspraken tussen een bedrijf die service biedt en een bedrijf die service vraagt, maar wat staat er nou precies allemaal in? Kom naar mijn presentatie en ik zal jullie van alles vertellen over een SLA',
            'user_id' => 2,
            'start_date' => '2016-11-21 10:15:00',
            'end_date' => '2016-11-21 11:00:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 1,
            'approved' => 1,
            'room_id' => 4,
        ]);

        DB::table('colloquia')->insert([
            'title' => 'API: The ABC of IT',
            'description' => 'Wil je meer weten over wat een API is? Ik ga jullie er alles over vertellen tijdens mijn presentatie.',
            'user_id' => 4,
            'start_date' => '2016-11-22 13:15:00',
            'end_date' => '2016-11-22 14:00:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 1,
            'approved' => 0,
            'room_id' => 4,
        ]);

        DB::table('colloquia')->insert([
            'title' => 'Machine Learning Sales Forecasting', 
            'description' => 'Tegenwoordig is alles geautomatiseerd en leren computers zichzelf bepaalde ritmes aan. Ik heb dit toegepast in de saleswereld.',
            'user_id' => 5,
            'start_date' => '2016-11-24 13:15:00',
            'end_date' => '2016-11-24 14:00:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 2,
            'approved' => 1,
            'room_id' => 4,
        ]);

        DB::table('colloquia')->insert([
            'title' => 'Testplatform: Rolling update', 
            'description' => 'Wil je graag meer weten over updates uitvoeren op grote schaal? Ik vertel je alles over versie checks, updates en compatibility checks etc.',
            'user_id' => 6,
            'start_date' => '2016-12-12 13:00:00',
            'end_date' => '2016-12-12 14:45:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 1,
            'approved' => 0,
            'room_id' => 4,
        ]);

        DB::table('colloquia')->insert([
            'title' => 'Digitale Opsporing: De weg naar een goede samenwerking', 
            'description' => '',
            'user_id' => 6,
            'start_date' => '2016-11-21 09:00:00',
            'end_date' => '2016-11-21 09:45:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 1,
            'approved' => 1,
            'room_id' => 5,
        ]);

        DB::table('colloquia')->insert([
            'title' => 'Hacker Specialties; Providing insight in the specialties of hackers on the HackerOne platform', 
            'description' => 'Do you want to know more about hacking? Join my presentation and you will learn everything about the specialties of hackers on the HackerOne platform',
            'user_id' => 6,
            'start_date' => '2016-11-21 11:15:00',
            'end_date' => '2016-11-21 12:00:00',
            'type_id' => 1,
            'invite_email' => '',
            'company_image' => '',
            'company_url' => '',
            'language_id' => 2,
            'approved' => 1,
            'room_id' => 5,
        ]);


    }
}
