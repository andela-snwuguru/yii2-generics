<?php

namespace digitech\yiigenerics\controllers;

/**
* Implements create, update, detail, list and delete generic views
*/
trait YedAllViewController
{
    use \digitech\yiigenerics\controllers\YedController;
    use \digitech\yiigenerics\controllers\YedCreateView;
    use \digitech\yiigenerics\controllers\YedUpdateView;
    use \digitech\yiigenerics\controllers\YedDeleteView;
    use \digitech\yiigenerics\controllers\YedDetailView;
    use \digitech\yiigenerics\controllers\YedListView;
}
