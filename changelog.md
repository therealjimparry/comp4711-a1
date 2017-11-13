# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## 2017-11-12 - SC
### Added
- Form to add/edit flights

## 2017-11-12 - YR
### Added
- Helper method in fleetentity to use plane entity, as csv was updated

### Updated
- Fleets to use new methods for new csv data

## 2017-11-12 - DH
### Changed
- info controller to extend CI_Controller instead of Application
- info controller's `flight ()` method to `flights ()`

## 2017-11-12 - DH
### Changed
- fleet.csv data format; added additional columns

## 2017-11-12 - YR
### Added 
- Added bootstrap css and js files
- User roles to application

### Updated
- Template view php to use bootstrap
- Added pagetitle to template view

## 2017-11-12 - SC
### Added
- Flight entity unit tests

## 2017-11-12 - NS
### Added 
- Sessions and a temp 

## 2017-11-12 - SC
### Added
- Flight model unit tests
- Added flight bookings controller/view
- menu bar entry

### Changed
- fixed WackyAPI::getAlbatros()

## [Unreleased] - 2017-11-11 YR
### Added
- Regions Model
- RegionEntity

## [Unreleased] - 2017-11-11 YR
### Added
- Interface for entities to implement, makes it easier for controller to use entities
- Class for csv models to extend, makes it easier to controllers to access model items

### Changed
- Entities implement new interface
- Models that used CSV_Model now use new model controller helper model

## [Unreleased] - 2017-11-11 YR
### Added
- Static function to wackyapi for getting a single airline
- Functions to planeentity to better handle fleet planes
- Fleet contains a plane entity
- View arrays to more entites

### Changed
- fleet controller, fixed, could not see object values

## [Unreleased] - 2017-11-11 YR
### Added
- AirlineEntity Function to return an object that is easier to use in the controller

### Changed
- Home view not working due to changes in design
- Home view {} to be more friendly and understandable

## [Unreleased] - 2017-11-11 YR
### Added
- New function in flights to return simply the airline

### Changed
- Home view to use new get_flight_airline function in flights

## [Unreleased] - 2017-11-11 YR
### Added
- AirplaneEntitiy Helper Functions
- AirlineEntity Helper Functions
- FlightEntity HelperFunctions
- CSV_Model for flights

### Changed
- Changed CSV data for Flights to use uniqueId instead of flightId

## [Unreleased] - 2017-11-11 YR
### Added
- CSV Model
- Data Mapper
- Memory_Model
- Load and Add function overriding in fleets after extending csv_model

### Changed
- Entity and Require once loading to be put in my model at the bottom for global access and loading
- object . to ->
- setters in constructor transition has begun

## [Unreleased] - 2017-11-11 DH
### Added
- data folder for project data
- flights.csv and fleet.csv data

## [Unreleased] - 2017-11-10 - SC
### Added
- Unit tests for Plane entity
- function in WackyAPI to get albatros airline

## [Unreleased] - 2017-11-10 - YR
### Changed
- Changed flightentity to contain airport objects
- Modified Airlines to work, had bug that was using wrong data set

## [Unreleased] - 2017-11-10 - YR
### Changed
- Changed flightentity id to uniqueid

## [Unreleased] - 2017-11-10 - YR
### Added
- Added WackyAPI file to reduce code redundancy, contains ways of accessing server api
- Added JSONHelper file to reduce code redundancy, uses curl

### Changed
- Moved creating entity object functions to relevant entites as static functions to create themselves

## [Unreleased] - 2017-11-10 - YR
### Added
- Finished all basic models implementation, ready for use for CSV Model implementation

### Changed
- Models named changed to NameModel.php

## [Unreleased] - 2017-11-09 - YR
### Added
- Added Entity class to core
- Magic methods added and implemented in Plane from Entity (set and get)
- Methdos to create a plane implemented in planes
- Planes model now converts array from server to plane object array
- Added empty models for future development
- Updated fleets model to use trim instead of empty or isset to be used with plane object as it would crash the application php 5.4 onwards

## [Unreleased] - 2017-11-09 - SC
### Added
- phpunit / travis-ci
- trivial test to see if pipeline works

## [Unreleased] - SC
### Changed
- Flight view now uses community names

## [Unreleased] - SC
### Changed
- Tabulated flight view with relevant tooltips

## [Unreleased] - YR 
### Changed 
- Updated routing from show/planecode to fleet/planecode

## [Unreleased] - YR 
### Changed 
- Model data structures, after init, for loop for key value pairs

## [Unreleased] - YR 
### Changed 
- Get more data for view in home controller

## [Unreleased] - YR 
### Changed 
- Modified flight model data structure heavily such that the flight number was unique and could be potentially used in
  future.
- Updated flights view such that it works now

## [Unreleased] - YR 
### Added 
- Plane view to showcase specfic information about a plane

## [Unreleased] - YR 
### Changed
- Updated flights model data structure of flights to add aircraft code

## [Unreleased] - NS
### Added
- Added a fleetView Model

## [Unreleased] - YR 
### Changed
- Updated home controller index method to have nested array for for loop usage in view

## [Unreleased] - YR 
### Added
- Home controller for use in homepage
### Changed
- Flights Model and Fleets Model

## [Unreleased] - YR 
### Changed
- Modified fleet model to use alphanumeric id (first letter of teamname followed by index)

## [Unreleased] - YR 
### Added
- Info Controller containing sub controllers

## [Unreleased] - YR 
### Added
- Flight controller

## [Unreleased] - DH
### Added
- Flights model

### Changed
- Autoload.php to include Flights model

## [Unreleased] - DH & YR
### Added
- Airlines Model which uses curl to retrieve all the airlines

### Changed
- Fleets Model now correctly parses json
- Fleets::all() incorrecly called data() function rather than var data
- Fleet Controller uses Fleet model rather than Planes model

## [Unreleased] - DH
### Added
- Fleet Controller
### Changed
- Fleet.php (Model) avoid name collision with Fleet.php (Controller)
- Plane.php to Plane_model.php for consistency
- references to Plane and Fleet to correctly reference Plane_Model and Fleet_Model

## [Unreleased] - YR 
### Changed
- Updated Planes Model to use Curl as fopen is not enabled with url

## [Unreleased] - YR 
### Added
- Planes Model
- Fleet Model
### Changed
- Autoload


## [Unreleased] - SC
### Added
- Copied CodeIgniter Starter 3
- changelog.md
