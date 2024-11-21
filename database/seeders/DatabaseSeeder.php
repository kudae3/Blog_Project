<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Category::truncate();
        Blog::truncate();

        $Alex = User::factory()->create(['name'=>'Alex','username'=>'Alex']);
        $Thomas = User::factory()->create(['name'=>'Thomas','username'=>'Thomas']);

        $frontend = Category::factory()->create(['name' => 'Frontend', 'slug'=> 'Frontend']);
        $backend = Category::factory()->create(['name' => 'backend', 'slug'=> 'Backend']);

        Blog::factory(2)->create(['user_id'=> $Alex->id,'category_id' => $frontend->id]);
        Blog::factory(2)->create(['user_id'=> $Thomas->id,'category_id' => $backend->id]);

    }
}
