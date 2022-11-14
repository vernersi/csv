<?php
class DeathCollection {

    public const brutal="Vardarbīga nāve";
    public const nonBrutal="Nevardarbīga nāve";
    public const notGiven="Nāves cēlonis nav noteikts";
    private array $deaths;


    public function __construct()
    {
        $this->deaths = [];
    }

    public function add(Death $element) :void{
        $this->deaths[] = $element;
    }



}