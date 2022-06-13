<?

use app\core\abstraction\BaseActiveRecord;

include_once 'app/core/abstraction/BaseActiveRecord.php';

class ActiveRecordComment extends BaseActiveRecord
{

    public $id;
    public $authorId;
    public $blogId;
    public $content;
    public $date;

    public function __construct()
    {
        $this->tableName = 'commentaries';
        parent::__construct();
    }
}
