<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Password_Reset_Mail extends Mailable
{
    use Queueable, SerializesModels;

    protected $password,$name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$name)
    {
        $this->password=$data;
        $this->name=$name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $img="https://maga.engineering//img/logo_email.png";

        return $this->view('user.emp_password_reset')->with(['password'=>$this->password,'img'=>$img,'user'=>$this->name]);
    }
}
