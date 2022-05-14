<?php

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Redirects;
use App\Models\Content;

use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;



Route::group([ 'namespace' => 'Site'], function () {
    Route::get('/convert', 'HomeController@convert');
    Route::get('/', 'HomeController@getIndex')->name('site.index');
    Route::get('/about-us', 'HomeController@getAboutus');
    Route::get('/rules', 'HomeController@getRules');

    Route::get('/contact-us', 'HomeController@getContactus');
    Route::post('/post/contact-us', 'HomeController@postContactus');
    Route::get('/faq', 'HomeController@getFaq');
    Route::post('/comment', 'HomeController@postcomment');
    Route::post('/reply', 'HomeController@postReply');
    Route::get('/service', 'HomeController@getService');
    Route::get('/blog', 'HomeController@getArticle');
    Route::get('/sitemap.xml','SitemapController@sitemap');

    $countries=\App\Models\Country::get();
    foreach($countries as $row){
        if($row->url){
            Route::get('/'. $row->url, "ProductController@getProductList");
        }
    }


    $langueges=\App\Models\Language::get();
    foreach($langueges as $row){
        if($row->url){
            Route::get('/'. $row->url, "ProductController@getProductList");
        }
    }


    $service=Service::get();
    foreach($service as $row){
        if($row->url){
            Route::get('/service/'. $row->url, "HomeController@getServiceDetails");
        }
    }


    $article_category=Content::Articlecat()->get();
    foreach($article_category as $row){
        if($row->url){
            Route::get('/'.@$row->url, "HomeController@getArticleCat");
        }
    }

    $article=Content::Article()->get();
    foreach($article as $row){
        if($row->url){
            Route::get('/blog/'. $row->url, "HomeController@getArticleDetails");
        }
    }




    $route=Redirects::get();
    foreach ($route as $row){

        Route::get('/'.urldecode($row->old_address), function () use ($row){
            return redirect('/'.$row->new_address);
        });
    }

    Route::get('/register2', 'AuthController@register')->name('site.register');
    Route::post('/post-register2', 'AuthController@postRegister')->name('site.post-register');
    Route::get('/login2', 'AuthController@login')->name('site.login');
    Route::post('/post-login2', 'AuthController@postLogin')->name('site.post-login');

    Route::get('/forget-password', 'AuthController@forgetPassword')->name('site.forget-password');
    Route::post('/post-forgetpassword', 'AuthController@postForgetPassword')->name('site.post-forgetpassword');

    Route::group(['prefix' => 'panel'], function () {
        Route::get('/mobile-confirm', 'PanelController@mobileConfirm')->name('site.panel.mobile-confirm');
        Route::post('/post-mobile-confirm', 'PanelController@postMobileConfirm')->name('site.panel.post-mobile-confirm');
        Route::get('/logout', function(){
            Auth::logout();
    setcookie("mobileLoginCookie", '', time()-3600);

            return redirect()->route('site.index');
        })->name('site.panel.logout');
        Route::group(array('middleware' => 'panel'), function () {
            Route::get('/', 'PanelController@dashboard')->name('site.panel.dashboard');
            Route::post('/order/post-add', 'PanelController@postAddOrder')->name('site.panel.order.post-add');
            Route::get('/order/cart', 'PanelController@cart')->name('site.panel.order.cart');
            Route::post('/order/post-edit', 'PanelController@postEditOrder')->name('site.panel.order.post-edit');
            Route::get('/order/delete/{id}', 'PanelController@deleteOrder')->name('site.panel.order.delete');
            Route::get('/order/status/{id}/{status}', 'PanelController@orderStatus')->name('site.panel.order.status');
            Route::get('/order/post-cart', 'PanelController@postCart')->name('site.panel.order.post-cart');
            Route::get('/orders', 'PanelController@orders')->name('site.panel.orders');
            Route::get('/order/detail/{id}', 'PanelController@orderDetail')->name('site.panel.order.detail');
            Route::get('/charge', 'PanelController@charge')->name('site.panel.charge');
            Route::post('/post-charge', 'PanelController@postCharge')->name('site.panel.post-charge');
            Route::get('/profile', 'PanelController@profile')->name('site.panel.profile');
            Route::post('/post-profile', 'PanelController@postProfile')->name('site.panel.post-profile');

            Route::get('/back-charge/{orderItemId}', 'PanelController@backCharge')->name('site.panel.back-charge');
            Route::get('/delete/{orderItemId}', 'PanelController@deleteItem')->name('site.panel.delete-item');



            Route::get('/transactions', 'PanelController@transactions')->name('site.panel.transactions');
            Route::get('/transaction/detail/{id}', 'PanelController@transactionDetail')->name('site.panel.transaction.detail');



            Route::get('/tickets', 'PanelController@tickets')->name('site.panel.tickets');
            Route::get('/tickets/detail/{id}', 'PanelController@ticketDetail')->name('site.panel.ticket.detail');
            Route::post('/tickets/reply', 'PanelController@ticketPostReply')->name('site.panel.ticket.reply');
            Route::get('/tickets/create', 'PanelController@ticketCreate')->name('site.panel.tickets.create');
            Route::post('/tickets/post-create', 'PanelController@ticketPostCreate')->name('site.panel.tickets.post-create');



        });
    });
});

