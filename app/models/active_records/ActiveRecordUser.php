<?

use app\core\abstraction\BaseActiveRecord;

include_once 'app/core/abstraction/BaseActiveRecord.php';

class ActiveRecordUser extends BaseActiveRecord
{
    public $id;
    public $name;
    public $password;
    public $role;

    public function __construct()
    {
        $this->tableName = 'users';
        parent::__construct();
    }
}
