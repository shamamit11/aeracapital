<?php

use Illuminate\Support\Facades\Route;

Route::controller('AuthController')->group(function () {
    Route::get('/login', 'login')->name('admin-login');
    Route::post('/check/login', 'checkLogin')->name('admin-checkLogin');
    Route::get('/forgot-password', 'forgotPassword')->name('admin-forgot-password');
    Route::post('/forget-password', 'forgetPassword')->name('admin-forget-password');
    Route::get('/reset-password/{token}', 'resetPassword')->name('admin-reset-password');
    Route::post('/reset-password', 'savePassword')->name('admin-save-password');
});

Route::group(['middleware' => 'adminauth'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('admin-dashboard');
    Route::get('/logout', 'AuthController@logout')->name('admin-logout');

    Route::controller('FilemanagerController')->group(function () {
        Route::get('/filemanager', 'index')->name('admin-filemanager');
    });

    Route::controller('AccountController')->group(function () {
        Route::get('/account', 'index')->name('admin-account-setting');
        Route::post('/account/addaction', 'addAction')->name('admin-account-addaction');
        Route::get('/account/change-password', 'changePassword')->name('admin-account-change-password');
        Route::post('/account/update-password', 'updatePassword')->name('admin-account-update-password');
    });

    Route::controller('SettingController')->group(function () {
        Route::get('/setting', 'index')->name('admin-setting');
        Route::post('/setting/addaction', 'addAction')->name('admin-setting-addaction');
    });

    Route::controller('SeoController')->group(function () {
        Route::get('/seo', 'index')->name('admin-seo');
        Route::post('/seo/status', 'status')->name('admin-seo-status');
        Route::get('/seo/add', 'addEdit')->name('admin-seo-add');
        Route::post('/seo/addaction', 'addAction')->name('admin-seo-addaction');
        Route::post('/seo/delete', 'delete')->name('admin-seo-delete');
    });

    Route::controller('SocialLinkController')->group(function () {
        Route::get('/social-links', 'index')->name('admin-social-links');
        Route::post('/social-link/addaction', 'addAction')->name('admin-social-link-addaction');
    });

    Route::controller('CmsController')->group(function () {
        Route::get('/cms', 'index')->name('admin-cms');
        Route::post('/cms/status', 'status')->name('admin-cms-status');
        Route::get('/cms/add', 'addEdit')->name('admin-cms-add');
        Route::post('/cms/addaction', 'addAction')->name('admin-cms-addaction');
        Route::post('/cms/delete', 'delete')->name('admin-cms-delete');
        Route::post('/cms/slug', 'slug')->name('admin-cms-slug');
    });

    Route::controller('CounterController')->group(function () {
        Route::get('/counters', 'index')->name('admin-counter');
        Route::get('/counter/add', 'addEdit')->name('admin-counter-add');
        Route::post('/counter/addaction', 'addAction')->name('admin-counter-addaction');
        Route::post('/counter/delete', 'delete')->name('admin-counter-delete');
    });

    Route::controller('PageSectionController')->group(function () {
        Route::get('/pagesections', 'index')->name('admin-pagesection');
        Route::get('/pagesection/add', 'addEdit')->name('admin-pagesection-add');
        Route::post('/pagesection/addaction', 'addAction')->name('admin-pagesection-addaction');
        Route::post('/pagesection/delete', 'delete')->name('admin-pagesection-delete');
    });

    Route::controller('WorkProcessController')->group(function () {
        Route::get('/workprocess', 'index')->name('admin-workprocess');
        Route::get('/workprocess/add', 'addEdit')->name('admin-workprocess-add');
        Route::post('/workprocess/addaction', 'addAction')->name('admin-workprocess-addaction');
        Route::post('/workprocess/delete', 'delete')->name('admin-workprocess-delete');
    });

    Route::controller('ClientController')->group(function () {
        Route::get('/clients', 'index')->name('admin-client');
        Route::post('/client/status', 'status')->name('admin-client-status');
        Route::get('/client/add', 'addEdit')->name('admin-client-add');
        Route::post('/client/addaction', 'addAction')->name('admin-client-addaction');
        Route::post('/client/delete', 'delete')->name('admin-client-delete');
    });

    Route::controller('BannerController')->group(function () {
        Route::get('/banners', 'index')->name('admin-banner');
        Route::post('/banner/status', 'status')->name('admin-banner-status');
        Route::get('/banner/add', 'addEdit')->name('admin-banner-add');
        Route::post('/banner/addaction', 'addAction')->name('admin-banner-addaction');
        Route::post('/banner/delete', 'delete')->name('admin-banner-delete');
    });

    Route::controller('CtaController')->group(function () {
        Route::get('/ctas', 'index')->name('admin-cta');
        Route::get('/cta/add', 'addEdit')->name('admin-cta-add');
        Route::post('/cta/addaction', 'addAction')->name('admin-cta-addaction');
        Route::post('/cta/delete', 'delete')->name('admin-cta-delete');
    });

    Route::controller('TestimonialController')->group(function () {
        Route::get('/testimonials', 'index')->name('admin-testimonial');
        Route::post('/testimonial/status', 'status')->name('admin-testimonial-status');
        Route::get('/testimonial/add', 'addEdit')->name('admin-testimonial-add');
        Route::post('/testimonial/addaction', 'addAction')->name('admin-testimonial-addaction');
        Route::post('/testimonial/delete', 'delete')->name('admin-testimonial-delete');
    });

    Route::controller('TeamController')->group(function () {
        Route::get('/team', 'index')->name('admin-team');
        Route::post('/team/status', 'status')->name('admin-team-status');
        Route::get('/team/add', 'addEdit')->name('admin-team-add');
        Route::post('/team/addaction', 'addAction')->name('admin-team-addaction');
        Route::post('/team/delete', 'delete')->name('admin-team-delete');
    });

    Route::controller('BlogController')->group(function () {
        Route::get('/blog', 'index')->name('admin-blog');
        Route::post('/blog/status', 'status')->name('admin-blog-status');
        Route::get('/blog/add', 'addEdit')->name('admin-blog-add');
        Route::post('/blog/addaction', 'addAction')->name('admin-blog-addaction');
        Route::post('/blog/delete', 'delete')->name('admin-blog-delete');
        Route::post('/blog/slug', 'slug')->name('admin-blog-slug');
    });

    Route::controller('FaqController')->group(function () {
        Route::get('/faq', 'index')->name('admin-faq');
        Route::post('/faq/status', 'status')->name('admin-faq-status');
        Route::get('/faq/add', 'addEdit')->name('admin-faq-add');
        Route::post('/faq/addaction', 'addAction')->name('admin-faq-addaction');
        Route::post('/faq/delete', 'delete')->name('admin-faq-delete');
    });

    Route::controller('ServiceController')->group(function () {
        Route::get('/service', 'index')->name('admin-service');
        Route::post('/service/status', 'status')->name('admin-service-status');
        Route::get('/service/add', 'addEdit')->name('admin-service-add');
        Route::post('/service/addaction', 'addAction')->name('admin-service-addaction');
        Route::post('/service/delete', 'delete')->name('admin-service-delete');
        Route::post('/service/slug', 'slug')->name('admin-service-slug');
    });

    Route::controller('ProductController')->group(function () {
        Route::get('/product', 'index')->name('admin-product');
        Route::post('/product/status', 'status')->name('admin-product-status');
        Route::get('/product/add', 'addEdit')->name('admin-product-add');
        Route::post('/product/addaction', 'addAction')->name('admin-product-addaction');
        Route::post('/product/delete', 'delete')->name('admin-product-delete');
        Route::post('/product/slug', 'slug')->name('admin-product-slug');
    });

    Route::controller('LandingPageController')->group(function () {
        Route::get('/landing-pages', 'index')->name('admin-landing-pages');
        Route::post('/landing-page/status', 'status')->name('admin-landing-page-status');
        Route::get('/landing-page/add', 'addEdit')->name('admin-landing-page-add');
        Route::post('/landing-page/addaction', 'addAction')->name('admin-landing-page-addaction');
        Route::post('/landing-page/delete', 'delete')->name('admin-landing-page-delete');
        Route::post('/landing-page/slug', 'slug')->name('admin-landing-page-slug');
    });

    Route::controller('LeadController')->group(function () {
        Route::get('/leads', 'index')->name('admin-leads');
        Route::get('/lead/view', 'view')->name('admin-lead-view');
        Route::post('/lead/delete', 'delete')->name('admin-lead-delete');
    });
});