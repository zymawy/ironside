<?php
namespace Database\Seeds;
use Illuminate\Database\Seeder;
use Artisan;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pages, news, blog, albums
        //\App\Models\Photo::truncate();

        $this->call(UserTableSeeder::class);

        $this->call(BannerTableSeeder::class);

        $this->call(PageTableSeeder::class);
        $this->call(NavigationDashboardTableSeeder::class);

        //$this->call(SubscriptionPlanFeaturesSeeder::class);
        //$this->call(SubscriptionPlanTableSeeder::class);

        //$this->call(FAQTableSeeder::class);
        //$this->call(TestimonialTableSeeder::class);

        //$this->call(NewsTableSeeder::class);
        //$this->call(ArticleTableSeeder::class);
        //$this->call(PhotoAlbumTableSeeder::class);

        //$this->call(TenderTableSeeder::class);
        //$this->call(VacancyTableSeeder::class);
        //$this->call(AnnualReportTableSeeder::class);

        //$this->call(LocationTableSeeder::class);
    }
}
