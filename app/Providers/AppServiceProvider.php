<?php

namespace App\Providers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
});
}

/**
* Bootstrap any application services.
*
* @return void
*/
public function boot()
{
Paginator::useBootstrap();
Gate::define('superadmin', function (User $user) {
return $user->is_admin == 1;
});
Gate::define('user', function (User $user) {
return $user->is_admin == 3;
});
Gate::define('secre', function (User $user) {
return $user->is_admin == 2;
});
Gate::define('sj', function (User $user) {
return $user->is_admin == 4;
});
Gate::define('admin', function (User $user) {
return $user->is_admin != 3;
});
Gate::define('wwtp', function (User $user) {
return $user->is_admin == 3 || $user->departemen_code = 1;
});

config(['app.locale' => 'id']);
Carbon::setLocale('id');
date_default_timezone_set('Asia/Jakarta');

Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
$page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

return new LengthAwarePaginator(
$this->forPage($page, $perPage),
$total ?: $this->count(),
$perPage,
$page,
[
'path' => LengthAwarePaginator::resolveCurrentPath(),
'pageName' => $pageName,
]
);
});
}
}