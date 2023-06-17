<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\LandingPage;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $aera_sitemap = Sitemap::create();

        $aera_sitemap->add(Url::create("/")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/about-us")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/services")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/blogs")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/contact-us")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/faq")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/package/digital-transformation-for-startup-business")->setPriority(0.9));
        $aera_sitemap->add(Url::create("/package/digital-transformation-for-existing-business")->setPriority(0.9));

        Product::get()->each(function (Product $product) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/product/{$product->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        Service::get()->each(function (Service $service) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/service/{$service->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        Blog::get()->each(function (Blog $blog) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/blog/{$blog->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        LandingPage::get()->each(function (LandingPage $landingPage) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/{$landingPage->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        $aera_sitemap->writeToFile(public_path('sitemap.xml'));

        //SitemapGenerator::create('https://aera-capital.com')->writeToFile(public_path('sitemap.xml'));
    }
}
