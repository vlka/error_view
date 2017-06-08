<?php
namespace vlka\error_view;

use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;
use yii\debug\Module;

class ErrorView extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->errorHandler->callStackItemView = '@vlka/yii2-error_view/callStackItem.php';
        Event::on(Module::className(), Module::EVENT_BEFORE_ACTION, function($event){exit(555);
            $event->sender->traceLine = '<a href="phpstorm://open?file={file}&line={line}">{file}:{line}</a>';
        });
    }
}