// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);

// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {

    $routeProvider
      
        .when('/', {
            templateUrl : 'views/configuracion.html',
            controller  : 'configController'
        })

        .when('/institucion', {
            templateUrl : 'views/institucion.html',
            controller  : 'instiController'
        })


        .when('/modulos', {
            templateUrl : 'views/modulos.html',
            controller  : 'instiModulo'
        })

        .when('/usuarios', {
            templateUrl : 'views/usuarios.html',
            controller  : 'instiUsuario'
        })
         .when('/programa', {
            templateUrl : 'views/programa.html',
            controller  : 'instiprograma'
        })
           .when('/new_pa', {
            templateUrl : 'views/new_pa.html',
            controller  : 'instinewpa'
        })

        .otherwise({
            redirectTo: '/'
        });
});

angularRoutingApp.controller('mainController', function($scope) {

 
});

angularRoutingApp.controller('configController', function($scope) {
});


angularRoutingApp.controller('instiController', function($scope) {
});


angularRoutingApp.controller('instiprograma', function($scope, $http) {

    $http.post ('api/get.php')
            .success(function(data) {
                    $scope.names = data;
                    console.log(data);
                })
            .error(function(data) {
                    console.log('Error: ' + data);
            });

    $scope.delNom = function( codigo, index ) {

        $scope.names.splice(index,1);
        if ( confirm("Seguro?") ) {
            
            $http.post('api/delete.php', { id: codigo } )
                .success(function(data) {
                       
                        
                        console.log(data);
                    })
                .error(function(data) {
                        console.log('Error: ' + data);
                         alert("no succes");
                });
            }
        }

 
});


angularRoutingApp.controller('instiModulo', function($scope) {

});

angularRoutingApp.controller('instinewpa', function($scope, $http) {

  $scope.registro_pa = function(pa){
                       
            $http(
                {method:'POST',
                url:'api/add.php',
                data: $.param( { id: pa }),
                headers:   {'Content-Type': 'application/x-www-form-urlencoded'}})
                .success(function(data) {

                        console.log(data);
                       //location para volver a programa despues de agregar new_pa
                        location.href=location.protocol+"//"+location.hostname+location.pathname+"#/programa";
                    })
                .error(function(data) {
                        console.log('Error: ' + data);
                         alert("no succes");
                });
        }
});


angularRoutingApp.controller('instiUsuario', function($scope) {

    GL_COMPONENTE_GESTOR_ELEMENTOS.ini();
    GL_COMPONENTE_CONSULTOR_ELEMENTOS.ini();

});
