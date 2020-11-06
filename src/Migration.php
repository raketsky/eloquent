<?php
namespace Egosun\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Phpmig\Migration\Migration as PhpmigMigration;

class Migration extends PhpmigMigration
{
    protected Builder $schema;

    public function init(): void
    {
        $this->schema = $this->get('schema');
    }

    public function seed(string $class, iterable $data): void
    {
        foreach ($data as $fields)
        {
            /* @var $item Model */
            $item = new $class;
            foreach ($fields as $k => $v) {
                $item->{$k} = $v;
            }
            $item->save();
        }
    }
}
