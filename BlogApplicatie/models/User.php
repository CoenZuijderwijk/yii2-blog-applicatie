<?php

namespace app\models;
use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Util\Json;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int|null $accessLevel
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const LEVEL_REGISTERED=0, LEVEL_AUTHOR=1, LEVEL_ADMIN=6, LEVEL_SUPERADMIN=99;

    public static function getAccessLevelList( $level = null ){
        $levelList=array(
            self::LEVEL_REGISTERED => 'Registered',
            self::LEVEL_AUTHOR => 'Author',
            self::LEVEL_ADMIN => 'Administrator'
        );
        if( $level === null)
            return $levelList;
        return $levelList[ $level ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = User::findOne($id);
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = (new \yii\db\Query())
            ->select(['*'])
            ->from('user')
            ->where('accesToken = :token', [':token' => $token])
            ->one();
        return $user;
    }



    /**
     * Finds user by username
     *
     * @param string $username
     * @return Object
     */
    public static function findByUsername($username)
    {

        $user = User::find()
        ->where(["username" => $username])
        ->one();

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param json $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function fields() {
        return [
            'id',
            'username',
            'password',
            'authKey',
            'accessToken',
            'accessLevel',
        ];
    }

    public static function tableName() {
        return 'user';
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Name',
        ];
    }

    public function getAccessLevel() {
        return $this->accessLevel;
    }


}
