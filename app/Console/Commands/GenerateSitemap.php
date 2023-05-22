<?php

namespace App\Console\Commands;

use App\Models\Blog;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $aera_sitemap = Sitemap::create();

        $aera_sitemap->add(Url::create("/"));
        $aera_sitemap->add(Url::create("/about-us"));
        $aera_sitemap->add(Url::create("/services"));
        $aera_sitemap->add(Url::create("/blogs"));
        $aera_sitemap->add(Url::create("/contact-us"));
        $aera_sitemap->add(Url::create("/faq"));
        $aera_sitemap->add(Url::create("/digital-transformation"));

        Product::get()->each(function (Product $product) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/product/{$product->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        Service::get()->each(function (Service $service) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/service/{$service->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        Blog::get()->each(function (Blog $blog) use ($aera_sitemap) {
            $aera_sitemap->add(
                Url::create("/blog/{$blog->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        $aera_sitemap->writeToFile(public_path('sitemap.xml'));

        //SitemapGenerator::create('https://aera-capital.com')->writeToFile(public_path('sitemap.xml'));
    }
}
