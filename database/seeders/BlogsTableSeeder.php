<?php

namespace Database\Seeders;

use App\Models\Blogs\Blog;
use App\Models\Blogs\BlogTranslation;
use Corcel\Model\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = array(' ', '/', '!', '\\');
        $wp_db_blogs = Post::where('post_type', 'post')->get();

        foreach($wp_db_blogs as $blog)
        {
            DB::beginTransaction();

                $new_blog = new Blog();
                $new_blog -> id = $blog -> ID;
                $new_blog -> user_id = $blog -> post_author;
                $new_blog -> image = $blog -> image == null ? 'default.png' : $blog -> image;
                $new_blog -> is_active = $blog -> post_status == 'publish' ? 1 : 0;
                $new_blog -> created_at = $blog -> created_at;
                $new_blog -> updated_at = $blog -> updated_at;
                $new_blog -> save();

                $new_blog_translation = new BlogTranslation();
                $new_blog_translation -> blog_id = $new_blog -> id;
                $new_blog_translation -> locale = 'ar';
                $new_blog_translation -> title = $blog -> post_title;
                $new_blog_translation -> slug = $blog -> slug == null ? str_replace($characters, '-' , $blog -> title) : $blog -> slug;
                $new_blog_translation -> description = $blog -> content;
                $new_blog_translation -> save();

                $new_blog_translation = new BlogTranslation();
                $new_blog_translation -> blog_id = $new_blog -> id;
                $new_blog_translation -> locale = 'en';
                $new_blog_translation -> title = $blog -> post_title;
                $new_blog_translation -> slug = $blog -> slug == null ? str_replace($characters, '-' , $blog -> title) : $blog -> slug;
                $new_blog_translation -> description = $blog -> content;
                $new_blog_translation -> save();

            DB::commit();

        } // end of foreach

    } // end of run

} // end of seeder
