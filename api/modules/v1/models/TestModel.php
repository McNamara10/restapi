<?php
/**
 * Created by PhpStorm.
 * User: simone.checcoli
 * Date: 30/12/2016
 * Time: 17:44
 */

namespace api\modules\v1\models;

use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Linkable;

// Puoi estendere il model che credi (anche di backend, ma meglio metterlo in common se deve essere condiviso da altri..)

class TestModel extends ActiveRecord  implements Linkable
{

    public function fields()
    {
        return [
            'elenco_dei_field_che_vuoi_mostrare_altrimenti_commenti_la_funzione'
        ];
    }

    public function getLinks()
    {
        return [
            /* Link::REL_SELF => Url::to(['user/view', 'id' => $this->user_id], true),*/
            /* 'edit' => Url::to(['user/view', 'id' => $this->user_id], true),*/
            'profile' => Url::to(['test-model/view', 'id' => $this->id], true)
            /* 'index' => Url::to(['users'], true),*/
        ];
    }

}