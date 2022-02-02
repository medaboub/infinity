<?php

interface EncoderInterface{ 
  public function encode($data);
}

class JsonEncoder implements EncoderInterface
{    
    public function encode($data) {
         $data = $this->forceArray($data);
         $data= $this->fixKeys($data);          
        //return json
    }   
}


class XmlEncoder implements EncoderInterface
{   
    public function encode($data) { 
        $data= $this->fixAttributes($data);
        //return XML 
    }
   
}

class EncoderFactory {
    private $encoders=array();
    
    public function addNewFormatEncoder($format,EncoderInterface $encoder){
        $this->encoders[$format]=$encoder;
    }
    
    public function getEncoderByFormat($format){
        return $this->encoders[$format];
    }
}

class GenericEncoder
{
    private $encoderFacotry;
    
    public function __construct(EncoderFactory $encoderFactory) {
        $this->encoderFacotry=$encoderFactory;
    }
    public function encodeToFormat($data, $format)
    {
        $encoder=$this->encoderFacotry->getEncoderByFormat($format);      
        return $encoder->encode($data);
    }
   
}


$encoderFactory=new EncoderFactory();
$encoderFactory->addNewEncoder("json",new JsonEncoder());
$encoderFactory->addNewEncoder("xml",new XmlEncoder());
//$encoderFactory->addNewEncoder("custom",new customEncoder());
$genericEncoder=new GenericEncoder($encoderFactory);
$encodedData=$genericEncoder->encodeToFormat('{"name":"gaddour","surname":"mohamed"}',"json");
echo $encodedData;