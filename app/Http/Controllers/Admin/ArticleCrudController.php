<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article\Article;
use App\Models\Article\ArticleCategory;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCrudController extends CrudController
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
        CRUD::setModel(Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
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
        CRUD::setValidation(ArticleRequest::class);

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
                'name' => 'image',
                'label' => __('static.image'),
                'type' => 'image',
            ],
            [
                'name' => 'category',
                'label' => __('static.category'),
                'type' => 'relationship',
//                'entry' => 'article_category_id',
//                'attribute' => 'title',
//                'model' => ArticleCategory::class,
            ],
            [
                'name' => 'title',
                'label' => __('static.title'),
            ],
            [
                'name' => 'short_description',
                'label' => __('static.description'),
            ],
            [
                'name' => 'place',
                'label' => __('static.place'),
            ],
        ];
    }

    public function getFields()
    {
        return [
            [
                'name' => 'user_id',
                'type' => 'hidden',
                'value' => backpack_user()->getAuthIdentifier()
            ],
            [
                'name' => 'image',
                'label' => __('static.image'),
                'type' => 'image',
            ],
            [
                'name' => 'category',
                'label' => __('static.category'),
                'type' => 'relationship',
                'entry' => 'article_category_id',
                'attribute' => 'title',
                'model' => ArticleCategory::class,
            ],
            [
                'name' => 'title',
                'label' => __('static.title'),
            ],
            [
                'name' => 'short_description',
                'label' => __('static.short_description'),
                'type' => 'ckeditor',
            ],
            [
                'name' => 'long_description',
                'label' => __('static.long_description'),
                'type' => 'ckeditor',
            ],
            [
                'name' => 'place',
                'label' => __('static.place'),
                'type' => 'hidden',
            ],
            [
                'name' => 'color',
                'label' => __('static.color'),
                'type' => 'color_picker'
            ],
        ];
    }
}
