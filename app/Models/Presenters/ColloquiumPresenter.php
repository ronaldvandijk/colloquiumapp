<?php
/**
 * A simple presenter for a colloquim
 * @author       Sander van Kasteel <info@sandervankasteel.nl
 */

namespace App\Models\Presenters;

/**
 * Class ColloquiumPresenter
 * @package App\Models\Presenters
 */
class ColloquiumPresenter extends Presenter
{
    /**
     * An exploded array based on end_date and the charater ' '
     *
     * @var array
     */
    private $endDateArray = [];
    /**
     * An exploded array based on start_date and the charater ' '
     *
     * @var array
     */
    private $startDateArray = [];

    /**
     * ColloquiumPresenter constructor.
     * @param $entity
     */
    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->parseEndDate();
        $this->parseStartDate();
    }

    /**
     * Return the starting date of a collloquium
     * @return string
     */
    public function startDate()
    {
        return isset($this->startDateArray[0]) ? $this->startDateArray[0] : '';
    }

    /**
     * * Return the starting time of a collloquium
     * @return string
     */
    public function startTime()
    {
        return isset($this->startDateArray[1]) ? $this->startDateArray[1] : '';
    }

    /**
     * * Return the end date of a collloquium
     * @return string
     */
    public function endDate()
    {
        return isset($this->endDateArray[0]) ? $this->endDateArray[0] : '';
    }

    /**
     * * Return the end time of a collloquium
     * @return string
     */
    public function endTime()
    {
        return isset($this->endDateArray[1]) ? $this->endDateArray[1] : '';
    }

    /**
     * Splits the end_date into an array
     */
    private function parseEndDate()
    {
        $this->endDateArray = explode(" ", $this->end_date);
    }

    /**
     * Splits the start_date into an array
     */
    private function parseStartDate()
    {
        $this->startDateArray = explode(" ", $this->start_date);
    }
}
