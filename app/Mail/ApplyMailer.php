<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $db_file_name;

    public function __construct($data,$db_file_name)
    {
        $this->data = $data;
        $this->db_file_name = $db_file_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.send-contact-us')->attach(public_path($this->db_file_name))->subject('Request from Contact Page from Abizglobal ');
    }
}
