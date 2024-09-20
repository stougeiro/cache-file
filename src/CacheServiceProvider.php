<?php declare(strict_types=1);

    namespace STDW\Cache\File;

    defined('CACHE') or define('CACHE', dirname(__FILE__).DIRECTORY_SEPARATOR.'cache');


    use STDW\Contract\ServiceProviderAbstracted;
    use STDW\Cache\Contract\CacheInterface;
    use STDW\Cache\Contract\CacheHandlerInterface;
    use STDW\Cache\Cache;
    use STDW\Cache\File\FileCacheHandler;


    class CacheServiceProvider extends ServiceProviderAbstracted
    {
        public function register(): void
        {
            $this->app->singleton(CacheInterface::class, Cache::class);
            $this->app->singleton(CacheHandlerInterface::class, function() {
                return new FileCacheHandler(CACHE);
            });
        }

        public function boot(): void
        {
            $this->app->cache = $this->app->make(CacheInterface::class);
        }

        public function terminate(): void
        {
        }
    }