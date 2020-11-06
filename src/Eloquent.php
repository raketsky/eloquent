<?php
namespace Egosun\Database;

use Illuminate\Database\Eloquent\Model;

class Eloquent extends Model
{
    public function isNewRecord(): bool
    {
        return intval($this->id) === 0;
    }

    /**
     * Save the model to the database
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = []): bool
    {
        if (!$this->beforeSave())
        {
            return false;
        }

        $return = parent::save($options);
        $this->afterSave();

        return $return;
    }


    public function touch()
    {
        $this->{static::UPDATED_AT} = date('Y-m-d H:i:s');

        return $this->save();
    }

    public function refresh()
    {
        $instance = new static;
        $instance = $instance->newQuery()->find($this->{$this->primaryKey});
        $this->attributes = $instance->attributes;
        $this->original = $instance->original;
    }

    protected function beforeSave(): bool
    {
        return true;
    }

    protected function afterSave(): void
    {

    }
}
