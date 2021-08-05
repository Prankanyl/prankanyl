<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SettingCrudController extends CrudController
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
        CRUD::setModel(Setting::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/setting');
        CRUD::setEntityNameStrings('setting', 'settings');
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
        CRUD::setValidation(SettingRequest::class);

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
                'name' => 'title',
                'label' => __('static.site_title'),
                'type' => 'text',
            ],
            [
                'name' => 'mutate_favicon',
                'label' => __('static.favicon'),
                'type' => 'image',
            ],
            [
                'name' => 'mutate_logo',
                'label' => __('static.logo'),
                'type' => 'image',
            ],
            [
                'name' => 'email',
                'label' => __('static.logo'),
                'type' => 'email',
            ],
            [
                'name' => 'phone',
                'label' => __('static.phone'),
                'type' => 'phone',
            ],
            [
                'name' => 'address',
                'label' => __('static.address'),
                'type' => 'text',
            ],
            [
                'name' => 'active',
                'label' => __('crud.status.status'),
                'type' => 'radio',
//                'options' => [
//                    0 => strip_tags('<i class="la la-minus-circle"></i>'),
//                    1 => strip_tags('<i class="la la-plus-circle"></i>'),
//                ],
                'options' => [
                    0 => __('crud.status.passive'),
                    1 => __('crud.status.active'),
                ],
            ],
        ];
    }

    public function getFields()
    {
        return [
            [
                'name' => 'title',
                'label' => __('static.title'),
                'type' => 'text',
            ],
            [
                'name' => 'favicon',
                'label' => __('static.favicon'),
                'type' => 'image',
            ],
            [
                'name' => 'logo',
                'label' => __('static.logo'),
                'type' => 'image',
            ],
            [
                'name' => 'email',
                'label' => __('static.email'),
                'type' => 'email',
            ],
            [
                'name' => 'phone',
                'label' => __('static.phone'),
                'type' => 'text',
                'attributes' => [
                    'placeholder' => '+375 (29) 123-45-67',
                ],
            ],
            [
                'name' => 'address',
                'label' => __('static.address'),
                'type' => 'text',
            ],
            [
                'name' => 'location',
                'label' => __('static.location'),
                'type' => 'address_google',
                'store_as_json' => false,
            ],
            [
                'name' => 'description',
                'label' => __('static.description'),
                'type' => 'ckeditor',
            ],
            [
                'name' => 'background_color',
                'label' => __('static.background_color'),
                'type' => 'color_picker',
            ],
            [
                'name' => 'text_color',
                'label' => __('static.text_color'),
                'type' => 'color_picker',
            ],
            [
                'name' => 'active',
                'label' => __('crud.status.status'),
                'type' => 'radio',
                'options' => [
                    0 => __('crud.status.passive'),
                    1 => __('crud.status.active'),
                ],
                'default' => 0,
                'inline' => true,
            ],
        ];
    }
}
