// create the controller and inject Angular's $scope
angular.module('scotchApp').controller('empresaController', function ($scope, $http) {
	
	// control tabs
		$scope.tab = 1;
	    $scope.setTab = function(newTab){
	      $scope.tab = newTab;
	    };
	    $scope.isSet = function(tabNum){
	      return $scope.tab === tabNum;
	    };
    // fin control tabs

    // llenar 
    $scope.user = {
		name: 'deivid'
	};
    // editable 
    $('#editable_nombre_comercial').editable({
	    type: 'text',
	    pk:'1212',
	    // url:'app.php',
	    value: $scope.user.name,
	    title: 'Enter username',
	    success: function(data) {
	        console.log(data);
	    }
	});

});