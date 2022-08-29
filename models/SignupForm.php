<?php
namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username','password','password_repeat'],'required'],
            [['username','password','password_repeat'],'string','min'=>4,'max'=>16],
            ['password_repeat','compare','compareAttribute'=>'password']
        ];
    }


    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = \yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \yii::$app->security->generateRandomString($this->token);
        $user->auth_key = \yii::$app->security->generateRandomString($this->key);

        if($user->save())
        {
            return true;
        }
        \yii::error(message. "User was not saved. ". VarDumper::dumpAsString($user->errors));

        return false;
    }


}