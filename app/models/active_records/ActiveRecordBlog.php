<?

use app\core\abstraction\BaseActiveRecord;

include_once 'app/core/abstraction/BaseActiveRecord.php';

class ActiveRecordBlog extends BaseActiveRecord
{

    public $id;
    public $theme;
    public $imageLink;
    public $content;
    public $date;

    public function __construct()
    {
        $this->tableName = 'blogs';
        parent::__construct();
    }
}
