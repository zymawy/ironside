<?php

// namespace Database\Seeds;
use App\Models\NavigationDashboard;
use Illuminate\Database\Seeder;

// use Storage;
class NavigationDashboardTableSeeder extends Seeder
{
    public function run()
    {
        NavigationDashboard::truncate();
        //DB::delete('TRUNCATE navigation_admin_role');

        $csvPath = __DIR__.DIRECTORY_SEPARATOR.'csv'.DIRECTORY_SEPARATOR.'navigation_dashboard.csv';

        $items = csv_to_array($csvPath);

        foreach ($items as $key => $item) {
            $row = NavigationDashboard::create([
                'id'                  => $item['id'],
                'title'               => [
                  'ar' => $item['ar_title'],
                  'en' => $item['en_title'],
                ],
                'description'         => [
                  'ar' => $item['ar_description'],
                  'en' => $item['en_description'],
                ],
                'slug'                => $item['slug'],
                'url'                 => $item['url'],
                'icon'                => $item['icon'],
                'help_index_title'    => [
                  'ar' => $item['ar_help_index_title'],
                  'en' => $item['en_help_index_title'],
                ],
                'help_index_content'  => [
                  'ar' => $item['ar_help_index_content'],
                  'en' => $item['en_help_index_content'],
                ],
                'help_create_title'   => [
                  'ar' => $item['ar_help_create_title'],
                  'en' => $item['en_help_create_title'],
                ],
                'help_create_content' => [
                  'ar' => $item['ar_help_create_content'],
                  'en' => $item['en_help_create_content'],
                ],
                'help_edit_title'     => [
                  'ar' => $item['ar_help_edit_title'],
                  'en' => $item['en_help_edit_title'],
                ],
                'help_edit_content'   => [
                  'ar' => $item['ar_help_edit_content'],
                  'en' => $item['en_help_edit_content'],
                ],
                'list_order'          => $item['list_order'],
                'is_hidden'           => $item['is_hidden'],
                'parent_id'           => $item['parent_id'],
                'url_parent_id'       => $item['url_parent_id'],
                'created_by'          => 1,
                'updated_by'          => 1,
            ]);
        }
    }
}
