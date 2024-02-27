<?php declare(strict_types=1);

    namespace STDW\Cache\File\ValueObject;

    use STDW\ValueObject\ValueObjectAbstracted;


    final class FileExtensionValue extends ValueObjectAbstracted
    {
        public function __construct(
            protected string $file_extension)
        { }


        public function get(): string
        {
            return $this->file_extension;
        }

        public function isValid(): bool
        {
            if ( ! preg_match('^\.[a-zA-Z0-9]{1,}$', $this->file_extension)) {
                return false;
            }

            return true;
        }

        public function __toString(): string
        {
            return $this->get();
        }
    }