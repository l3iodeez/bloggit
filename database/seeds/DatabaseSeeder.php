<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		$this->call('UsersTableSeeder');
  		$this->call('PostsTableSeeder');
      // $this->call('CommentsTableSeeder');
    }
}


class PostsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();
        for ($i = 1; $i <= 3; $i++) {
          $posts = array(
              ['title' => "Post 1 - User $i", 'user_id' => $i, 'url'=> 'http://placekitten.com/g/200/500', 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],
              ['title' => "Post 2 - User $i", 'user_id' => $i, 'url'=> 'http://placekitten.com/g/500/200', 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],
              ['title' => "Post 3 - User $i", 'user_id' => $i, 'url'=> 'http://placekitten.com/g/300/300', 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],
              ['title' => "Post 4 - User $i", 'user_id' => $i, 'url'=> null, 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],

          );
                // Uncomment the below to run the seeder
          DB::table('posts')->insert($posts);
        }
    }

}


class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
            ['id' => 1, 'email' => 'User1@test.com', 'username' => 'user-1', 'password'=> 'password', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'email' => 'User2@test.com', 'username' => 'user-2', 'password'=> 'password', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'email' => 'User3@test.com', 'username' => 'user-3', 'password'=> 'password', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}

class CommentsTableSeeder extends Seeder {
  public function run()
  {
      // Uncomment the below to wipe the table clean before populating
      DB::table('comments')->delete();
      $posts = App\Post::all();
      $users = App\User::all();


      // Uncomment the below to run the seeder
      DB::table('comments')->insert($comments);
  }
}
