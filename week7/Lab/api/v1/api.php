<?php

include_once './autoload.php';

/*
 * The Rest server is sort of like the page is hosting the API
 * When a user calls the page (By url(HTTP), CURL, JavaScript etc.), the server(this Page) 
 * will handle the request.
 */
$restServer = new RestServer();

try {
    
    $restServer->setStatus(200);
    
    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();
    $serverData = $restServer->getServerData();
    
    $resourceUCName = ucfirst($resource); //make lowercase first the ucfirst
    $resourceClassName = $resourceUCName . 'Resource';
    
    try {
        $resourceData = new $resourceClassName();
    } catch( InvalidArgumentException $e ) {
        throw new InvalidArgumentException($resourceUCName . ' Resource Not Found');
        
    }
    
    /* 
     * You can add resoruces that will be handled by the server 
     * 
     * There are clever ways to use advanced variables to sort of
     * generalize the code below. That would also require that all
     * resoruces follow the same standard. Interfaces can ensure that.
     * 
     * But in this example we will just code it out.
     * 
     */
        $resourceData = new CorpsResource();
        //$resourceData = new AddressResource();
        
        if ( 'GET' === $verb ) {
            
            if ( NULL === $id ) {
                
                $restServer->setData($resourceData->getAll());                           
                
            } else {
                
                $restServer->setData($resourceData->get($id));
                
            }            
            
        }
                
        if ( 'POST' === $verb ) {
            

            if ($resourceData->post($serverData)) {
                $restServer->setMessage($resourceUCName . ' added');
                $restServer->setStatus(201);
            } else {
                throw new Exception($resourceUCName . ' could not be added');
            }
        
        }
        
        //implement put
        if ( 'PUT' === $verb ) {
            
            if ( NULL === $id ) {
                throw new InvalidArgumentException($resourceUCName . ' ID ' . $id . ' was not found');
            }
            
            else {
                    if ($resourceData->put($id, $serverData)) {
                    $restServer->setMessage($resourceUCName . ' updated');
                    $restServer->setStatus(201);
                } else {
                    throw new Exception($resourceUCName . ' could not be updated');
                }
            }
            
        }
        
        //impement delete
        if ( 'DELETE' === $verb ) {
            
            if ( NULL === $id ) {
                throw new InvalidArgumentException($resourceUCName . ' ID ' . $id . ' was not found');
            }
            
            else {
                    if ($resourceData->delete($id)) {
                    $restServer->setMessage($resourceUCName . ' deleted');
                    $restServer->setStatus(201);
                } else {
                    throw new Exception($resourceUCName . ' could not be deleted');
                }
            }
            
        }
    
   
    
    /* 400 exeception means user sent something wrong */
} catch (InvalidArgumentException $e) {
    $restServer->setStatus(400);
    $restServer->setErrors($e->getMessage());
    /* 500 exeception means something is wrong in the program */
} catch (Exception $ex) {    
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());   
}


echo $restServer->getReponse();
exit();
