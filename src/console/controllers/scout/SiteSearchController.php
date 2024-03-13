<?php

namespace rias\scout\console\controllers\scout;

use Craft;
use craft\elements\Entry;
use rias\scout\console\controllers\BaseController;

class SiteSearchController extends BaseController
{
    public $defaultAction = 'debug';

    public function actionDebug()
    {
        $elements = Entry::find()->status(null)->all();
        foreach ($elements as $element) {
            Craft::$app->getSearch()->indexElementAttributes($element);
        }
    }
}
