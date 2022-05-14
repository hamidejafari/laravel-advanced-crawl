<?php

namespace App\Library;

use App\Models\Order;
use App\Models\Ticket;
use App\User;
use Illuminate\Support\Facades\Log;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class Sms
{

    //website ip :
    private $kavenegarApi;
    private $sender;
    public function __construct()
    {
        $this->kavenegarApi = "656F58557978575438344C79696D346469584E2B4A6A36634972797A45444C6658414D76794B7A384C306F3D";
        $this->sender = "10008663";
    }
    public static function confirmCode($user_id)
    {
        try{
            $user = User::find($user_id);
            $api = new KavenegarApi("656F58557978575438344C79696D346469584E2B4A6A36634972797A45444C6658414D76794B7A384C306F3D");
            $sender ="10008663";
            $message = 'کد فعال سازی اکانت شما در سایت لندیپر ' . $user->mobile_confirm_code . '  میباشد ';
            $receptor = [$user->mobile];
            $result = $api->Send($sender,$receptor,$message);
            return $result;
        }
        catch(ApiException $e){
            \Log::info($e->errorMessage());
            return false;
        }
        catch(HttpException $e){
            \Log::info($e->errorMessage());
            return false;
        }
    }
    public static function orderStatusUser($msg,$mobile)
    {
         try{
            $api = new KavenegarApi("656F58557978575438344C79696D346469584E2B4A6A36634972797A45444C6658414D76794B7A384C306F3D");
            $sender ="10008663";
            $receptor = [$mobile];
            $result = $api->Send($sender,$receptor,$msg);
            return $result;
        }
        catch(ApiException $e){
            \Log::info($e->errorMessage());
            return false;
        }
        catch(HttpException $e){
            \Log::info($e->errorMessage());
            return false;
        }

    }
    public static function ticketUser($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        $user = User::find(@$ticket->user_id);
        $msg = @$user->name . ' ' . @$user->family ."
        
        ". " تیکت شما توسط پشتیبانی پاسخ داده شد.  ";
        try{
             $api = new KavenegarApi("656F58557978575438344C79696D346469584E2B4A6A36634972797A45444C6658414D76794B7A384C306F3D");
            $sender ="10008663";
            $receptor = [$user->mobile];
            $result = $api->Send($sender,$receptor,$msg);
            return $result;
        }
        catch(ApiException $e){
            \Log::info($e->errorMessage());
            return false;
        }
        catch(HttpException $e){
            \Log::info($e->errorMessage());
            return false;
        }

    }
}
