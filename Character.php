<?php


/**
 * Définition de la classe Character
 */
class Character
{
    protected int $health;
    protected int $rage;


    /**
     * Méthode magique permettant l'hydratation de l'objet.
     * @param int $health
     * @param int $rage
     */
    public function __construct(int $health, int $rage)
    {

        $this->setHealth($health);
        $this->setRage($rage);
    }


    /**
     * Methode retournant la valeur de la santé d'un personnage
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * Methode affectant la valeur de la santé à un personnage
     * @param int $health
     * 
     */
    public function setHealth(int $health)
    {
        $this->health = $health;
    }


    /**
     * Méthode retournant la valeur de la rage d'un personnage
     * @return int 
     */
    public function getRage(): int
    {
        return $this->rage;
    }

    /**
     * Methode affectant la valeur de la rage à un personnage
     * @param int $rage
     * 
     */
    public function setRage(int $rage)
    {
        $this->rage = $rage;
    }
}
