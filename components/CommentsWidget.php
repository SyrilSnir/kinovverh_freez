<?php

namespace app\components;

use yii\base\Widget;
use app\models\Forms\CommentForm;
use app\models\ActiveRecord\Films;
/**
 * Description of CommentsWidget
 *
 * @author kotov
 */
class CommentsWidget extends Widget 
{
    /**
     *
     * @var Films
     */
    public $film;    
    public $commentForm;
    
    public function init() 
    {
        $this->commentForm = new CommentForm();
        $this->commentForm->filmId = $this->film->id;
        $this->commentForm->filmSlug = $this->film->code;
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
