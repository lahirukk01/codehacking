<?php

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('comment_replies')->truncate();
        DB::table('comments')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        factory(Category::class, 10)->create();



        factory(User::class, 5)->create()->each(function ($user) {

            for($i = 1; $i < 3; $i++) {
                $user->posts()->save(factory(Post::class)->make());

            }
        });

        factory(Comment::class, 20)->create();
        factory(CommentReply::class, 40)->create();

    }
}
