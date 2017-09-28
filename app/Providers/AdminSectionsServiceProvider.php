<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */


  /**  protected $widgets = [
        \Admin\Widgets\DashboardMap::class,
        \Admin\Widgets\NavigationUserBlock::class
    ]; */

    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        \App\gallery::class => 'App\Http\Sections\gallery',
        \App\testgal::class => 'App\Http\Sections\testgal',
        \App\supplier::class => 'App\Http\Sections\supplier',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
