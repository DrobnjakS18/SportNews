<?php


namespace App\Repositories;


class BaseRepository
{
    protected $className;

    public function __construct()
    {
        $this->className = null;
    }
    /**
     * Vraca Class Name za Repository
     * @return void
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Vraca instancu clase
     * @return mixed
     */
    public function getInstance()
    {
        $className = $this->getClassName();
        return new $className();
    }
}
