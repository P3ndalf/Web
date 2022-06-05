<?

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use app\core\abstraction\BaseActiveRecord;

include_once 'app/core/abstraction/BaseActiveRecord.php';

class ActiveRecordAnalitics extends BaseActiveRecord
{
    public $id;
    public $userName;
    public $ip;
    public $host;
    public $browser;
    public $controller;
    public $date;

    public function __construct()
    {
        $this->tableName = 'analitics';
        parent::__construct();
    }

    public function saveAnalitic($controller)
    {
        $this->controller = $controller;
        $this->date = date('d.m.y h:i:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->userName = $_SESSION['user']['name'];
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
        $this->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

        $this->save();
    }
}
