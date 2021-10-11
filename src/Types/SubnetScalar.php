<?php

namespace SeanKndy\SonarApi\Types;

class SubnetScalar extends BaseType
{
    private string $value;

    public function __construct(string $value)
    {
        if (! $this->validateCidrFormat($value)) {
            throw new \InvalidArgumentException("Argument should be in CIDR format.");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validateCidrFormat(string $value): bool
    {
        if (! \preg_match('/^(.+?)\/([0-9]+)$/', $value, $m)) {
            return false;
        }
        [$network, $length] = [$m[1], $m[2]];

        if (filter_var($network, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return $length <= 32;
        }

        if (filter_var($network, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return $length <= 128;
        }

        return false;
    }
}