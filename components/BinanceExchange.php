<?
namespace app\components;

use app\models\CurrencyForm;
use Binance;

use yii\helpers\ArrayHelper;

class BinanceExchange {

    //public static function retrieveGraphic($symbol,$date_start,$date_end,$limit=100,$timeframe='5m'){
    public static function retrieveGraphic(CurrencyForm $form){
        $timeframe=$form->timeframe;

        ob_start();// do not show errors of missing key secret pair
        $api = new Binance\API();

        $interval=5*60;
        if($timeframe=='1d'){
            $interval=24*3600;
        }


        $candles1=[];
        for($i=strtotime($form->date_end);$i<strtotime($form->date_start);$i+=1000*$interval){
            $candles1 = $candles1+ $api->candlesticks($form->symbol,$timeframe,$form->limit,$i*1000,($i+1000*$interval)*1000);
        }
        $content = ob_get_contents();
        ob_end_clean();
        return $candles1;
    }


}


?>