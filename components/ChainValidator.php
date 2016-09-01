<?php
namespace funcraft\chain\components;

use funcraft\chain\interfaces\IChainValidator;

/**
 * Class ChainValidator
 * @package funcraft\chain\components
 * @author Funcraft <what4me@ya.ru>
 */
abstract class ChainValidator implements IChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'ChainValidator';

    /**
     * @var bool
     */
    protected $yesItIs = false;

    /**
     * @var mixed
     */
    protected $value = null;

    /**
     * @return string
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function is($value)
    {
        $this->setValue($value);
        $this->yesItIs = $this->validate($value) ? true : false;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param bool $itIs
     * @return $this
     */
    public function setItIs($itIs)
    {
        $this->yesItIs = $itIs;

        return $this;
    }

    /**
     * @return bool
     */
    public function getItIs()
    {
        return $this->yesItIs;
    }

    /**
     * @param IChainValidator $validator
     * @return IChainValidator
     */
    public function chain($validator)
    {
        return $this->getItIs()
             ? $this
             : $validator->is($this->getValue());
    }
}