<?php


class Flux
{
    private $url;
    private $description;
    private $titre;
    private $nbNews;

    /**
     * Flux constructor.
     * @param $url
     * @param $description
     * @param $titre
     * @param $nbNews
     */
    public function __construct($url, $description, $titre, $nbNews)
    {
        $this->url = $url;
        $this->description = $description;
        $this->titre = $titre;
        $this->nbNews = $nbNews;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getNbNews()
    {
        return $this->nbNews;
    }

    /**
     * @param mixed $nbNews
     */
    public function setNbNews($nbNews)
    {
        $this->nbNews = $nbNews;
    }
}