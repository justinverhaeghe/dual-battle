<?php

require_once  __DIR__ . '/Character.php';

/**
 * [Description Orc]
 */
class Orc extends Character
{
    private int $damage; //Atribut Damage


    /**
     * @param int $health
     * @param int $rage
     */
    public function __construct(int $health, int $rage)
    {
        parent::__construct($health, $rage);
    }
    public function __toString(): string
    {
        return 'L\'Orc a une santé de ' . $this->getHealth() . ' est une rage de ' . $this->getRage();
    }

    /**
     * Methode retournant la valeur des dégats
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * Methode affectant la valeur des dégâts
     * @param int $damage
     * 
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }


    /**
     * Affectation d'une valeur à damage entre 600 et 800
     */
    public function attack()
    {
        $damage = rand(600, 800);
        $this->setDamage($damage);
    }
}
