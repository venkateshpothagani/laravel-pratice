<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Models\Customer;
use App\Mail\Remainder;

class FiveMinsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'five:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail for every 5 mins';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customers = Customer::all(['email']);

        foreach ($customers as $customer) {
            Mail::to(trim($customer["email"]))->send(new Remainder($customer["email"]));
        }

        $this->info('5 Mins Update has been send successfully');
        info("send mail successfully");

        return Command::SUCCESS;
    }
}
