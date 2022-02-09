# infinity
OOP - SOLID principles
design patternsare model and solutions  
 for problemes related to POO programing and help to write code that will run faster more secure and  easy to maintain and reduce number of errors that you can make
creational patterns
Singleton
Factory
Builder
structural patterns
Adapter
Decorator
Facade
Dependency injecion
behavioural patterns
Observer

The model-view-controller (MVC) pattern and its relatives HMVC and MVVM lets you break up code into logical objects
 that serve very specific purposes. 
 Models serve as a data access layer where data is fetched and returned in formats usable throughout your application. 
 Controllers handle the request, process the data returned from models and load views to send in the response.
 And views are display templates (markup, xml, etc) that are sent in the response to the web browser.
 
 
 
 Liskov  :
 objects must be replacable by instances of their subtypes  without altering the correct fonctioning of application
 One: you cannot change the type of a protected property.
 Two: you can't narrow the type hint of an argument.
  Like, if the parent class uses the object type-hint, 
  you can't make this narrower in your subclass by requiring something more specific, like a DateTime object.  
Three, which is both similar and opposite to the previous rule, you can't widen the return type. 
If the parent class says a method returns a DateTime object, you can't change this in the subclass to suddenly return something wider, like any object.
And finally, four, you should follow your parent class's - or interface's - rules around whether or not you should throw an exception under certain conditions.


objects must be replacables by instances ot their subclasses without altering the correct fonctioning of application or algorithme.

OOP is faster to execute
OOP provides a clear structure for the programs
OOP helps to keep the PHP code DRY "Don't Repeat Yourself", and makes the code easier to maintain, modify and debug
OOP makes it possible to create full reusable applications with less code and shorter development time

Types Of Inheritance in PHP 
single level inheritance
multilevel inheritance


interfaces support multiple inheritance and all methods should be abstract and public
it can not contain complete methods or data.

abstract class contain abstract methods that should be inplemented in children classes and support
only multi-level inheritance. can have both abstracts and not complete methods. it can has also data fileds.

procedural programming is about writing procedures or functions that perform operations on the data,
 while object-oriented programming is about creating objects that contain both data and functions.
