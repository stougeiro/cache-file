<?php declare(strict_types=1);

    namespace STDW\Cache\File;

    use STDW\Contract\ServiceProviderAbstracted;
    use STDW\Cache\Contract\CacheInterface;
    use STDW\Cache\Contract\CacheHandlerInterface;
    use STDW\Cache\Cache;
    use STDW\Cache\File\FileCacheHandler;
    use Throwable;


    class ServiceProvider extends ServiceProviderAbstracted
    {
        public function register(): void
        {
            $this->app->singleton(CacheInterface::class, Cache::class);
            $this->app->singleton(CacheHandlerInterface::class, function()
            {
                try {
                    $storage = config('cache.storage');
                    $file_extension = config('cache.file_extension');
                } catch (Throwable $e) {
                    $storage = sys_get_temp_dir();
                    $file_extension = '.cache';
                }

                return new FileCacheHandler($storage, $file_extension);
            });
        }

        public function boot(): void
        { }

        public function terminate(): void
        { }
    }