<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScheduleMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $title;
    protected $content;
    protected $daystart;
    protected $dayend;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title , $content , $dayend , $daystart)
    {
      $this->title = $title;
      $this->content = $content;
      $this->daystart = $daystart;
      $this->dayend = $dayend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $titles = $this->title;
        $contents = $this->content;
        $day_start = $this->daystart;
        $day_end = $this->dayend;
        return $this->subject('ShopAndKV có chương trình mới')
        ->view('admin.loadView.schedule.templete',compact('titles','contents','day_start','day_end'));
    }
}
