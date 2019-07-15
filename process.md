# Checkpoint PHP 4. Friday, December 22, 2017.

As christmas is coming, we are going to play with Lego this morning, and use many random operators. Each Lego set will have a reference and a list of parts that are used to build this set. For instance : the Lego set **10214 Tower Bridge** contains 4287 parts  (you can find the part list [here](https://www.bricklink.com/catalogItemInv.asp?S=10214-1)). 

*Note : In this exercice, a part is used in one set only.*

**You have 4 hours**.

## Checkpoint Constraints. 

1. Clone this repo and add a new branch **firstname_lastname** . You will commit each step, and push your branch at the end of the checkpoint. 

2. The algorithm class (see bellow) will be named **PartsGenerator** and stored in a directory named **algo**

3. Database name : **checkpoint4**

4. Symfony project name : **lego**

5. The comments and variables names in the code will have to be **in english**.


*Beware* : the projects that do NOT respect these constraints won't be corrected.

## Step 1 - Algorithm (30  minutes)

Write a method class, with a parameter $n, that will generate an array of $n sets, each set is an array that contains some parts. You will put 1 to 10 parts (randomly) to your set. A part has a reference which is a random integer with 6 digits. (Hint : use PHP function mt_rand). 





**Exemple** 
```
[
   [1321546,100101,512135,632514,654321],
   [876543,234567],
   ... 
   ($n lines)
   ...
]
```   

## Step 2 - Symfony

### 1. Service (10 minutes)
Create a Service with the class you wrote in previous step. 

### 2. Entities (20 min)
Create Entities : 
- **Part** with a "reference" property (int), a "quantity" property (int), and a "legoSet" relationship.
- **LegoSet** with a "reference" property (int), a "name" property (string, nullable), and a "parts" property, which will be a collection of "Part".  

### 3. Fixture (40 min)
Create a fixture that will generate 1000 sets, thanks to the previous service : each line of the array represents the references of the parts of this set. Furthermore, you will generate the *reference* property of each *LegoSet* with a random integer with 5 digits. You will also have to set the part *quantity* : put a random quantity between 1 and 100.

*Note : if you could not solve the algorithm, you can put the same reference for all LegoSet in your fixture.*


### 5. Controller and routes (2h20)
- The first route **/logo/page/{page]** will display a paginated list of LegoSet, and therefore will have a *page* parameter. This parameter is an optional number and its default value is 1. It will display all *LegoSet* of the database, paginated (with at least a page number and a total page number). The number of set diplayed per page (for instance 10) will be stored in app/config/parameter.yml. A click on a set will link to the second route. 
- The second route **/lego/edit/{id}** will display/edit the part of one set and therefore will have an *id* mandatory parameter.This parameter is a mandatory number. On this route, you can edit the selected lego set in an hydrated form, as well as all parts it contains, by using nested FormType.

*Note : Those two routes are subroutes of path **/lego/**. This path should appear only once in your code, so it can be changed easily.*

### 6. Form Validation (Optionnal)
- The LegoSet *name* must contains at least 6 characters, and maximum 20 characters .
