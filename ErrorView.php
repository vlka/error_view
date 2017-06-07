<?php
namespace vlka\components\error_view;

use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;
use yii\debug\Module;

class ErrorView extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->errorHandler->callStackItemView = '@vlka/components/error_view/callStackItem.php';
        Event::on(Module::className(), Module::EVENT_BEFORE_ACTION, function($event){
            $event->sender->traceLine = '<a href="phpstorm://open?file={file}&line={line}">{file}:{line}</a>';
        });
    }
}