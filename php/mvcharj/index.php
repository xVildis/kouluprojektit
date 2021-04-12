<?php
session_start();

class Model {
    private $text;
    public function __construct($text = 'Hello World') {
        $this->text = $text;
    }
    public function getText() {
        return $this->text;
    }
    public function setText($text) {
        return new Model($text);
    }
}
class View {
    public function output(Model $model) {
        return '<a href="index.php?action=textclicked">' . $model->getText() . '</a>';
    }
}
class Controller {
    public function notLogged(Model $model): model {
        return $model->setText('Index page');
    }

    public function textClicked(Model $model): Model {
        return $model->setText('Text Clicked');
    }
}
$model = new Model();
$controller = new Controller();
$view = new View();

if (isset($_GET['action'])) {
    $model = $controller->{$_GET['action']}($model);
} else {
    $model = $controller->notLogged($model);
}
echo $view->output($model);


?>