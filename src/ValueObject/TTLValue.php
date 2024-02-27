<?php declare(strict_types=1);

    namespace STDW\Cache\File\ValueObject;

    use STDW\ValueObject\ValueObjectAbstracted;
    use DateInterval;
    use DateTime;


    final class TTLValue extends ValueObjectAbstracted
    {
        private static int $defaultValue = 0;


        public function __construct(
            protected null|int|DateInterval $ttl)
        {
            if ($this->ttl instanceof DateInterval) {
                $this->ttl = $this->calculateTTLFromDateInterval($this->ttl);
            } else if (is_null($this->ttl)) {
                $this->ttl = self::$defaultValue;
            }
        }


        public function getDefaultValue(): int
        {
            return self::$defaultValue;
        }

        public function setDefaultValue(int $value)
        {
            self::$defaultValue = $value;
        }


        public function get(): int
        {
            return $this->ttl;
        }

        public function isValid(): bool
        {
            if ($this->ttl < 0) {
                return false;
            }

            return true;
        }

        public function __toString(): string
        {
            return (string) $this->get();
        }


        private function calculateTTLFromDateInterval(DateInterval $interval): int
        {
            return (new DateTime())->setTimeStamp(0)->add($interval)->getTimeStamp();
        }
    }
