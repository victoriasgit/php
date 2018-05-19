<?php

class Day implements Iterator
{
    private $index;
    private $list;
    public function __construct(array $list = null)
    {
        $this->index = 0;
        $this->list = $list;
    }
    public function current()
    {
        return $this->list[$this->index];
    }
    public function next()
    {
        ++$this->index;
    }
    public function key()
    {
        return $this->index;
    }
    public function valid()
    {
        return isset($this->list[$this->index]);
    }
    public function rewind()
    {
        $this->index = 0;
    }
}

class Month implements IteratorAggregate
{
    public $list;
    public function __construct(int $month, int $year)
    {
        for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $month, $year); $i++) {
            $this->list[] = new DateTime($year . "-" . $month . "-" . $i);
        }
    }
    public function getIterator()
    {
        return new Day($this->list);
    }
    function getDayNumberOfWeek($date)
    {
        return $date->format("N");
    }
}