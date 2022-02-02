<?php

interface FileInterface
{
/**
*return []
**/
 public function listParentsDirectory();
 public function rename($name);

}

interface FileOwnerInterface{    
  public function changeOwner($user, $group); 
}


class DropboxFile implements FileInterface
{
   public function listParentsDirectory(): string
   {   
   }
   public function rename($name)
   {     
   }  
  
}


interface FileTypeInterface extends FileInterface
{
   public function handle();
}

class TypeFile implements FileTypeInterface{
    
    public function handle() {
       return true; 
    }

    public function listParentsDirectory() {
        
    }

    public function rename($name) {
        
    }

}


class LinuxFile implements FileInterface,FileOwnerInterface
{
   public function __construct(FileTypeInterface $file)
   {
    if ($file->handle() === true) {
    //    ...
    }
   }
    
   public function listParentsDirectory(): string
   {
     
   }
    
    public function rename($name)
    {
      
    }
    
    public function changeOwner($user, $group) {}

}

