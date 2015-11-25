// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);

// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {

    $routeProvider
      
        .when('/', {
            templateUrl : 'COORDINADOR/views/configuracion.html',
            controller  : 'configController'
        })

        .when('/institucion', {
            templateUrl : 'COORDINADOR/views/institucion.html',
            controller  : 'instiController'
        })


        .when('/modulos', {
            templateUrl : 'COORDINADOR/views/modulos.html',
            controller  : 'instiModulo'
        })

        .when('/usuarios', {
            templateUrl : 'COORDINADOR/views/usuarios.html',
            controller  : 'instiUsuario'
        })
         .when('/programa', {
            templateUrl : 'COORDINADOR/views/programa.html',
            controller  : 'instiprograma'
        })
         .when('/plan_estudio', {
            templateUrl : 'COORDINADOR/views/plan_estudio.html',
            controller  : 'instiplan_estudio'
        })
         .when('/curso', {
            templateUrl : 'COORDINADOR/views/curso.html',
            controller  : 'insticurso'
        })
           .when('/new_pa', {
            templateUrl : 'COORDINADOR/views/new_pa.html',
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

    GL_COMPONENTE_GESTOR_ELEMENTOS.ini();
    GL_COMPONENTE_CONSULTOR_ELEMENTOS.ini();
});


angularRoutingApp.controller('instiprograma', function($scope, $http) {


    GL_COMPONENTE_GESTOR_ELEMENTOS.ini();
    GL_COMPONENTE_CONSULTOR_ELEMENTOS.ini();



 
});
angularRoutingApp.controller('instiplan_estudio', function($scope, $http) {


    GL_COMPONENTE_GESTOR_ELEMENTOS.ini();
    GL_COMPONENTE_CONSULTOR_ELEMENTOS.ini();



 
});
angularRoutingApp.controller('insticurso', function($scope, $http) {


    GL_COMPONENTE_GESTOR_ELEMENTOS.ini();
    GL_COMPONENTE_CONSULTOR_ELEMENTOS.ini();



 
});


angularRoutingApp.controller('instiModulo', function($scope) {

});

angularRoutingApp.controller('instinewpa', function($scope, $http) {

  $scope.registro_pa = function(pa){
                       
            $http.post('COORDINADOR/api/add.php', { id: pa } )
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


});
