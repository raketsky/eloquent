<?php
namespace MindFly\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Phpmig\Migration\Migration as PhpmigMigration;

class Migration extends PhpmigMigration
{
    /**
     * @var $schema \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    public function init()
    {
        $this->schema = $this->get('schema');
    }
    
    public function seed($class, $data)
    {
        foreach ($data as $fields) {
            /* @var $item Model */
            $item = new $class;
            foreach ($fields as $k => $v) {
                $item->{$k} = $v;
            }
            $item->save();
        }
    }
}