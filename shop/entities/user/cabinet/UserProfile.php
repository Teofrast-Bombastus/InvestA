<?php
namespace shop\entities\user\cabinet;


use shop\entities\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;

/**
 * User model
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $father_name
 * @property string $nationality
 * @property string $date
 * @property string $passport_serie_and_number
 * @property string $phone
 * @property string $email
 * @property string $job
 * @property string $company_name
 * @property string $position
 * @property string $family
 * @property string $hobby
 * @property boolean $relation_to_government
 * @property boolean $experience_in_finance
 * @property string $profit
 * @property string $sources_of_profit_json
 * @property string $month_profit
 * @property boolean $trust_to_bank
 * @property boolean $agree_for_send_email
 * @property boolean $confirm_information
 * @property integer $status
 * @property integer $created_at
 *
 *
 * @property User $user
 *
 */

class UserProfile extends ActiveRecord
{
    /**
     * @var array
     */
    public $sourcesOfProfit;

    const STATUS_NEW =                  1;
    const STATUS_VERIFY =               2;

    const RELATION_TO_GOVERNMENT_YES =  1;
    const RELATION_TO_GOVERNMENT_NO =   0;

    const EXPERIENCE_IN_FINANCE_YES =   1;
    const EXPERIENCE_IN_FINANCE_NO =    0;

    const PROFIT_FROM_10000 =           1;
    const PROFIT_FROM_30000 =           2;
    const PROFIT_FROM_100000 =          3;
    const PROFIT_FROM_1000000 =         4;

    const SOURCE_PROFIT_JOB =           1;
    const SOURCE_PROFIT_PENSION =       2;
    const SOURCE_PROFIT_DEPOSIT =       3;

    const MONTH_PROFIT_FROM_50000 =     1;
    const MONTH_PROFIT_FROM_100000 =    2;
    const MONTH_PROFIT_FROM_500000 =    3;
    const MONTH_PROFIT_FROM_1000000 =   4;

    const TRUST_TO_BANK_YES =           1;
    const TRUST_TO_BANK_NO =            0;




    public static function create($userId, $firstName, $lastName, $fatherName, $nationality, $date, $passportSerieAndNumber): self
    {
        $obj = new static();
        $obj->user_id = $userId;
        $obj->first_name = $firstName;
        $obj->last_name = $lastName;
        $obj->father_name = $fatherName;
        $obj->nationality = $nationality;
        $obj->date = $date;
        $obj->passport_serie_and_number = $passportSerieAndNumber;
        $obj->created_at = time();
        $obj->status = self::STATUS_NEW;
        return $obj;
    }



    public function setContactInformation($phone, $email, $job, $companyName, $position, $family, $hobby): void
    {
        $this->phone = $phone;
        $this->email = $email;
        $this->job = $job;
        $this->company_name = $companyName;
        $this->position = $position;
        $this->family = $family;
        $this->hobby = $hobby;
    }



    public function setOtherInformation($relationToGovernment, $experienceInFinance, $profit, array $sourcesOfProfit, $monthProfit, $trustToBank, $agreeForSendEmail, $confirmInformation): void
    {
        $this->relation_to_government = $relationToGovernment;
        $this->experience_in_finance = $experienceInFinance;
        $this->profit = $profit;
        $this->sourcesOfProfit = $sourcesOfProfit;
        $this->month_profit = $monthProfit;
        $this->trust_to_bank = $trustToBank;
        $this->agree_for_send_email = $agreeForSendEmail;
        $this->confirm_information = $confirmInformation;
    }


    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public static function tableName()
    {
        return '{{%user_profiles}}';
    }


    public function afterFind(): void
    {
        $this->sourcesOfProfit = array_filter(Json::decode($this->getAttribute('sources_of_profit_json')));
        $this->date = Yii::$app->formatter->asDate($this->getAttribute('date'), 'php:Y-m-d');
        parent::afterFind();
    }

    public function beforeSave($insert): bool
    {
        $this->setAttribute('sources_of_profit_json', Json::encode(array_filter($this->sourcesOfProfit)));
        $this->setAttribute('date', Yii::$app->formatter->asDate($this->date, 'php:Y-m-d'));
        return parent::beforeSave($insert);
    }


}
