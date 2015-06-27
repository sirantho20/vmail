<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mailbox".
 *
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $language
 * @property string $storagebasedirectory
 * @property string $storagenode
 * @property string $maildir
 * @property integer $quota
 * @property string $domain
 * @property string $transport
 * @property string $department
 * @property string $rank
 * @property string $employeeid
 * @property integer $isadmin
 * @property integer $isglobaladmin
 * @property integer $enablesmtp
 * @property integer $enablesmtpsecured
 * @property integer $enablepop3
 * @property integer $enablepop3secured
 * @property integer $enableimap
 * @property integer $enableimapsecured
 * @property integer $enabledeliver
 * @property integer $enablelda
 * @property integer $enablemanagesieve
 * @property integer $enablemanagesievesecured
 * @property integer $enablesieve
 * @property integer $enablesievesecured
 * @property integer $enableinternal
 * @property integer $enabledoveadm
 * @property integer $enablelib-storage
 * @property integer $enablelmtp
 * @property string $lastlogindate
 * @property integer $lastloginipv4
 * @property string $lastloginprotocol
 * @property string $disclaimer
 * @property string $allowedsenders
 * @property string $rejectedsenders
 * @property string $allowedrecipients
 * @property string $rejectedrecipients
 * @property string $settings
 * @property string $passwordlastchange
 * @property string $created
 * @property string $modified
 * @property string $expired
 * @property integer $active
 * @property string $local_part
 */
class Mailbox extends \yii\db\ActiveRecord
{
    public $pword;
//    public function behaviors()
//    {
//        return [
//            [
//                'class' => \yii\behaviors\TimestampBehavior::className(),
//                'createdAtAttribute' => 'password',    //or 'LastEdited'
//                'updatedAtAttribute' => false,
//                'value' => shell_exec('openssl passwd -1 '.$this->password)
//            ],
//        ];
//    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'quota', 'name'], 'required'],
            [['username'], 'unique'],
            [['quota', 'isadmin', 'isglobaladmin', 'enablesmtp', 'enablesmtpsecured', 'enablepop3', 'enablepop3secured', 'enableimap', 'enableimapsecured', 'enabledeliver', 'enablelda', 'enablemanagesieve', 'enablemanagesievesecured', 'enablesieve', 'enablesievesecured', 'enableinternal', 'enabledoveadm', 'enablelib-storage', 'enablelmtp', 'lastloginipv4', 'active'], 'integer'],
            [['lastlogindate', 'passwordlastchange', 'created', 'modified', 'expired','maildir'], 'safe'],
            [['disclaimer', 'allowedsenders', 'rejectedsenders', 'allowedrecipients', 'rejectedrecipients', 'settings'], 'string'],
            [['username', 'password', 'name', 'storagebasedirectory', 'storagenode', 'maildir', 'domain', 'transport', 'department', 'rank', 'employeeid', 'lastloginprotocol', 'local_part'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 5],
            [['pword'], 'string', 'min' => 6],
            [['password'],'validateEmail'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Email',
            'password' => 'Password',
            'name' => 'Full Name',
            'language' => 'Language',
            'storagebasedirectory' => 'Storagebasedirectory',
            'storagenode' => 'Storagenode',
            'maildir' => 'Maildir',
            'quota' => 'Storage Quota(MB)',
            'domain' => 'Domain',
            'transport' => 'Transport',
            'department' => 'Department',
            'rank' => 'Rank',
            'employeeid' => 'Employeeid',
            'isadmin' => 'Isadmin',
            'isglobaladmin' => 'Isglobaladmin',
            'enablesmtp' => 'Enablesmtp',
            'enablesmtpsecured' => 'Enablesmtpsecured',
            'enablepop3' => 'Enablepop3',
            'enablepop3secured' => 'Enablepop3secured',
            'enableimap' => 'Enableimap',
            'enableimapsecured' => 'Enableimapsecured',
            'enabledeliver' => 'Enabledeliver',
            'enablelda' => 'Enablelda',
            'enablemanagesieve' => 'Enablemanagesieve',
            'enablemanagesievesecured' => 'Enablemanagesievesecured',
            'enablesieve' => 'Enablesieve',
            'enablesievesecured' => 'Enablesievesecured',
            'enableinternal' => 'Enableinternal',
            'enabledoveadm' => 'Enabledoveadm',
            'enablelib-storage' => 'Enablelib Storage',
            'enablelmtp' => 'Enablelmtp',
            'lastlogindate' => 'Lastlogindate',
            'lastloginipv4' => 'Lastloginipv4',
            'lastloginprotocol' => 'Lastloginprotocol',
            'disclaimer' => 'Disclaimer',
            'allowedsenders' => 'Allowedsenders',
            'rejectedsenders' => 'Rejectedsenders',
            'allowedrecipients' => 'Allowedrecipients',
            'rejectedrecipients' => 'Rejectedrecipients',
            'settings' => 'Settings',
            'passwordlastchange' => 'Passwordlastchange',
            'created' => 'Created',
            'modified' => 'Modified',
            'expired' => 'Expired',
            'active' => 'Status',
            'local_part' => 'Local Part',
            'pword' => 'Password'
        ];
    }

    public function validateEmail($attribute, $params)
    {
        if(substr_count($this->username, '@') > 1)
        {
            $this->addError('username',"@ symbol is not allowed in mailbox name");
        }
    }
    public function beforeValidate()
    {
        if($this->isNewRecord)
        {
            //$this->password = shell_exec('openssl passwd -1 '.'P@ssw0rd');
            $this->password = shell_exec('doveadm pw -s \'ssha512\' -p '.'P@ssw0rd');
            
            $username1 = $this->username;
            
            $this->domain = Account::findOne(\Yii::$app->user->identity->account_id)->domain;
            $this->username = $this->username.'@'.$this->domain;
            
            $parts = str_split($this->username);
            $dir = $this->domain.'/'.$parts[0].'/'.$parts[1].'/'.$parts[2].'/'.$username1.'-'.date("Y.m.d.H.i.s");
            $this->maildir = $dir;
            //die($dir);
        }
        
        return parent::beforeValidate();
    }
    

}