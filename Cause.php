<?php
class Cause {

    private string $label;
    private int $amount;

    public function __construct(string $label, int $amount)
    {

        $this->label = $label;
        $this->amount = $amount;
    }



    public function increment(){
        $this->amount++;
    }

}