<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DevelopmentToolRequest;
use App\Models\DevelopmentTool;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DevelopmentToolCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DevelopmentToolCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(DevelopmentTool::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/development-tool');
        CRUD::setEntityNameStrings('development tool', 'development tools');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumns(
            $this->getColumns()
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DevelopmentToolRequest::class);

        CRUD::addFields(
            $this->getFields()
        );

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function getColumns()
    {
        return [
            [
                'name' => 'mutate_logo',
                'label' => __('static.logo'),
                'type' => 'image',
            ],
            [
                'name' => 'parent_id',
                'label' => __('static.parent'),
                'type' => 'select_from_array',
                'options' => DevelopmentTool::pluck('title', 'id'),
            ],
            [
                'name' => 'title',
                'label' => __('static.title'),
                'type' => 'text',
            ],
            [
                'name' => 'version',
                'label' => __('static.version'),
                'type' => 'text',
            ],
        ];
    }

    public function getFields()
    {
        return [
            [
                'name' => 'logo',
                'label' => __('static.logo'),
                'type' => 'image',

                'tab' => __('crud.tab.general'),
            ],
            [
                'name' => 'title',
                'label' => __('static.title'),
                'type' => 'text',

                'tab' => __('crud.tab.general'),
            ],
            [
                'name' => 'parent_id',
                'label' => __('static.parent'),
                'type' => 'select_from_array',
                'options' => DevelopmentTool::pluck('title', 'id'),

                'tab' => __('crud.tab.general'),
            ],
            [
                'name' => 'version',
                'label' => __('static.version'),
                'type' => 'text',

                'tab' => __('crud.tab.general'),
            ],
            [
                'name' => 'short_description',
                'label' => __('static.short_description'),
                'type' => 'ckeditor',

                'tab' => __('crud.tab.general'),
            ],
            [
                'name' => 'long_description',
                'label' => __('static.long_description'),
                'type' => 'ckeditor',

                'tab' => __('crud.tab.general'),
            ],
            [
                'name' => 'link',
                'label' => __('static.link'),
                'type' => 'url',

                'tab' => __('crud.tab.general'),
            ],
        ];
    }
}
