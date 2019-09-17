<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'logo', 'website'];

    public $timestamps = false;
    private $name;
    private $email;
    private $logo;
    private $website;

    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $action

    /**
     * @return int
     */
    public function getActionAttribute()
    {
        return $this->action;
    }

    /**
     * @param int $action
     */


    /**
     * @return string
     */

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website): void
    {
        $this->website = $website;
    }

    /**
     * @return string
     */


    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setName($name){
        $this->name= $name;
    }

    public function getName(){
        return $this->name;
    }
    public function employees(){
        return $this->HasMany('App\Employee', 'company_id');
    }

}
