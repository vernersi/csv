<?php

class Row
{
    private string $ID;
    private string $date;
    private string $deathType; //brutal || non-brutal || not established
    private array $deathCause;


    public function __construct(string $ID, string $date, string $deathType, array $deathCause)
    {
        $this->ID = $ID;
        $this->date = $date;
        $this->deathType = $deathType;
        $this->deathCause = $deathCause;

    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getDeathType(): string
    {
        return $this->deathType;
    }

    public function getID(): string
    {
        return $this->ID;
    }

    public function filterByDate(string $date): array
    {
        $filteredByDate = [];
        if ($this->date === $date) {
            $filteredByDate[] = $date . ' ' . $this->deathType;
        }
        return $filteredByDate;
    }


    public function getDeathCauses():array{
        return $this->deathCause;
    }

    public function getDeaths():string{
        $causes = '';
        foreach ($this->deathCause as $cause){
            $causes.=$cause." | ";
        } return $causes;
    }


}