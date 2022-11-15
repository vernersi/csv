<?php
require_once "Row.php";

class DeathCollection
{
    private array $deaths;


    public function add(Row $element): void
    {
        $this->deaths[] = $element;
    }

    public function getDeaths():array{
        return $this->deaths;
    }

    public function filterByDeath(): array
    {
        $brutalCount = 0;
        $nonBrutalCount = 0;
        $unknownCount = 0;
        foreach ($this->deaths as $death) {
            if ($death->getDeathType() === "Vardarbīga nāve") {
                $brutalCount++;
            } elseif ($death->getDeathType() === "Nevardarbīga nāve") {
                $nonBrutalCount++;
            } elseif ($death->getDeathType() === "Nāves cēlonis nav noteikts") {
                $unknownCount++;
            }
        }
        return [
            "Vardarbīga nāve" => $brutalCount,
            "Nevardarbīga nāve" => $nonBrutalCount,
            "Nāves cēlonis nav noteikts" => $unknownCount
        ];
    }

    public function getDeathCount(string $type)
    {
        $allCauses = [];
        foreach ($this->deaths as $death) {
            foreach ($death->getDeathCauses() as $cause) {
                if (!in_array($cause, $allCauses)) {
                    $allCauses[$cause]++;
                } else {
                    $allCauses[$cause] = 1;
                }
            }
        }return $allCauses[$type];
    }
}