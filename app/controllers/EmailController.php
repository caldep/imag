<?php
/**
 * Created by PhpStorm.
 * User: caldep
 * Date: 25/02/15
 * Time: 03:19 PM
 */

class EmailController extends BaseController{

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function sendEmail($template, $data, $to_email, $subject, $cc_email=false )
    {

        //se agrega el email a la cola de envío
        Mail::queue($template, $data, function($message) use ($to_email,$subject,$cc_email)
        {
            $message->subject($subject);
            //se envía con copia a caldep
            $message->to($to_email)->cc($cc_email);

        });
    }

}