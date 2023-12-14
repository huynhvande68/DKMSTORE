<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ScheduleMail;
use Illuminate\Support\Facades\Mail;
class ScheduleSendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $customer;
    protected $title;
    protected $content;
    protected $daystart;
    protected $dayend;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer, $title,$content ,$daystart ,$dayend)
    {
        $this->customer = $customer;
        $this->title = $title;
        $this->content = $content;
        $this->daystart = $daystart;
        $this->dayend = $dayend;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $email = new ScheduleMail($this->title, $this->content , $this->daystart , $this->dayend);
        Mail::to($this->customer)->send($email);
    }
}
