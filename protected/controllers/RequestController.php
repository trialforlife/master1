<?php class RequestController extends CController{
    public $params,$method;
    public function __construct() {
        $this->method = $_SERVER["REQUEST_METHOD"]; // Получим метод
        if($this->method == 'PUT'){ // Если метод PUT парсим параметры в ручную :)
            $this->params = array(); 
            $putdata = file_get_contents('php://input'); // Взяли все данные
            parse_str($putdata,$this->params);   // Распарсили
        }  else {
            this->params = $_REQUEST;
        }
    }   
}
?>