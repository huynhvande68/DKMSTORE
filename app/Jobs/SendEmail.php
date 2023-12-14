<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMailCoupon;
use App\Models\Admin\Coupon;
use Illuminate\Support\Facades\Mail;


class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;
    public $cp;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details, Coupon $cp)
    {
        $this->details = $details;
        $this->cp = $cp;      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {        
        $email = new SendMailCoupon($this->cp);
        Mail::to($this->details)->send($email);
    }
}
