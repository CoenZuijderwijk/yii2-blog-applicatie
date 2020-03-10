<?php
namespace app\components;
use app\models\User;

/**
 * @property boolean $isAdmin
 * @property boolean $isSuperAdmin
 * @property User $user
 * @property int $id
 */
class WebUser extends User{
    /**
     * cache for the logged in UserController active record
     * @return User
     */
    private $isGuest;

    /**
     * is the user a superadmin ?
     * @return boolean
     */
    function getIsSuperAdmin(){
        return ( $this->user && $this->user->accessLevel == User::LEVEL_SUPERADMIN );
    }

    public function getIsGeust() {
        return $this->isGuest;
    }

    /**
     * is the user logged in ?
     * @return boolean
     */
    function getIsRegister() {
        return ($this->user && $this->user->accessLevel == User::LEVEL_REGISTERED);
    }

    /**
     * is the user an administrator ?
     * @return boolean
     */
    function getIsAdmin(){
        return ( $this->user && $this->user->accessLevel >= User::LEVEL_ADMIN );
    }


    /**
     * get the logged user
     * @return User|null the user active record or null if user is guest
     */
    function getUser(){
        if( $this->isGuest )
            return null;
        if( $this->_user === null ){
            $this->_user = User::findOne($this->id);
        }
        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => "naam",
            'password' => "Wachtwoord",
        ];
    }

    public static function tableName() {
        return 'user';
    }


}
?>