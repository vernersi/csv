<?php
class Row {
    private string $ID;
    private string $date;
    private string $deathType; //brutal || non-brutal || not established



    public function __construct(string $ID, string $date, string $reason)
    {
        $this->ID = $ID;
        $this->date = $date;
        $this->deathType=$reason;
    }

    public function getDate():string{
        return $this->date;
    }

    public function getDeathType():string{
        return $this->deathType;
    }

    public function getID():string{
        return $this->ID;
    }

    public function filterbyDate($date):array {
        $filteredByDate=[];
        if ($this->date===$date){
        $filteredByDate[]=$date.' '.$this->deathType;
    } return $filteredByDate;
    }












}