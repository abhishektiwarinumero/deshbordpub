<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
	}

	/**
	 * Register the Nova routes.
	 *
	 * @return void
	 */
	protected function routes()
	{
		Nova::routes()
			->withAuthenticationRoutes()
			->withPasswordResetRoutes()
			->register();
	}

	/**
	 * Register the Nova gate.
	 *
	 * This gate determines who can access Nova in non-local environments.
	 *
	 * @return void
	 */
	protected function gate(): void
	{
		Gate::define('viewNova', fn () => true);
	}

	/**
	 * Get the cards that should be displayed on the default Nova dashboard.
	 *
	 * @return array
	 */
	protected function cards(): array
	{
		return [];
	}

	/**
	 * Get the extra dashboards that should be displayed on the Nova dashboard.
	 *
	 * @return array
	 */
	protected function dashboards(): array
	{
		return [];
	}

	/**
	 * Get the tools that should be listed in the Nova sidebar.
	 *
	 * @return array
	 */
	public function tools(): array
	{
		return [];
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register(): void
	{
		//
	}
}
