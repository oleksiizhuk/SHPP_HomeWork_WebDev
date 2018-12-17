<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace app;
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
        $this->checkUser();

        $timeToStr = time("Y-m-d H:i:s", $this->timeMutatorToString());

        $lastIdMessage = $this->checkCount($dataBase);

        if (!$lastIdMessage || $lastId >= $lastIdMessage || ($dataBase[count($dataBase) - 1]["time"]) < $timeToStr - $this->oneHour) {
            http_response_code(202);
            die();
        }

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
        $this->checkUser();
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
        if (count($dataBase) === 0) {
            return 0;
        }
        return $dataBase[count($dataBase) - 1]["id"];
    }

    private function checkUser()
    {
        if (isset($_SESSION['login'])) {
            return;
        }
        http_response_code(400);
        die();
    }

}
