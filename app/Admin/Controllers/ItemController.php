<?php

namespace App\Admin\Controllers;

use App\ElasticSearchModels\ItemElasticSearchModel;
use App\Models\item;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ItemController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function __construct(ItemElasticSearchModel $iesm){
        $this->iesm = $iesm;
    }

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(item::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('name', 'price', 'desc', 'qty', 'imageUrl');
            //$grid->created_at();
            //$grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(item::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name');
            $form->number('price');
            $form->textarea('desc')->rows(10);
            $form->number('qty');
            $form->image('imageUrl')->uniqueName();
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            // $form->saved(function (Form $form){
            //     $this->iesm->create($form->model()->id, [
            //         'id' => $form->model()->id,
            //         'name' => $form->model()->name,
            //         'price' => $form->model()->price,
            //         'desc' => $form->model()->desc,
            //         'qty' => $form->model()->qty,
            //         'imageUrl' => $form->model()->imageUrl,                           
            //     ]);
            // });
        });
    }
}
