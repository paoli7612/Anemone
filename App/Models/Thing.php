<?php
    use App\core\Router;

    class Thing extends Model {
        public static function routes() {
        {
            Router::get(static::$table);
            foreach (static::all() as $item) {
                Router::get($item->url(), static::$table . '/show');
            }
        }
    }
};
