<?php
class Task
{
    private $status;
    private $action;
    public $nextActionsWork = [];
    public $nextActionsNew = [];
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
    public function _construct(int $ExecutorID, int $CustomerID){
        $this->ExecutorID = $ExecutorID;
        $this->CustomerID = $CustomerID;
        $this->nextActionsNew = $nextActionsNew;
        $this->nextActionsWork = $nextActionsWork;
    }
    public $statusMap = ['new' => 'новое', 'canceled' => 'отменено', 'in_work' => 'в работе', 'performed' => 'выполнено', 'failed' => 'провалено'];
    public $actionMap = ['to_publish' => 'опубликовать','cancel' => 'отменить','respond' =>'откликнуться','choose_a_performer' => 'выбрать исполнителя','mark_as_completed' => 'отметить задание как выполненое','refuse' => 'отказаться'];
    public function getNextStatus(){
       switch ($this->action) {
            case self::ACTION_PUBLISH: 
               return self::STATUS_NEW;
            case self::ACTION_CANCEL: 
               return self::STATUS_CANCEL;
            case self::ACTION_CHOOSE_IMPLEMENTER:
               return self::STATUS_IN_WORK;
            case self::ACTION_REALIZE:
               return self::STATUS_PERFORMED;
            case self::ACTION_REFUSE:
               return self::STATUS_FAILED;
        } 
    }
    public function getNextActions(){
        switch($this->status){         
            case self::STATUS_IN_WORK:
                return $this->nextActionsWork = array(self::ACTION_REALIZE, self::ACTION_REFUSE);
            case self::STATUS_NEW:
                return $this->nextActionsNew = array( self::ACTION_CANCEL, self::ACTION_RESPOND);  
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