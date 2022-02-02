<?php

class JsonEncoder
{
   public function encodeToJson($data)
   {
   //return json
   }
}


class XmlEncoder
{
    public function encodeToXml($data)
    {
     //return xml
     }
}

class GenericEncoder
{
    public function encodeToFormat($data, $format)
      {
        if ($format === 'json') {
           $encoder = new JsonEncoder();
        } elseif ($format === 'xml') {
            $encoder = new XmlEncoder();
        } else {
           throw new InvalidArgumentException('Unknown format');
        }
        $data = $this->prepareData($data, $format, $encoder);
        return $data;
       }
       
    private function prepareData($data, $format, $encoder)
       {
        switch ($format) {
           case 'json':
              $data = $this->forceArray($data);
              $data = $this->fixKeys($data);
              $data = $encoder->encodeToJson($data);
              break;
           // fall through
            case 'xml':
             $data = $this->fixAttributes($data);
             $data = $encoder->encodeToXml($data);
              break;
            default:
              throw new InvalidArgumentException(
                'Format not supported'
             );
        }
        return $data;
        }
}