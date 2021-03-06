<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'                                            => \App\Http\Middleware\Authenticate::class,
        'auth.basic'                                      => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest'                                           => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'admin'                                           => \App\Http\Middleware\AbortIfNotAdmin::class,
        'remember_return_url'                             => \App\Http\Middleware\RememberReturnUrl::class,
        'abort_if_cant_manage_article'                    => \App\Http\Middleware\AbortIfCantManageArticle::class,
        'abort_if_cant_manage_comment'                    => \App\Http\Middleware\AbortIfCantManageComment::class,
        'abort_if_cant_manage_user'                       => \App\Http\Middleware\AbortIfCantManageUser::class,
        'abort_if_cant_see_user_recently_viewed_articles' => \App\Http\Middleware\AbortIfCantSeeUserRecentlyViewedArticles::class,
    ];
}
