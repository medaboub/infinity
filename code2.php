<?php

interface FileInterface
{
/**
*return []
**/
 public function listParentsDirectory();
 public function rename($name);
 public function changeOwner($user, $group);
}


class DropboxFile implements FileInterface
{
   public function listParentsDirectory(): string
   {
    ...
   }
   public function rename($name)
   {
     ...
   }
   
   public function changeOwner($user, $group)
    {
    throw new BadMethodCallException(
      'Not implemented for Dropbox files'
   );
  }
}



interface FileTypeInterface extends FileInterface
{
   public function handle();
}


class LinuxFile implements FileTypeInterface
{
   public function __construct(FileInterface $file)
   {
     if ($http->handle() === true) {
      ...
     }
    }
    
   public function listParentsDirctory(): string
   {
     ...
    }
    
    public function rename($name)
    {
     ...
    }
     public function changeOwner($user, $group)
    {}
}