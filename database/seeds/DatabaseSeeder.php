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
      $this->call('CommentsTableSeeder');
    }
}


class PostsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();
        for ($i = 1; $i <= 3; $i++) {

          $posts = array(
              ['title' => "Post " . ((($i-1)*4)+1), 'user_id' => $i, 'url'=> 'http://placekitten.com/g/200/500', 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],
              ['title' => "Post " . ((($i-1)*4)+2), 'user_id' => $i, 'url'=> 'http://placekitten.com/g/500/200', 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],
              ['title' => "Post " . ((($i-1)*4)+3), 'user_id' => $i, 'url'=> 'http://placekitten.com/g/300/301', 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],
              ['title' => "Post " . ((($i-1)*4)+4), 'user_id' => $i, 'url'=> null, 'body'=> 'Lorem ipsum', 'created_at' => new DateTime, 'updated_at' => new DateTime],

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

      for ($i = 1; $i <= 3; $i++) {

        $comments = array(
            ['body' => "Nice post!", 'user_id' => $i, 'commentable_id' => ((($i*8)%11)+1), 'commentable_type' =>'App\Post', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['body' => "Agreed.", 'user_id' => $i, 'commentable_id' => ((($i*8)%11)+2), 'commentable_type' =>'App\Post', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['body' => "No way!", 'user_id' => $i, 'commentable_id' => ((($i*8)%11)+3), 'commentable_type' =>'App\Post', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['body' => "I guess...", 'user_id' => $i, 'commentable_id' => ((($i*8)%11)+4), 'commentable_type' =>'App\Post', 'created_at' => new DateTime, 'updated_at' => new DateTime],

        );

        // Uncomment the below to run the seeder
        DB::table('comments')->insert($comments);
      }
    }
}
