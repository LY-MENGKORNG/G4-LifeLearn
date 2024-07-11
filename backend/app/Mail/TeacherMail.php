<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeacherMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data; // Update variable name to follow Laravel naming conventions

    /**
     * Create a new message instance.
     *
     * @param mixed $mail_data
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Teacher Mail')
                    ->view('Mail.teacher') // Update view path to match your actual Blade template path
                    ->with([
                        'data' => $this->mail_data, // Pass data as an associative array
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
