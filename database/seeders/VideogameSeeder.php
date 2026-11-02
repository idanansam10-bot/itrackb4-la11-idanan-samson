<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    public function run(): void
    {
        $a = Genre::create(['name' => 'Sandbox']);
        $b = Genre::create(['name' => 'Shooter']);
        $c = Genre::create(['name' => 'RPG']);
        $d = Genre::create(['name' => 'MOBA']);
        $e = Genre::create(['name' => 'Simulation']);

        Videogame::create([
            'title' => 'Minecraft',
            'developer' => 'Mojang Studios',
            'genre_id' => $a->id,
            'year' => 2011
        ]);

        Videogame::create([
            'title' => 'Valorant',
            'developer' => 'Riot Games',
            'genre_id' => $b->id,
            'year' => 2020
        ]);

        Videogame::create([
            'title' => 'Genshin Impact',
            'developer' => 'HoYoverse',
            'genre_id' => $c->id,
            'year' => 2020
        ]);

        Videogame::create([
            'title' => 'Mobile Legends: Bang Bang',
            'developer' => 'Moonton',
            'genre_id' => $d->id,
            'year' => 2016
        ]);

        Videogame::create([
            'title' => 'Stardew Valley',
            'developer' => 'ConcernedApe',
            'genre_id' => $e->id,
            'year' => 2016
        ]);
    }
}
