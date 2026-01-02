<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OrderAssignmentService;

class AssignOrdersCron extends Command
{
    protected $signature = 'orders:auto-assign';

    protected $description = 'Automatically assign pending orders to delivery boys';

    protected $service;

    public function __construct(OrderAssignmentService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle()
    {
        $this->service->autoAssignOrders();

        $this->info('Orders assigned successfully.');
    }
}
