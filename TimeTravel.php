<?php


class TimeTravel
{
    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo(): string
    {
        $interval = $this->getStart()->diff($this->getEnd());

        return $interval->format('Il y a %Y années, %m mois, %d jours, %H heures, %i minutes, et %s secondes entre les deux deux dates' . '<br>');
    }

    /**
     * @param int $nbSeconds
     * @return string
     */
    public function findDate(int $nbSeconds)
    {
        if ($nbSeconds >= 0) {
            $interval = DateInterval::createFromDateString($nbSeconds . 'seconds');
            $findDate = $this->getStart()->add($interval);
        } else {
            $nbSeconds = -$nbSeconds;
            $interval = DateInterval::createFromDateString($nbSeconds . 'seconds');
            $findDate = $this->getStart()->sub($interval);
        }

        return "Il faut donc régler la DeLorean à la date suivante : " . $findDate->format('Y-m-d');
    }

    /**
     * @param DateInterval $step
     * @return array
     */
    public function backToFutureStepByStep(DateInterval $step)
    {
        $result = [];
        $datePeriods = new DatePeriod($this->start, $step, $this->end);
        foreach ($datePeriods as $datePeriod) {
            $result[] = $datePeriod->format('M,j,Y,A,H:i');
        }
        return $result;
    }
}