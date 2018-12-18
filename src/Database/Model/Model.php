<?php
/**
 * Created by PhpStorm.
 * User: kayn23
 * Date: 18.12.2018
 * Time: 10:20
 */

namespace MyFrimework\Database\Model;
use MyFrimework\Database\DB;

class Model
{
    /**
     * @var table associated with the model
     */
    protected $table;
    private $collection;

    public $modelInfo;

    /**
     * Model constructor.
     * @param $atr int/string
     * int поиск по id в таблице
     * string поиск по условию в таблице. вернет коллекцию.
     */
    public function __construct($atr)
    {
        if (gettype($atr) === 'string') {
            $this->modelInfo = $this->getManyElems($atr);
            $this->collection = 2;
        } elseif (gettype($atr) === 'integer') {
            $this->modelInfo = $this->getOneElem($atr);
            $this->collection = 1;
        } elseif (gettype($atr) === 'array') {
            $this->modelInfo = $atr;
            $this->collection = 1;
        }
    }

    //todo сделать данный метод статическим для вызова без готового объекта
    /**
     * Сохраняет модель в бд.
     * @return $this
     */
    public function create()
    {
        DB::insert($this->getTable(),$this->modelInfo);
        $class = $this->getClass();
        return new $class((int)DB::lastId());
    }

    /**
     * вносит изменения в бд
     * @param $atr array изменяемые параметры
     * @return $this
     */
    public function update($atr){
        if ($this->collection === 1) {
            DB::update($this->getTable(),$atr, "id='".$this->modelInfo['id']."'");
            $this->modelInfo = $this->getOneElem($atr);
        } else {
            foreach ($this->modelInfo as $key => $item) {
                DB::update($this->getTable(),$atr, "id='".$item['id']."'");
                $this->modelInfo[$key] = $this->getOneElem($item['id']);
            }
        }
        return $this;
    }

    public function delete()
    {
        if ($this->collection === 1) {
            DB::delete($this->getTable(),"id='".$this->modelInfo['id']."'");
        } else {
            foreach ($this->modelInfo as $item) {
                DB::delete($this->getTable(), "id='".$item['id']."'");
            }
        }
    }

    /**
     * Возвращает имя связанной таблице.
     * Если при создании класса не указано в $table возвращает по имени класса Class.s
     * @return table|string
     */
    protected function getTable()
    {
        if (isset($this->table)) {
            return $this->table;
        } else {
            $class = explode('\\',get_class($this));
            $table = $class[count($class)-1];
            return $table.'s';
        }
    }

    protected function getClass()
    {
        return get_class($this);
    }

    protected function getOneElem($id)
    {
        return DB::select($this->getTable(), "id='$id'")[0];
    }

    protected function getManyElems($atr) {
        return DB::select($this->getTable(), $atr);
    }
}