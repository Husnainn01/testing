<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class UpdateExchangeRates extends Command
{
    protected $signature = 'update:exchange-rates';
    protected $description = 'Fetch and update exchange rates for currencies other than USD';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $currencies = Currency::where('symbol', '!=', '$')->get();
    
        foreach ($currencies as $currency) {
            $code = $currency->symbol;
            $name = $currency->name;
            $rate = $this->fetchExchangeRate($name);
            if (!is_null($rate)) {
                $currency->update(['value' => $rate]);
                $this->info("1 USD = $rate $code ($name)");
            } else {
                $this->error("Failed to fetch exchange rate for $code ($name).");
            }
        }
    }
    

    private function fetchExchangeRate($code)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/fixer/convert?to=JPY&from=USD&amount=1",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: amSzviJfn2koVZ23kVgl3vsFQqn32TOj"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        if (isset($data['result'])) {
            return $data['result'];
        }
    
        return null;
    }
    
    
}
