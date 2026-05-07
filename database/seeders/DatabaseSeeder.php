<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Single Admin User
        User::updateOrCreate(
            ['email' => 'hamid@gmail.com'],
            [
                'name' => 'Hamid',
                'password' => Hash::make('hamid123'),
            ]
        );

        // Admin Profile
        Profile::updateOrCreate(
            ['email' => 'abdurrahmanhamid91@gmail.com'],
            [
                'full_name' => 'Abdurrahman Hamid',
                'avatar_url' => 'https://api.dicebear.com/7.x/adventurer/svg?seed=Admin',
                'bio' => 'Fullstack Developer specializing in Laravel and Vue.js.',
                'github_url' => 'https://github.com/19Hamid91',
                'linkedin_url' => 'https://www.linkedin.com/in/abdurrahman-hamid/',
            ]
        );

        // Existing 4 Techs
        $tech1 = Technology::firstOrCreate(['name' => 'Laravel'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg']);
        $tech2 = Technology::firstOrCreate(['name' => 'Vue.js'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original.svg']);
        $tech3 = Technology::firstOrCreate(['name' => 'Vuetify'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/vuetify/vuetify-original.svg']);
        $tech4 = Technology::firstOrCreate(['name' => 'Tailwind CSS'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/tailwindcss/tailwindcss-original.svg']);
        
        // New Techs
        $tech5 = Technology::firstOrCreate(['name' => 'React'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/react/react-original.svg']);
        $tech6 = Technology::firstOrCreate(['name' => 'Node.js'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original.svg']);
        $tech7 = Technology::firstOrCreate(['name' => 'PostgreSQL'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/postgresql/postgresql-original.svg']);
        $tech8 = Technology::firstOrCreate(['name' => 'Docker'], ['icon_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original.svg']);

        $techs = [$tech1, $tech2, $tech3, $tech4, $tech5, $tech6, $tech7, $tech8];

        $projects = [
            [
                'title' => 'Nexus E-Commerce',
                'desc' => 'A robust e-commerce platform built with modern web components, featuring integrated payment gateways and real-time inventory management.',
                'img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=600&auto=format&fit=crop',
                'techs' => [0, 1, 3] // Laravel, Vue, Tailwind
            ],
            [
                'title' => 'Finance Flow',
                'desc' => 'Personal finance tracker with interactive charts, budget planning, and predictive spending algorithms.',
                'img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600&auto=format&fit=crop',
                'techs' => [5, 6, 4] // NodeJS, Postgres, React
            ],
            [
                'title' => 'DevOps Dashboard',
                'desc' => 'Unified dashboard for monitoring CI/CD pipelines, container orchestration, and server health metrics.',
                'img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop',
                'techs' => [7, 1, 2] // Docker, Vue, Vuetify
            ],
            [
                'title' => 'Health App',
                'desc' => 'Telemedicine platform securely connecting patients with doctors through video calls and digital prescriptions.',
                'img' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=600&auto=format&fit=crop',
                'techs' => [0, 4, 3] // Laravel, React, Tailwind
            ],
            [
                'title' => 'Space Booking System',
                'desc' => 'Co-working space reservation tool tailored for medium enterprises. Includes calendar integrations.',
                'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop',
                'techs' => [0, 1, 2] // Laravel, Vue, Vuetify
            ]
        ];

        foreach ($projects as $idx => $p) {
            $project = Project::firstOrCreate(
                ['title' => $p['title']],
                [
                    'slug' => Str::slug($p['title']),
                    'description' => $p['desc'],
                    'thumbnail_url' => $p['img'],
                    'web_link' => 'https://example.com'
                ]
            );
            $techIds = array_map(fn($index) => $techs[$index]->id, $p['techs']);
            $project->technologies()->sync($techIds);
        }
    }
}