//Auth::routes();



Route::get('/login', function(){
    return redirect('login2');
})->name('login');
// Route::post('/post-login', 'Auth\LoginController@postLogin')->name('post-login');

Route::group(array('prefix' => config('site.admin')), function (){
    Route::group(['middleware'=>'admin' , 'namespace'=>'Admin'] , function(){
    Route::get('/', 'AdminController@getAdmin');
    Route::get('/logout/',  function (){
        Auth::logout();
        return redirect()->to('/');
    });


    Route::get('/order/', 'OrderController@getIndex');
    Route::get('/order/detail/{id}', 'OrderController@getDetail');
    Route::post('/order/change/', 'OrderController@postChange');




    Route::get('/user/', 'UserController@getIndex');
    Route::get('/user/edit/{id}/', 'UserController@getEdit');
    Route::post('/user/edit/', 'UserController@postEdit');
    Route::get('/user/login-as/{id}', 'UserController@loginAs');
    Route::post('/user/wallet/', 'UserController@wallet');



    Route::get('/category/', 'CategoryController@getCategory');
    Route::get('/category/add/', 'CategoryController@getCategoryAdd');
    Route::post('/category/add/', 'CategoryController@postCategoryAdd');
    Route::get('/category/edit/{id}/', 'CategoryController@getCategoryEdit');
    Route::post('/category/edit/{id}/', 'CategoryController@postCategoryEdit');
    Route::get('/category/delete/{id}/', 'CategoryController@getCategoryDelete');
    Route::get('/category/import/add', 'CategoryController@importAdd');
    Route::post('/category/import/', 'CategoryController@import');

    Route::get('/service/', 'ServiceController@getService');
    Route::get('/service/add/', 'ServiceController@getServiceAdd');
    Route::post('/service/add/', 'ServiceController@postServiceAdd');
    Route::get('/service/edit/{id}/', 'ServiceController@getServiceEdit');
    Route::post('/service/edit/{id}/', 'ServiceController@postServiceEdit');
    Route::get('/service/delete/{id}/', 'ServiceController@getServiceDelete');


    Route::get('/question/', 'ContentController@getQuestion');
    Route::get('/question/add/', 'ContentController@getQuestionAdd');
    Route::post('/question/add/', 'ContentController@postQuestionAdd');
    Route::get('/question/edit/{id}/', 'ContentController@getQuestionEdit');
    Route::post('/question/edit/{id}/', 'ContentController@postQuestionEdit');
    Route::get('/question/delete/{id}/', 'ContentController@getQuestionDelete');


    Route::get('/sloagens/', 'ContentController@getSloagens');
    Route::get('/sloagens/add/', 'ContentController@getSloagensAdd');
    Route::post('/sloagens/add/', 'ContentController@postSloagensAdd');
    Route::get('/sloagens/edit/{id}/', 'ContentController@getSloagensEdit');
    Route::post('/sloagens/edit/{id}/', 'ContentController@postSloagensEdit');
    Route::get('/sloagens/delete/{id}/', 'ContentController@getSloagensDelete');

    Route::get('/articlecat/', 'ArticleController@getArticlecat');
    Route::get('/articlecat/add/', 'ArticleController@getArticlecatAdd');
    Route::post('/articlecat/add/', 'ArticleController@postArticlecatAdd');
    Route::get('/articlecat/edit/{id}/', 'ArticleController@getArticlecatEdit');
    Route::post('/articlecat/edit/{id}/', 'ArticleController@postArticlecatEdit');
    Route::get('/articlecat/delete/{id}/', 'ArticleController@getArticlecatDelete');


    Route::get('/article/', 'ArticleController@getArticle');
    Route::get('/article/add/', 'ArticleController@getArticleAdd');
    Route::post('/article/add/', 'ArticleController@postArticleAdd');
    Route::get('/article/edit/{id}/', 'ArticleController@getArticleEdit');
    Route::post('/article/edit/{id}/', 'ArticleController@postArticleEdit');
    Route::get('/article/delete/{id}/', 'ArticleController@getArticleDelete');


    Route::get('/setting/edit/' , 'SettingController@getEditSetting');
    Route::post('/setting/edit/' , 'SettingController@postEditSetting');
    Route::get('/sitemap/edit/' , 'SettingController@getEditSitemap');
    Route::post('/sitemap/edit/' , 'SettingController@postEditSitemap');

    Route::get('/cropper/', 'ContentController@getcropper');

    Route::get('/redirect/', 'RedirectController@getRedirect');
    Route::get('/redirect/add/', 'RedirectController@getRedirectAdd');
    Route::post('/redirect/add/', 'RedirectController@postRedirectAdd');
    Route::get('/redirect/edit/{id}/', 'RedirectController@getRedirectEdit');
    Route::post('/redirect/edit/{id}/', 'RedirectController@postRedirectEdit');
    Route::get('/redirect/delete/{id}/', 'RedirectController@getRedirectDelete');

    Route::get('/language/', 'LanguageController@getLanguage');
    Route::get('/language/add/', 'LanguageController@getLanguageAdd');
    Route::post('/language/add/', 'LanguageController@postLanguageAdd');
    Route::get('/language/edit/{id}/', 'LanguageController@getLanguageEdit');
    Route::post('/language/edit/{id}/', 'LanguageController@postLanguageEdit');
    Route::get('/language/delete/{id}/', 'LanguageController@getLanguageDelete');


    Route::get('/status/', 'StatusController@getIndex');
    Route::post('/status/add/', 'StatusController@postAdd');
    Route::get('/status/delete/{id}/', 'StatusController@getDelete');



    Route::get('/country/', 'CountryController@getCountry');
    Route::get('/country/add/', 'CountryController@getCountryAdd');
    Route::post('/country/add/', 'CountryController@postCountryAdd');
    Route::get('/country/edit/{id}/', 'CountryController@getCountryEdit');
    Route::post('/country/edit/{id}/', 'CountryController@postCountryEdit');
    Route::get('/country/delete/{id}/', 'CountryController@getCountryDelete');

    Route::get('/product/', 'ProductController@getProduct');
    Route::get('/product/add/', 'ProductController@getProductAdd');
    Route::post('/product/add/', 'ProductController@postProductAdd');
    Route::get('/product/edit/{id}/', 'ProductController@getProductEdit');
    Route::post('/product/edit/{id}/', 'ProductController@postProductEdit');
    Route::get('/product/delete/{id}/', 'ProductController@getProductDelete');
    Route::get('/product/comment/{id}/' , 'ProductController@getProductComment');
    Route::get('/product/export', 'ProductController@export');
    Route::get('/product/import/add', 'ProductController@importAdd');
    Route::post('/product/import/', 'ProductController@import');

    //contact
    Route::get('/contact/' , 'ContactController@getContact');
    Route::get('/contact/edit/{id}/' , 'ContactController@getContactEdit');
    Route::post('/contact/edit/{id}/' , 'ContactController@postContactRead');
    Route::get('/contact/delete/{id}/' , 'ContactController@getDeleteContact');
    Route::get('/contact/export', 'ContactController@export');

    //comment

    Route::get('/comment/' , 'CommentController@getComment');
    Route::get('/comment/edit/{id}/' , 'CommentController@getCommentEdit');
    Route::post('/comment/edit/{id}/' , 'CommentController@postCommentRead');
    Route::get('/comment/delete/{id}/' , 'CommentController@getCommentDelete');
    Route::get('/comment/export', 'CommentController@export');

    //Uploader

    Route::get('/uploader/', 'UploadController@getUpload');
    Route::get('/uploader/add/', 'UploadController@getUploadAdd');
    Route::post('/uploader/add/', 'UploadController@postUploadAdd');
    Route::get('/uploader/edit/{id}/', 'UploadController@getUploadEdit');
    Route::post('/uploader/edit/{id}/', 'UploadController@postUploadEdit');
    Route::get('/uploader/delete/{id}/', 'UploadController@getUploadDelete');

    //Social

    Route::get('/social/', 'SocialController@getSocial');
    Route::get('/social/add/', 'SocialController@getSocialAdd');
    Route::post('/social/add/', 'SocialController@postSocialAdd');
    Route::get('/social/edit/{id}/', 'SocialController@getSocialEdit');
    Route::post('/social/edit/{id}/', 'SocialController@postSocialEdit');
    Route::get('/social/delete/{id}/', 'SocialController@getSocialDelete');


    Route::get('/crawl-setting/', 'CrawlController@crawlSetting');
    Route::post('/post-crawl-setting/', 'CrawlController@postCrawlSetting');
    Route::post('/start-crawling', 'CrawlController@startCrawling');

    Route::get('/crawl-info/', 'CrawlController@crawlInfo');


    Route::get('/price-setting/', 'PriceController@priceSetting');
    Route::post('/post-price-setting/', 'PriceController@postPriceSetting');
    Route::post('/add-profit/', 'PriceController@postAddProfit');
    Route::get('/delete-profit/{id}', 'PriceController@deleteProfit');

    Route::get('/ticket/', 'TicketController@getIndex');
    Route::get('/ticket/detail/{id}', 'TicketController@detail');
    Route::post('/ticket/post-reply', 'TicketController@postReply');


    Route::get('/transactions/', 'TransactionController@getIndex');


    });
});



