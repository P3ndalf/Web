<?php

include_once 'app/models/active_records/ActiveRecordAnalitics.php';

class AdminAnaliticsModel extends Model
{
    public $analitics = array();

    public $currentPage = 0;
    public $size = 0;

    public $record;

    function __construct()
    {
        $this->record = new ActiveRecordAnalitics();
    }

    function getAnalitics($countOnPage)
    {
        $countAnalitics = $this->record->getCount();
        $this->size = (($countAnalitics / $countOnPage));
        $this->currentPage = isset($_GET["pageNumber"]) ? $this->setPagination($_GET["pageNumber"], $countOnPage) : 0;
        $firstElementPage = $countOnPage * $this->currentPage;
        return $this->record->getPagedByDesc($firstElementPage, $countOnPage, "date");
    }

    function setPagination($pageNumber, $countOnPage)
    {
        $countRecords = $this->record->getCount();
        $this->size = (int)($countRecords / $countOnPage);
        if ($countRecords > 0 && ($countRecords % $countOnPage) == 0) {
            $this->size = $this->size - 1;
        }
        if ($pageNumber <= $this->size && $pageNumber > 0) {
            return $pageNumber;
        } elseif ($pageNumber > $this->size) {
            return $this->size;
        } else {
            return 0;
        }
    }
}
