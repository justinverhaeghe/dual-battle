<?php

require_once  __DIR__ . '/Character.php';

/**
 * [Définition de la classe Hero]
 */
class Hero extends Character
{
    private string $weapon; //Défini le nom de l'arme équipée.
    private int $weaponDamage; //Indiquera les dégâts basique de l'arme.
    private string $shield; //Indique le nom de l'armure équipée.
    private int $shieldValue; //Indiquera les dégâts que l'armure encaisse à la place du héros.



    /**
     * Méthode magique permettant l'hydratation de l'objet Hero
     * @param int $health
     * @param int $rage
     * @param string $weapon
     * @param int $weaponDamage
     * @param string $shield
     * @param int $shieldValue
     */
    public function __construct(int $health, int $rage, string $weapon, int $weaponDamage, string $shield, int $shieldValue)
    {
        parent::__construct($health, $rage);
        $this->setWeapon($weapon);
        $this->setWeaponDamage($weaponDamage);
        $this->setShield($shield);
        $this->setShieldValue($shieldValue);
    }

    /**
     * Affichage de l'objet
     * @return string
     */
    public function __toString(): string
    {
        return 'Le héros a ' . parent::getHealth() . ' points de santé, ' . parent::getRage() . ' points de rage, est équipé de l\'arme ' . $this->getWeapon() . ' qui fait ' . $this->getWeaponDamage() . ' points de dégâts, et porte l\'armure ' . $this->getShield() . ' à qui il reste ' . $this->getShieldValue() . ' points de défense.';
    }

    /**
     * Getter/ Methode retournant le nom de l'arme équipée
     * @return string
     */
    public function getWeapon(): string
    {
        return $this->weapon;
    }

    /**
     * Setter/ Methode affectant le nom de l'arme équipée
     * @param string $weapon
     */
    public function setWeapon(string $weapon)
    {
        $this->weapon = $weapon;
    }



    /**
     * Getter/ Methode retournant la valeur des dégâts basique de l'arme
     * @return int
     */
    public function getWeaponDamage(): int
    {
        return $this->weaponDamage;
    }

    /**
     * Setter/ Méthode affectant la valeur des dégâts basique de l'arme
     * @param string $weaponDamage
     */
    public function setWeaponDamage(string $weaponDamage)
    {
        $this->weaponDamage = $weaponDamage;
    }


    /**
     * Getter/ Methode retournant le nom de l'armure équipée
     * @return string
     */
    public function getShield(): string
    {
        return $this->shield;
    }

    /**
     * Setter/ Méthode affectant le nom de l'armure équipée
     * @param string $shield
     */
    public function setShield(string $shield)
    {
        $this->shield = $shield;
    }


    /**
     * Getter/ Méthode retournant la valeur du nombre de dégâts subit par l'armure
     * @return int
     */
    public function getShieldValue(): int
    {
        return $this->shieldValue;
    }

    /**
     * Setter/ Méthode affectant la valeur du nombre de dégâts subit par l'armure
     * @param string $shieldValue
     */
    public function setShieldValue(string $shieldValue)
    {
        $this->shieldValue = $shieldValue;
    }



    /**
     * Méthode affectant les points de dégats au héros.
     * @param int $damage
     */
    public function attacked(int $damage)
    {
        $damageTaken = $damage - $this->getShieldValue();
        if ($damageTaken > 0) {
            $this->setHealth($this->getHealth() - $damageTaken);
        }
        if ($this->getHealth() < 0) {
            $this->setHealth(0);
        }
        $newValue = round($this->getShieldValue() - ($damage / 17));
        $newValue = ($newValue > 0) ? $newValue : 0;
        $this->setShieldValue($newValue);
        $this->setRage($this->getRage() + 30);
    }
}
