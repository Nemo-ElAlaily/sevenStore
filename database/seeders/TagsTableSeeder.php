<?php

namespace Database\Seeders;

use App\Models\Tags\Tag;
use App\Models\Tags\TagTranslation;
use Corcel\Model\Taxonomy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = array(' ', '/', '!', '\\');

        $wp_tags = Taxonomy::where('taxonomy', 'like', '%tag%')->get();

        foreach($wp_tags as $tag){

            DB::beginTransaction();

            $new_tag = Tag::whereTranslation('name', $tag)->firstOrCreate([
                'id' => $tag -> term_id,
            ]);

            TagTranslation::create([
                'tag_id' => $new_tag -> id,
                'locale' => 'ar',
                'name' => $tag -> name,
                'slug' =>  str_replace($characters, '-' , $tag -> name),
            ]);

            TagTranslation::create([
                'tag_id' => $new_tag -> id,
                'locale' => 'en',
                'name' => $tag -> name,
                'slug' =>  str_replace($characters, '-' , $tag -> name),
            ]);

            DB::commit();

        } // end of foreach
    }
}
