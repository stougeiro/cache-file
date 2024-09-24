<?php declare(strict_types=1);

    namespace STDW\Cache\File;

    use STDW\Contract\ServiceProviderAbstracted;
    use STDW\Cache\Contract\CacheInterface;
    use STDW\Cache\Contract\CacheHandlerInterface;
    use STDW\Cache\Cache;
    use STDW\Cache\File\FileCacheHandler;


    class ServiceProvider extends ServiceProviderAbstracted
    {
        public function register(): void
        {
            $this->app->singleton(CacheInterface::class, Cache::class);
            $this->app->singleton(CacheHandlerInterface::class, FileCacheHandler::class);
        }

        public function boot(): void
        { }

        public function terminate(): void
        { }
    }