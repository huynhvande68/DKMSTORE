<?php

namespace App\Mail;

use App\Models\Admin\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCoupon extends Mailable
{
    use Queueable, SerializesModels;
    protected $param;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Coupon $param)
    {
        $this->param = $param;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $coupon =  $this->param;
        return $this->subject('ShopAndKV gửi tặng bạn')
        ->view('admin.loadView.sendmail.templete',compact('coupon'));
    }
}