Route::get('/site-crawl','Site\CrawlController@siteCrawl');
Route::get('/site-price','Site\CrawlController@sitePrice');
Route::get('/domains-crawl-check','Site\CrawlController@domainsCrawlCheck');

Route::get('/fix-drs','Site\CrawlController@fixDrs');
Route::get('/fix-excel','Site\CrawlController@fixExcel');


Route::post('/charge-bank','Site\BankController@chargeBank')->name('charge-bank');
Route::any('/back-charge-bank','Site\BankController@backChargeBank');


Route::get('/shop-bank/{type}','Site\BankController@shopBank')->name('shop-bank');
Route::any('/back-shop-bank','Site\BankController@backShopBank');


Route::post('/shop-item-bank/','Site\BankController@shopItemBank')->name('shop-item-bank');
Route::any('/back-shop-item-bank','Site\BankController@backShopItemBank');



Route::get('/price-dollar-crawl','Site\CrawlController@priceDollarCrawl');



Route::get('/sms-tes', function(){
    try{


        $api = new KavenegarApi("656F58557978575438344C79696D346469584E2B4A6A36634972797A45444C6658414D76794B7A384C306F3D");
        $sender = "10008663";
        $message = '2ارسال پیامک تستی';
        $message = $message . '





        ' . 'ddd';
        $receptor = ['09032783528'];
        $result = $api->Send($sender,$receptor,$message);

    }
    catch(ApiException $e){
        dd($e->errorMessage());
    }
    catch(HttpException $e){
        dd($e->errorMessage());
    }

});


Route::get('/test-crawl','Site\CrawlController@testCrawl');
Route::get('/login-me/{id}', function ($id){
    Auth::loginUsingId($id);
});

Route::get('/load', function (){
    return redirect('/')->with('error','این بخش های سایت درحال آماده سازی است.');
});

Route::get('/passme', function (){
    dd(bcrypt('123456'));
});




Route::get('/test-round', function (){
    $unround = 1421043;


    $round = round($unround,-4,PHP_ROUND_HALF_UP);
    if($unround > $round){
        $x = $unround - $round;
        if($x < 10000){
            $round = $round+10000;
        }
    }

    dd($round);
});


Route::get('/test-text', function (){
    $length = 100;
    $characters = '0123456789abcdefghijklmnoqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
});



Route::get('/reset-pass/{id}','Site\PanelController@resetPass');
Route::post('/post-reset-pass/','Site\PanelController@postResetPass');

