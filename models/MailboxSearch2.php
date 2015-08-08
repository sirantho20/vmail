<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mailbox;

/**
 * MailboxSearch represents the model behind the search form about `app\models\Mailbox`.
 */
class MailboxSearch2 extends Mailbox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name', 'language', 'storagebasedirectory', 'storagenode', 'maildir', 'domain', 'transport', 'department', 'rank', 'employeeid', 'lastlogindate', 'lastloginprotocol', 'disclaimer', 'allowedsenders', 'rejectedsenders', 'allowedrecipients', 'rejectedrecipients', 'settings', 'passwordlastchange', 'created', 'modified', 'expired', 'local_part'], 'safe'],
            [['quota', 'isadmin', 'isglobaladmin', 'enablesmtp', 'enablesmtpsecured', 'enablepop3', 'enablepop3secured', 'enableimap', 'enableimapsecured', 'enabledeliver', 'enablelda', 'enablemanagesieve', 'enablemanagesievesecured', 'enablesieve', 'enablesievesecured', 'enableinternal', 'enabledoveadm', 'enablelib-storage', 'enablelmtp', 'lastloginipv4', 'active'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Mailbox::find();
        //$query = Mailbox::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
        ]);

        $this->load($params);

//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        $query->andFilterWhere([
            'quota' => $this->quota,
            'isadmin' => $this->isadmin,
//            'isglobaladmin' => $this->isglobaladmin,
//            'enablesmtp' => $this->enablesmtp,
//            'enablesmtpsecured' => $this->enablesmtpsecured,
//            'enablepop3' => $this->enablepop3,
//            'enablepop3secured' => $this->enablepop3secured,
//            'enableimap' => $this->enableimap,
//            'enableimapsecured' => $this->enableimapsecured,
//            'enabledeliver' => $this->enabledeliver,
//            'enablelda' => $this->enablelda,
//            'enablemanagesieve' => $this->enablemanagesieve,
//            'enablemanagesievesecured' => $this->enablemanagesievesecured,
//            'enablesieve' => $this->enablesieve,
//            'enablesievesecured' => $this->enablesievesecured,
//            'enableinternal' => $this->enableinternal,
//            'enabledoveadm' => $this->enabledoveadm,
//            'enablelib-storage' => $this->enablelib-storage,
//            'enablelmtp' => $this->enablelmtp,
//            'lastlogindate' => $this->lastlogindate,
//            'lastloginipv4' => $this->lastloginipv4,
//            'passwordlastchange' => $this->passwordlastchange,
//            'created' => $this->created,
//            'modified' => $this->modified,
//            'expired' => $this->expired,
//            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'storagebasedirectory', $this->storagebasedirectory])
            ->andFilterWhere(['like', 'storagenode', $this->storagenode])
            ->andFilterWhere(['like', 'maildir', $this->maildir])
            ->andFilterWhere(['like', 'domain', $this->domain])
            ->andFilterWhere(['like', 'transport', $this->transport])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'rank', $this->rank])
            ->andFilterWhere(['like', 'employeeid', $this->employeeid])
            ->andFilterWhere(['like', 'lastloginprotocol', $this->lastloginprotocol])
            ->andFilterWhere(['like', 'disclaimer', $this->disclaimer])
            ->andFilterWhere(['like', 'allowedsenders', $this->allowedsenders])
            ->andFilterWhere(['like', 'rejectedsenders', $this->rejectedsenders])
            ->andFilterWhere(['like', 'allowedrecipients', $this->allowedrecipients])
            ->andFilterWhere(['like', 'rejectedrecipients', $this->rejectedrecipients])
            ->andFilterWhere(['like', 'settings', $this->settings])
            ->andFilterWhere(['like', 'local_part', $this->local_part]);

        return $dataProvider;
    }
}
