<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'users.create',
            'users.edit',
        ], function ($view) {
            return $view->with(
                'roles',
                Role::get()
            );
        });

        		View::composer([
            'kop-products.create',
            'kop-products.edit',
        ], function ($view) {
            return $view->with(
                'productTypes',
                \App\Models\ProductType::select('id', 'name')->get()
            );
        });

		View::composer([
            'user-savings.create',
            'user-savings.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

View::composer([
            'user-savings.create',
            'user-savings.edit',
        ], function ($view) {
            return $view->with(
                'kopProducts',
                \App\Models\KopProduct::select('id', 'name')->get()
            );
        });

		View::composer([
            'saving-transactions.create',
            'saving-transactions.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

View::composer([
            'saving-transactions.create',
            'saving-transactions.edit',
        ], function ($view) {
            return $view->with(
                'kopProducts',
                \App\Models\KopProduct::select('id', 'name')->get()
            );
        });

				View::composer([
            'donations.create',
            'donations.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'donation-transactions.create',
            'donation-transactions.edit',
        ], function ($view) {
            return $view->with(
                'donations',
                \App\Models\Donation::select('id', 'name')->get()
            );
        });

		View::composer([
            'donation-transactions.create',
            'donation-transactions.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'donation-disbursements.create',
            'donation-disbursements.edit',
        ], function ($view) {
            return $view->with(
                'donations',
                \App\Models\Donation::select('id', 'name')->get()
            );
        });

View::composer([
            'donation-disbursements.create',
            'donation-disbursements.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'user-topups.create',
            'user-topups.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

				View::composer([
            'user-transactions.create',
            'user-transactions.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'merchants.create',
            'merchants.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'merchants.create',
            'merchants.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

				View::composer([
            'merchant-transactions.create',
            'merchant-transactions.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'merchant-transactions.create',
            'merchant-transactions.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

				View::composer([
            'cashflows.create',
            'cashflows.edit',
        ], function ($view) {
            return $view->with(
                'savingAccounts',
                \App\Models\SavingAccount::select('id', 'code')->get()
            );
        });

		View::composer([
            'paylaters.create',
            'paylaters.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'paylaters.create',
            'paylaters.edit',
        ], function ($view) {
            return $view->with(
                'paylaterProviders',
                \App\Models\PaylaterProvider::select('id', 'name')->get()
            );
        });

		View::composer([
            'paylaters.create',
            'paylaters.edit',
        ], function ($view) {
            return $view->with(
                'banks',
                \App\Models\Bank::select('id', 'code')->get()
            );
        });

		View::composer([
            'paylater-transactions.create',
            'paylater-transactions.edit',
        ], function ($view) {
            return $view->with(
                'paylaters',
                \App\Models\Paylater::select('id', 'code')->get()
            );
        });

View::composer([
            'paylater-transactions.create',
            'paylater-transactions.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

				View::composer([
            'products.create',
            'products.edit',
        ], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

		View::composer([
            'products.create',
            'products.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'product-images.create',
            'product-images.edit',
        ], function ($view) {
            return $view->with(
                'products',
                \App\Models\Product::select('id', 'name')->get()
            );
        });

		View::composer([
            'carts.create',
            'carts.edit',
        ], function ($view) {
            return $view->with(
                'products',
                \App\Models\Product::select('id', 'name')->get()
            );
        });

View::composer([
            'carts.create',
            'carts.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'carts.create',
            'carts.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'detail-products.create',
            'detail-products.edit',
        ], function ($view) {
            return $view->with(
                'products',
                \App\Models\Product::select('id', 'name')->get()
            );
        });

		View::composer([
            'user-transaction-items.create',
            'user-transaction-items.edit',
        ], function ($view) {
            return $view->with(
                'userTransactions',
                \App\Models\UserTransaction::select('id', 'credit')->get()
            );
        });

View::composer([
            'user-transaction-items.create',
            'user-transaction-items.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer([
            'user-transaction-items.create',
            'user-transaction-items.edit',
        ], function ($view) {
            return $view->with(
                'products',
                \App\Models\Product::select('id', 'name')->get()
            );
        });

		View::composer([
            'user-transaction-items.create',
            'user-transaction-items.edit',
        ], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		// don`t remove this comment, it will generate view composer
    }
}
