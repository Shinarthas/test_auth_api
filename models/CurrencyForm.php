<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 20.09.2020
 * Time: 17:13
 */

namespace app\models;


use yii\base\Model;

class CurrencyForm extends Model
{
    public $symbol;
    public $timeframe;
    public $limit;
    public $date_start;
    public $date_end;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['symbol', 'timeframe', 'limit', 'date_start','date_end'], 'required'],
            [['symbol', 'timeframe'], 'string'],
            [['limit', ], 'number'],
            [['date_start','date_end' ], 'datetime'],

        ];
    }
}