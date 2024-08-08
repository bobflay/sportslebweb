<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;
use App\Nova\Metrics\NewCheckin;
use App\Nova\Metrics\NewSubscription;
use App\Nova\Metrics\NewUser;
use App\Nova\Metrics\Reservation;


class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NewCheckin,
            new NewSubscription,
            new NewUser,
            new Reservation
        ];
    }
}
