/* 
 CreatedOn   : 12 August, 2015
 Author      : Nadim Aseq A Arman
 Email       : armannadim@msn.com
 Web         : www.armannadim.com
 */


(function() {
    "use strict";
    angular.module('banglaFest', ['ngRoute', 'ngSanitize'])

            .config(['$interpolateProvider', '$locationProvider', function($interpolateProvider, $locationProvider) {
                    $interpolateProvider.startSymbol('[[');
                    $interpolateProvider.endSymbol(']]');
                    //routing DOESN'T work without html5Mode
                    $locationProvider.html5Mode({
                        enabled: true,
                        requireBase: false
                    });
                }])
            .factory('MyService', function() {
                return {
                    baseURL: 'http://localhost:9090/banglafest/'
                }
            })
            .controller("EventsController", ['$scope', '$http', 'MyService', function($scope, $http, MyService) {
                    $scope.events = [];
                    $scope.init = function() {
                        $scope.loading = true;
                        $http.get(MyService.baseURL + 'api/v1/festival').
                                success(function(data) {
                                    $scope.events = data;
                                });
                    }
                    $scope.init();
                    /* Data received by for event list
                     * 
                     * $scope.events = [
                     {
                     'id' : <<ID>>,
                     'name' : <<Festival name>>,
                     'start_datetime' : <<Start date in ISO8601 Format>>,
                     'end_datetime' : <<End date in ISO8601 Format>>,
                     'city' : <<City>>,
                     'country' : <<Country>>,
                     'description' : '<<Description of the festival with html code>>',
                     'link' : <<If any web exists>>,
                     'twitter' : <<Twitter Link url>>,
                     'facebook' : <<Facebook link url>>,
                     'budget' : <<Festival budget>>,
                     'created_at' : '<<Festival Creation date>>',
                     'cover' : '<<Cover image in array>>'                    
                     }];*/
                }])
            .controller("EventController", ['$scope', '$http', '$location', 'MyService', function($scope, $http, $location, MyService) {

                    $scope.event = [];
                    $scope.id = $location.path().substr($location.path().lastIndexOf('/') + 1);
                    $scope.init = function() {
                        $scope.loading = true;
                        $http.get(MyService.baseURL + 'api/v1/festival/' + $scope.id).
                                success(function(data) {
                                    $scope.event = data;
                                    /* COUNTDOWN TIMER */
                                    var newYear = new Date();
                                    newYear = new Date(data.start_datetime);
                                    $('#event-countdown').countdown({until: newYear});
                                    /*END COUNTDOWN*/
                                    /* START MAPS */
                                    var map = data.venue + ', ' + data.city + ', ' + data.country;
                                    $('#event-location').gMap({
                                        address: map,
                                        maptype: 'ROADMAP',
                                        zoom: 15,
                                        markers: [
                                            {
                                                address: map,
                                            }
                                        ],
                                        doubleclickzoom: false,
                                        controls: {
                                            panControl: true,
                                            zoomControl: true,
                                            mapTypeControl: true,
                                            scaleControl: false,
                                            streetViewControl: false,
                                            overviewMapControl: false
                                        }
                                    });
                                    /* END MAPS*/
                                });
                    };
                    $scope.init();

                    /* Variable recieved for festival details.
                     * 
                     'name' => <<Festival name>>,
                     'start_datetime' => <<Start date in ISO8601 Format>>,
                     'end_datetime' => <<End date in ISO8601 Format>>,                     
                     'city' => <<City>>,
                     'coutnry_id' => <<Country ID>>,
                     'country' => <<Country Name>>,
                     'venue' => <<Venue of the festival>>,
                     'description' => <<Details description of festival with html code>>,
                     'link' => <<Web link if available>>,
                     'facebook' => <<facebook link if available>>,
                     'twitter' => <<twitter link if available>>,
                     'budget' => <<Festival Budget>>,
                     'updated_at' => <<Modification date of festival>>,
                     'created_at' => <<Creation date of the festival>>,
                     'photos' => <<All the photos related to this festival in array>>,
                     'videos' => <<All the videos related to this festival in array>>,
                     'performers' => <<All the performers related to this festival in array>>,
                     'guests' => <<All the guest related to this festival in array>>,
                     'persons' => <<All the person related to this festival in array>>,
                     'associations' => <<All the associations related to this festival in array>>,
                     'events' => <<All sub activities related to this festival in array>>
                     * */
                }])
            .controller("CalendarController", ['$scope', '$http', '$filter', 'MyService', function($scope, $http, $filter, MyService) {

                    $scope.event = {};
                    $scope.init = function() {
                        $scope.loading = true;
                        $http.get(MyService.baseURL + 'api/v1/festival').
                                success(function(data) {
                                    angular.forEach(data, function(value, key) {
                                        //console.log(data[0].name);
                                        $scope.date = $filter('date')(data[0].start_datetime, "MM-dd-yyyy");
                                        if ($scope.date in $scope.event) {
                                            var prev = $scope.event[$scope.date];
                                            $scope.event[$scope.date] = prev + '<br><a href="' + MyService.baseURL + 'event/' + data[0].id + '" target=_blank>' + data[0].name + ', ' + data[0].city + '</a>';
                                        } else {
                                            $scope.event[$scope.date] = '<a href="' + MyService.baseURL + 'event/' + data[0].id + '" target=_blank>' + data[0].name + ', ' + data[0].city + '</a>';
                                        }

                                    });

                                    //console.log($scope.event);
                                    /* START CALENDARIO */
                                    $scope.calendar = $('#calendar').calendario({
                                        onDayClick: function($el, $contentEl, dateProperties) {

                                            for (var key in dateProperties) {
                                                console.log(key + ' = ' + dateProperties[ key ]);
                                            }

                                        },
                                        caldata: $scope.event
                                    }),
                                            $scope.month = $('#calendar-month').html($scope.calendar.getMonthName()),
                                            $scope.year = $('#calendar-year').html($scope.calendar.getYear());
                                    $('#calendar-next').on('click', function() {
                                        $scope.calendar.gotoNextMonth($scope.updateMonthYear);
                                    });
                                    $('#calendar-prev').on('click', function() {
                                        $scope.calendar.gotoPreviousMonth($scope.updateMonthYear);
                                    });
                                    $('#calendar-current').on('click', function() {
                                        $scope.calendar.gotoNow($scope.updateMonthYear);
                                    });
                                    $scope.updateMonthYear = function() {
                                        $scope.month.html($scope.calendar.getMonthName());
                                        $scope.year.html($scope.calendar.getYear());
                                    }
                                    /* END CALENDARIO */
                                });
                    };
                    $scope.init();
                }])
            .controller("AboutController", ['$scope', '$http', 'MyService', function($scope, $http, MyService) {
                    $scope.collabs = [];
                    $scope.init = function() {
                        $scope.loading = true;
                        $http.get(MyService.baseURL + 'api/v1/collab').
                                success(function(data) {
                                    console.log(data);
                                    $scope.collabs = data;
                                });
                    }
                    $scope.init();
                }])
            .filter('eventDateFilter', function() {
                return function(items, field) {
                    var today = Date.now();
                    return items.filter(function(item) {
                        return Date.parse(item[field]) > today;
                    });
                };
            })
            .filter('eventDateFilterPast', function() {
                return function(items, field) {
                    var today = Date.now();
                    return items.filter(function(item) {
                        return Date.parse(item[field]) < today;
                    });
                };
            })
            .filter('dateToISO', function() {
                return function(input) {
                    return input.replace(/(.+) (.+)/, "$1T$2Z");
                };
            });
})();

