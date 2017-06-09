<?php
namespace vlka\errorview;

use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;
use yii\debug\Module;
use yii\web\Application;

class ErrorView extends Component implements BootstrapInterface
{
    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        if($app instanceof Application){
            $app->errorHandler->callStackItemView = '@vlka/errorview/callStackItem.php';
            Event::on(Module::className(), Module::EVENT_BEFORE_ACTION, function($event){
                $event->sender->traceLine = '<a href="phpstorm://open?file={file}&line={line}">{file}:{line}</a>';
            });
        }
    }
}