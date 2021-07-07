<?php

namespace Database\Seeders;

use App\Models\Blogs\Blog;
use App\Models\Blogs\BlogTag;
use App\Models\Blogs\BlogTranslation;
use App\Models\MainCategories\MainCategory;
use App\Models\Products\ProductTag;
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
            $category = MainCategory::whereTranslation('name', $blog -> main_category) -> first();
            $uncategorized = MainCategory::whereTranslation('name', 'Uncategorized') -> first();

            DB::beginTransaction();

                $new_blog = new Blog();
                $new_blog -> id = $blog -> ID;
                $new_blog -> user_id = $blog -> post_author;
                $new_blog -> main_category_id = $category != "" ? $category -> id : $uncategorized -> id;
                $new_blog -> image = $blog -> image == null ? 'default.png' : $blog -> image;
                $new_blog -> is_active = $blog -> post_status == 'publish' ? 1 : 0;
                $new_blog -> created_at = $blog -> created_at;
                $new_blog -> updated_at = $blog -> updated_at;
                $new_blog -> save();

            foreach(config('translatable.locales') as $locale) {
                $new_blog_translation = new BlogTranslation();
                $new_blog_translation->blog_id = $new_blog->id;
                $new_blog_translation->locale = $locale;
                $new_blog_translation->title = $blog->post_title;
                $new_blog_translation->slug = str_replace($characters, '-', $blog->title);
                $new_blog_translation->description = $blog->content;
                $new_blog_translation->save();
            }
            
            $blog_tags = $blog -> taxonomies -> where('taxonomy', 'post_tag');

            foreach ($blog_tags as $tag) {
                BlogTag::create([
                    'tag_id' => $tag -> term_id,
                    'blog_id' => $tag -> pivot -> object_id,
                ]);
            } // end of tag foreach

            DB::commit();

        } // end of foreach

    } // end of run

} // end of seeder
