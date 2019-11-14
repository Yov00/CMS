<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Tag;
use App\Post;
use App\Category;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $category1 = Category::create([
            'name'=>'News',
        ]);

        $category2 = Category::create([
            'name'=>'Marketing',
        ]);
        $category3 = Category::create([
            'name'=>'Health',
        ]);
        $category4 = Category::create([
            'name'=>'Sport',
        ]);

        $author1 = User::create([
            'name'=>"Viktoriya Backend",
            'email'=>"VBackend@abv.com",
            'role'=>'writer',
            'password' =>  Hash::make('password'),

        ]);
        
        $author2 = User::create([
            'name'=>"Ivan Zvezdev",
            'email'=>"IZvezdev@abv.com",
            'role'=>'writer',
            'password' =>  Hash::make('password'),

        ]);


       $post1 = $author2->posts()->create([
        'title'=>'We relocated our office to a new designed garage',
        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'category_id'=>$category1->id,
        'image'=>'posts/1.jpg',
        'user_id'=>$author1->id,
        'published_at'=>now(),
       ]);

       $post2 =  $author1->posts()->create([
        'title'=>'Top 5 brilliant content marketing strategies',
        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'category_id'=>$category2->id,
        'image'=>'posts/2.jpg',
        'published_at'=>now(),
       ]);
       $post3 = $author2->posts()->create([
        'title'=>'Best practices for minimalist design with example',
        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'category_id'=>$category3->id,
        'image'=>'posts/3.jpg',
        'published_at'=>now(),
       ]);

       $post4 =  $author1->posts()->create([
        'title'=>"This is why it's time to ditch dress codes at work",
        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'category_id'=>$category1->id,
        'image'=>'posts/4.jpg',
        'published_at'=>now(),
        
       ]);

       $post5 =  $author2->posts()->create([
        'title'=>'New published books to read by a product designer',
        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'category_id'=>$category2->id,
        'image'=>'posts/5.jpg',
        'published_at'=>now(),
       ]);
       $post6 = $author1->posts()->create([
        'title'=>'Congratulate and thank to Maryam for joining our team',
        'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'category_id'=>$category3->id,
        'image'=>'posts/6.jpg',
        'published_at'=>now(),
       ]);

       $tag1 = Tag::create([
        'name'=>'Job',
          ]);
       $tag2 = Tag::create([
        'name'=>'customers',
          ]);

        $tag3 = Tag::create([
        'name'=>'records',
            ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]); 
        $post3->tags()->attach([$tag3->id,$tag1->id]); 
    }
}
