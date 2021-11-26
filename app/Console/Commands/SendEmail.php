<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class SendEmail extends Command
{
    protected $signature = 'email:birthday';

    protected $description = 'Send a happy birthday email to a customer';

    
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $customer_birthday = Customer::whereMonth('customer_birthday', '=', Carbon::now()->format('m'))
                        ->whereDay('customer_birthday', '=', Carbon::now()->format('d'))
                        ->get();
        $data = [];                
        foreach ($customer_birthday as $birthday)
        {
            $data['email'][] = $birthday->customer_email;
            
            // Mail::raw('Happy Birthday, Chúc quý khách có một ngày sinh nhật vui vẻ, Cảm ơn quý khách đã luôn luôn ủng hộ và đồng hành cùng chúng tôi.', 
            //     function ($message) use ($birthday){
            //         $message->from('levanhoa12042001@gmail.com');
            //         $message->to($birthday->customer_email)->subject('Happy Birthday');
            // });
        }
        Mail::send('mail.sendmail', $data, function ($message) use($birthday, $data){
            $message->from('levanhoa12042001@gmail.com');
            $message->to($data['email'])->subject('Happy Birthday');
        });
        $this->info('SendMail Success');

    }
}
