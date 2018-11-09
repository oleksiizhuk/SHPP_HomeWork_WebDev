<?php /** @noinspection PhpUnhandledExceptionInspection */

/**
 * check url json and unload msg with json.
 */
class JsonHandler
{
    private $urlJson;
    private $oneHour;

    public function __construct($urlJson)
    {
        $this->urlJson = $urlJson;
        $this->oneHour = 3600;
    }

    public function addNewMessageToJson($message)
    {
        $dataBase = CheckJsonFile::check($this->urlJson);
        $this->addNewMsg($message, $dataBase);
    }

    public function unloadNewMessage($lastId)
    {
        $dataBase = CheckJsonFile::check($this->urlJson);
        return $this->getLastMessage($lastId, $dataBase);
    }

    public function getLastMessage($lastId, $dataBase)
    {
        $lastIdMessage = $this->checkCount($dataBase);
        if (!$lastIdMessage) {
            http_response_code(201);
            die();
        }

        if ($lastId >= $lastIdMessage) {
            http_response_code(202);
            die();
        }
        $timeToStr = time("Y-m-d H:i:s", $this->timeMutatorToString());
        $arr = array();
        foreach ($dataBase as $key => $value) {
            $filterToTime = $timeToStr - $value['time'];
            $testId = $value['id'];

            if ($filterToTime < $this->oneHour && $lastId < $testId) {
                $value['time'] = date("H:i:s", $value['time']);
                $arr [] = $value;
            }
        }
        return json_encode($arr);
    }

    private function addNewMsg($message, $dataBase)
    {
        $dateToSecond = $this->timeMutatorToString();
        $message = htmlspecialchars($message, ENT_QUOTES);
        $id = $this->checkCount($dataBase);
        $newMessage = array("user" => $_SESSION['login'], "message" => $message, "time" => $dateToSecond, "id" => ++$id);
        $dataBase[] = $newMessage;
        $result = json_encode($dataBase, JSON_PRETTY_PRINT);
        file_put_contents($this->urlJson, $result);
    }

    private function timeMutatorToString()
    {
        return strtotime(date("Y-m-d H:i:s"));
    }

    private function checkCount($dataBase)
    {
        if (count($dataBase) == 0) {
            return 0;
        }
        return $dataBase[count($dataBase) - 1]["id"];
    }

}
