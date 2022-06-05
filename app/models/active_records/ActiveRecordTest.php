<?

use app\core\abstraction\BaseActiveRecord;

include_once 'app/core/abstraction/BaseActiveRecord.php';

class ActiveRecordTest extends BaseActiveRecord
{

    public $id;
    public $name;
    public $lastName;
    public $email;
    public $qstn1;
    public $qstn2;
    public $qstn3;
    public $date;

    public function __construct()
    {
        $this->tableName = 'test';
        parent::__construct();
    }
}
