<?php

namespace App\Library;

use Illuminate\Support\Facades\Log;
use SoapClient;

class MellatBank
{

    private $terminalId;
    private $userName;
    private $password;
    private $requestUrl;
    private $callBackUrl;
    public $errors = array(
        11 => 'شماره کارت نامعتبر است',
        12 => 'موجودی کافی نیست',
        13 => 'رمز نادرست است',
        14 => 'تعداد دفعات وارد کردن رمز بیش از حد مجاز است',
        15 => 'کارت نامعتبر است',
        16 => 'دفعات برداشت وجه بیش از حد مجاز است',
        17 => 'کاربر از انجام تراکنش منصرف شده است',
        18 => 'تاریخ انقضای کارت گذشته است',
        19 => 'مبلغ برداشت وجه بیش از حد مجاز است',
        111 => 'صادر کننده کارت نامعتبر است',
        112 => 'خطای سوییچ صادر کننده کارت',
        113 => 'پاسخی از صادر کننده کارت دریافت نشد',
        114 => 'دارنده این کارت مجاز به انجام این تراکنش نیست',
        21 => 'پذیرنده نامعتبر است',
        23 => 'خطای امنیتی رخ داده است',
        24 => 'اطلاعات کاربری پذیرنده نامعتبر است',
        25 => 'مبلغ نامعتبر است',
        31 => 'پاسخ نامعتبر است',
        32 => 'فرمت اطلاعات وارد شده صحیح نمی‌باشد',
        33 => 'حساب نامعتبر است',
        34 => 'خطای سیستمی',
        35 => 'تاریخ نامعتبر است',
        41 => 'شماره درخواست تکراری است',
        42 => 'تراکنش Sale یافت نشد',
        43 => 'قبلا درخواست Verfiy داده شده است',
        44 => 'درخواست Verfiy یافت نشد',
        45 => 'تراکنش Settle شده است',
        46 => 'تراکنش Settle نشده است',
        47 => 'تراکنش Settle یافت نشد',
        48 => 'تراکنش Reverse شده است',
        49 => 'تراکنش Refund یافت نشد.',
        412 => 'شناسه قبض نادرست است',
        413 => 'شناسه پرداخت نادرست است',
        414 => 'سازمان صادر کننده قبض نامعتبر است',
        415 => 'زمان جلسه کاری به پایان رسیده است',
        416 => 'خطا در ثبت اطلاعات',
        417 => 'شناسه پرداخت کننده نامعتبر است',
        418 => 'اشکال در تعریف اطلاعات مشتری',
        419 => 'تعداد دفعات ورود اطلاعات از حد مجاز گذشته است',
        421 => 'IP نامعتبر است',
        51 => 'تراکنش تکراری است',
        54 => 'تراکنش مرجع موجود نیست',
        55 => 'تراکنش نامعتبر است',
        61 => 'خطا در واریز'
    );

    public function __construct()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $this->terminalId = config('gateway.mellat.terminalId');
        $this->userName = config('gateway.mellat.username');
        $this->password = config('gateway.mellat.password');
        $this->requestUrl = "https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl";
        $this->callBackUrl = "https://landiper.com/back-bank";
    }

    public function startPayment($orderData)
    {
        $data = [
            'amount' => $orderData['amount'],
            'terminalId' => $this->terminalId,
            'userName' => $this->userName,
            'userPassword' => $this->password,
            'orderId' => $orderData['order_id'],
            'callBackUrl' => $orderData['back_url'],
            'additionalData' => $orderData['additional_data'],
            'localDate' => date('Ymd'),
            'localTime' => date('His'),
            'payerId' => 0
        ];

        $namespace = 'http://interfaces.core.sw.bps.com/';

        $client = new SoapClient($this->requestUrl);

        $result = $client->bpPayRequest($data, $namespace);

        $res = explode(',', $result->return);



        return $res;

    }

    public function verifyPayment($orderData)
    {

        $data = [
            'terminalId' => $this->terminalId,
            'userName' => $this->userName,
            'userPassword' => $this->password,
            'orderId' => $orderData['saleOrderId'],
            'saleOrderId' => $orderData['saleOrderId'],
            'saleReferenceId' => $orderData['saleReferenceId'],
        ];

        $namespace = 'http://interfaces.core.sw.bps.com/';

        $client = new SoapClient($this->requestUrl);
        $result = $client->bpVerifyRequest($data, $namespace);

        $res = explode(',', $result->return);

        return $res[0];
    }

    public function settlePayment($orderData)
    {
        $data = [
            'terminalId' => $this->terminalId,
            'userName' => $this->userName,
            'userPassword' => $this->password,
            'orderId' => $orderData['saleOrderId'],
            'saleOrderId' => $orderData['saleOrderId'],
            'saleReferenceId' => $orderData['saleReferenceId'],
        ];

        Log::info(json_encode($data));

        $namespace = 'http://interfaces.core.sw.bps.com/';

        $client = new SoapClient($this->requestUrl);

        $result = $client->bpSettleRequest($data, $namespace);

        $res = explode(',', $result->return);

        return $res[0];
    }
}
