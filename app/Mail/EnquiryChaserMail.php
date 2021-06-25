<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\models;

class EnquiryChaserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $model;
    protected $feedbacks;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model, $feedbacks)
    {
        $this->model = $model;
        $this->feedbacks = $feedbacks;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.enquiry.chaser')
                    ->subject('Still looking to replace your '.$this->model->brand->name.' '.$this->model->series.' '.$this->model->name.'\'s Screen? | Doctor Display')
                    ->with([
                      'model' => $this->model,
                      'feedbacks' => $this->feedbacks,
                    ]);
    }
}
