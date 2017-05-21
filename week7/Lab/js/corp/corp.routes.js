(function() {
    
    'use strict';
    angular
        .module('app.corp')
        .config(config);
  
    config.$inject = ['$routeProvider'];

    /*
     * We set out custom feature with a starting page and pages
     * that go from there.  then the URL matches the route, we update
     * that view and process the controller
     */
    function config($routeProvider) {
       $routeProvider.
            when('/', {
                templateUrl: 'js/corp/corps.template.html',
                controller: 'CorpController',
                controllerAs: 'vm'
            }).
            when('/corp', {
                templateUrl: 'js/corp/corps.template.html',
                controller: 'CorpController',
                controllerAs: 'vm'
            }).
            when('/corp/:corpId', {
                templateUrl: 'js/corp/corp-detail.template.html',
                controller: 'CorpDetailController',
                controllerAs: 'vm'
            });
    }

})();