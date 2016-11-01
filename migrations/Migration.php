<?php

namespace Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration {

    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;

    /** @var \Illuminate\Database\Schema\Builder $schema */
    public $schema;

    public function init()
    {
        $settings = require "app/settings.php";

        $this->capsule = new Capsule;
        $this->capsule->addConnection($settings['settings']['db']);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        
        $this->schema = $this->capsule->schema();
    }
}
