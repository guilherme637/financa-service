<?php

namespace App\Infrastructure\Validator;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

abstract class ConstraintAbstract implements ConstraintInterface
{
    protected const INPUT = '';
    protected const MESSAGE = 'This value is required {%s}';

    private ?ConstraintInterface $constraint = null;

    public function __construct(protected array $data) {}

    public function setNext(ConstraintInterface $constraint): ConstraintInterface
    {
        $this->constraint = $constraint;

        return  $constraint;
    }

    /**
     * @throws BadRequestException
     */
    public function handle(): ?ConstraintInterface
    {
        $input = get_called_class()::INPUT;

        if ($this->isValid($input)) {
            throw new BadRequestException(sprintf(self::MESSAGE, $input));
        }

        if (is_null($this->constraint)) {
            return null;
        }

        return $this->constraint->handle();
    }

    protected function isValid(string $input): bool
    {
        return !isset($this->data[$input]);
    }
}