<?php declare(strict_types=1);

    namespace STDW\Cache\File;

    use STDW\Cache\File\ValueObject\FileExtensionValue;
    use STDW\Cache\File\ValueObject\StorageValue;
    use STDW\Cache\File\ValueObject\TTLValue;
    use Exception;


    class FileCacheException extends Exception
    {
        public static function storageNotFound(StorageValue $storage): object
        {
            return new static("Storage path '".$storage->get()."' not found. Storage path must be a valid writable folder.");
        }

        public static function fileExtensionNotValid(FileExtensionValue $file_extension): object
        {
            return new static("Invalid file extension: '".$file_extension->get()."'. File extension must be alphanumeric string, preceded by a single dot.");
        }

        public static function TTLNotValid(TTLValue $ttl): object
        {
            return new static("Invalid TTL value: '".$ttl->get()."'. TTL must be null (default value), a positive integer or a DateInterval instance with positive result.");
        }
    }