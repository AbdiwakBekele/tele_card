<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\InventoryCreated;
use App\Events\InventoryDeleted;
use App\Events\DailySalesEvent;
use App\Events\MonthlySalesEvent;

use App\Listeners\UpdateProductCount;
use App\Listeners\UpdateProductCountOnDelete;
use App\Listeners\UpdateDailySales;
use App\Listeners\UpdateMonthlySales;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        InventoryCreated::class => [
            UpdateProductCount::class,
        ],
        InventoryDeleted::class => [
            UpdateProductCountOnDelete::class,
        ],

        DailySalesEvent::class => [
            UpdateDailySales::class,
        ],

        MonthlySalesEvent::class => [
            UpdateMonthlySales::class,
        ],
    ];


    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}