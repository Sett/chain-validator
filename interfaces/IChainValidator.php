<?php
namespace funcraft\chain\interfaces;

/**
 * Interface ChainValidatorInterface
 *
 * using:
 * $someValid = $valid1->is($value)->chain($val2)->chain($val3);
 * $some->getEntityName();
 *
 * @package app\kilobook\interfaces
 * @author Funcraft
 */
interface IChainValidator
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function validate($value);

    /**
     * @param mixed $value
     * @return $this
     */
    public function is($value);

    /**
     * @param IChainValidator $validator
     * @return IChainValidator
     */
    public function chain($validator);

    /**
     * @return string
     */
    public function getEntityName();
}