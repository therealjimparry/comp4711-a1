# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

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
