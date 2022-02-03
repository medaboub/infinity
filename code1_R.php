<?php

abstract class Encoder{
    protected abstract function prepareData($data);
}

interface EncoderInterface{ 
  public function encode($data);
}

class JsonEncoder extends Encoder implements EncoderInterface
{    
  public function encode($data) {
      $data=$this->prepareData($data);  
      return json_encode($data);     
  }

 protected function prepareData($data) {
    $data = $this->forceArray($data);
    $data= $this->fixKeys($data); 
    return $data;
  }
  
}


class XmlEncoder extends Encoder implements EncoderInterface
{   
     public function encode($data) { 
       $data=$this->prepareData($data);  
       //return XML 
    }
  
   protected function prepareData($data){
     $data= $this->fixAttributes($data);
     return $data;
   }
   
}

class EncoderFactory {
    private $encoders=array();
    
    public function addEncoder($format,EncoderInterface $encoder){
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
$encoderFactory->addEncoder("json",new JsonEncoder());
$encoderFactory->addEncoder("xml",new XmlEncoder());
//$encoderFactory->addEncoder("custom",new customEncoder());
$genericEncoder=new GenericEncoder($encoderFactory);
$encodedData=$genericEncoder->encodeToFormat(array("name"=>"gaddour","surname"=>"mohamed"),"json");
echo $encodedData;
