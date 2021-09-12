<?php
class Task
{
    private $status;
    private $action;
    public $next_actions_work = [];
    public $next_actions_new = [];
    const STATUS_NEW = 'new';
    const STATUS_CANCEL = 'canceled' ;
    const STATUS_IN_WORK = 'in_work';
    const STATUS_PERFORMED = 'performed';
    const STATUS_FAILED = 'failed';

    const ACTION_PUBLISH = 'to_publish';
    const ACTION_CANCEL = 'action_cancel';
    const ACTION_CHOOSE_IMPLEMENTER = 'choose_a_performer';
    const ACTION_REALIZE = 'mark_as_completed';
    const ACTION_REFUSE = 'refuse';
    const ACTION_RESPOND = 'respond';
    public function _construct( $ExecutorID,$CustomerID){
        $this->ExecutorID = $ExecutorID;
        $this->CustomerID = $CustomerID;
        $this->next_actions_new = $next_actions_new;
        $this->next_actions_work = $next_actions_work;
    }
    public $status_map = ['new' => 'новое', 'canceled' => 'отменено', 'in_work' => 'в работе', 'performed' => 'выполнено', 'failed' => 'провалено'];
    public $action_map = ['to_publish' => 'опубликовать','cancel' => 'отменить','respond' =>'откликнуться','choose_a_performer' => 'выбрать исполнителя','mark_as_completed' => 'отметить задание как выполненое','refuse' => 'отказаться'];


    //Перевод в следующий статус
    public function getNextStatus(){
       switch ($this->action) {
            case self::ACTION_PUBLISH: return self::STATUS_NEW;
            case self::ACTION_CANCEL: return self::STATUS_CANCEL;
            case self::ACTION_CHOOSE_IMPLEMENTER: return self::STATUS_IN_WORK;
            case self::ACTION_REALIZE: return self::STATUS_PERFORMED;
            case self::ACTION_REFUSE: return self::STATUS_FAILED;
        } 
    }
    //Перевод в следующее действие
    public function getNextActions(){
        switch($this->status){
            
            case self::STATUS_IN_WORK:return $this->next_actions_work = array(self::ACTION_REALIZE, self::ACTION_REFUSE);
            case self::STATUS_NEW:return $this->next_actions_new = array( self::ACTION_CANCEL, self::ACTION_RESPOND);  
        } 
    }

    public function getAction()
    {
        return $this->action;
    }


    public function setAction($action)
    {
        $this->action = $action;
    }
    
        public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }
}