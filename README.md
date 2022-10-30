
<p align="center">Distance calculator web service</p>


## Project
- Web service that accepts two distances (numbers), which have the same or two different
  units, and returns the total distance (sum of both).

##  Development steps:

- Validate a request parameters.
- Building a service for calculation of distances.
- Factory for calculation for swap between different return unit types.
- Unit testing for main functionality.

## deploy
- land to project directory  
- execute command php artisan serve 
- By postman after importing collection file you can call endpoint 

## Unit test
in project directory execute below command:

    ./vendor/bin/phpunit


