<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
/**
 * Class gallery
 *
 * @property \App\gallery $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class gallery extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */

    protected $model = '\App\gallery';
    protected $checkAccess = false;


    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\gallery::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }
    /**
     * @var string
     */
    protected $title = 'Галерея';

    /**
     * URL по которому будет доступен раздел
     * @var string
     */
    protected $alias = 'settings';

    /**
     * @return Первичная отображаемая таблица
     */
    public function onDisplay()
    {
        return AdminDisplay::table()/*->with('users')*/
        ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::text('name', 'Название')->setWidth('200px'),
                AdminColumn::image('photo_url', 'Картинка')->setWidth('200px')
            )->paginate(20);
    }


    /**
     * @param int $id
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // поле var - нельзя редактировать, ибо нефиг системообразующий код редактировать
        return AdminForm::panel()->addBody([
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('name', 'Название картинки')->required(),
            AdminFormElement::image('photo_url', 'Картинка'),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),


        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //return $this->onEdit(null);
        // а вот создать var можно. Один раз и навсегда
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название картинки')->required(),
            AdminFormElement::image('photo_url', 'Картинка')->required(),
        ]);

    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }

    //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Редактировать Галерею';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
