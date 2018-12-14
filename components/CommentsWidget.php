<?php

namespace app\components;

use yii\base\Widget;
use app\models\Forms\CommentForm;
/**
 * Description of CommentsWidget
 *
 * @author kotov
 */
class CommentsWidget extends Widget 
{
    public $film;    
    public $commentForm;
    
    public function init() 
    {
        $this->commentForm = new CommentForm();
        parent::init(); 
    }

    public function run()
    {
        return $this->render('comments/comments',[
            'film' => $this->film,
            'commentForm' => $this->commentForm
                ]);
    }
}
