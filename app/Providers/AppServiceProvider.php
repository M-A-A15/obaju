<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('datetime', function ($expression) {
            return "<?php echo date('d-m-Y H:i', strtotime($expression)); ?>";
        });

        Blade::directive('date', function ($expression) {
            return "<?php echo date('d-m-Y', strtotime($expression)); ?>";
        });

        Blade::directive('rupiah', function ($expression) {
            return "<?php echo 'IDR '.number_format($expression,2,',','.') ?>";
        });

        $this->app->singleton('rupiah', function($app, $string){
            return 'IDR '.number_format($string['string'],2,',','.');
        });

        $this->app->singleton('datetime', function($app, $string){
            return date('d-m-Y H:i', strtotime($string['string']));
        });

        $this->app->singleton('user_level', function($app){
            return [
                'name' => ['', 'Admin', 'Customer'],
                'color' => ['', 'primary', 'success']
            ];
        });

        $this->app->singleton('order_status', function($app){
            return [
                'name' => ['', 'Belum Dibayar', 'Sudah Bayar', 'Dalam Pengiriman', 'Selesai'],
                'color' => ['', 'danger', 'warning', 'primary', 'success']
            ];
        });
    }
}
