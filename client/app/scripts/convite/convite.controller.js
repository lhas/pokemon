/* convite.controller.js */
(function() {

  angular
    .module('pokemon.convite', [])
    .controller('ConviteController', ConviteController);

    ConviteController.$inject = ['$http'];

    function ConviteController($http) {
      var vm  = this;
      var selected = undefined;
      var alerts = [];

      vm.selected = selected;
      vm.alerts = alerts;
      vm.getLocation = getLocation;
      vm.submitForm = submitForm;

      function getLocation(val) {
        return $http.get('//maps.googleapis.com/maps/api/geocode/json', {
          params: {
            address: val,
            sensor: false
          }
        }).then(function(response){
          return response.data.results.map(function(item){

            var formattedAddress = item.formatted_address;
            var formattedAddressSplitted = formattedAddress.split(',');

            // return formattedAddressSplitted[0];
            return item.formatted_address;
          });
        });
      }

      function submitForm() {

      }
    }

})();