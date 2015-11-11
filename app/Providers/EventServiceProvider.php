<?php

namespace CodeCommerce\Providers;

use CodeCommerce\Product;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Storage;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'CodeCommerce\Events\SomeEvent' => [
            'CodeCommerce\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Product::deleted(function ($product) {
            foreach ($product->images as $image) {
                Storage::disk('local_public')->delete($image->id.'.'.$image->extension);
            }
        });

    }
}
