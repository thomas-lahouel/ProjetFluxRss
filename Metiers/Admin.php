<?php


class Admin
{
    private $login;

    /**
     * Admin constructor.
     * @param $login
     */
    public function __construct($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }
}