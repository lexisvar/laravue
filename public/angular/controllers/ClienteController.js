app.controller('ClienteController', function ($scope,$http, API_URL) {

    $http.get(API_URL + 'clientes').success(function(data){
        $scope.clientes = data;
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    //mostrar modal
    $scope.toggle = function (modalestado, cliente_id){
        $scope.modalestado = modalestado;
        switch (modalestado){
            case 'add' :
                $scope.form_title = "Agregar cliente";
                break;
            case 'edit' :
                $scope.form_title = "Detalle del Cliente";
                $scope.cliente_id = cliente_id;
                $http.get(API_URL + 'cliente/' +cliente_id).success(function (response) {

                    $scope.cliente = response;
                });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
    }


    // Guardar nuevo cliente y actualizar uno existente
    $scope.save = function (modalestado, cliente_id) {

        var url = API_URL + 'cliente';
        if(modalestado === 'edit'){
            url += "/" +cliente_id;
        }
        $http.post(url, $scope.cliente).
        success(function(data){
            $('#myModal').modal('hide');
            $scope.clientes = {};
            $http.get(API_URL + 'cliente').success(function(data){
                $scope.clientes = data;
            });

        }).error(function(data, status) {
            console.log("Estado "+status);
            console.log("Data "+data);
        });
    }

    //Eliminar Cliente
    $scope.confirmDelete = function (cliente_id) {
        var isConfirmDelete = confirm('¿Estás seguro que de sea eliminar este cliente?');
        if(isConfirmDelete){
            $http({
                method : 'DELETE',
                url : API_URL + 'clientes/' + cliente_id
            }).success(function (data) {
                toastr.success("Registro Eliminado éxitosamente", "Solicitud éxitosa")
                $http.get(API_URL + 'clientes').success(function(data){
                    $scope.clientes = data;
                });
            }).error(function (data) {
                toastr.error('No se pudo eliminar', "Hubo un error")
            });
        }else{
            return false;
        }
    }


    //Traer departamentos
    $scope.getStates = function () {
        pais_id = $scope.cliente.pais;
        $scope.ciudades = {};
        $scope.departamentos = {};
        $http.get(API_URL + 'departamentos/'+ pais_id).success(function(data){
            $scope.departamentos = data;

        });
    }

    //Traer ciudades
    $scope.getCities = function () {
        departamento_id = $scope.cliente.departamento;
        $scope.ciudades = {};
        $http.get(API_URL + 'ciudades/'+ departamento_id).success(function(data){
            $scope.ciudades = data;
        });
    }

    //mostrar modal
    $scope.toggle = function (modalestado, cliente_id){

        $scope.modalestado = modalestado;
        switch (modalestado){
            case 'add' :
                $scope.form_title = "Agregar cliente";
                $scope.cliente = {};
                $scope.ciudad_info = {};
                break;
            case 'edit' :
                $scope.form_title = "Detalle del Cliente";
                $scope.cliente_id = cliente_id;
                $http.get(API_URL + 'cliente/' +cliente_id).success(function (response) {
                    $scope.cliente = response;
                });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
    }

    // Guardar nuevo cliente y actualizar uno existente
    $scope.save = function (modalestado, cliente_id) {

        var url = API_URL + 'cliente';
        if(modalestado === 'edit'){
            url += "/" +cliente_id;
        }

        $http.post(url, $scope.cliente).
        success(function(data){
            $('#myModal').modal('hide');
            toastr.success(data.message, "Solicitud éxitosa")
            $scope.clientes = {};
            $http.get(API_URL + 'clientes').success(function(data){
                $scope.clientes = data;
            });

        }).error(function(data, status) {

            var error_messages = '';
            angular.forEach(data, function(value, key){
                error_messages += value +'<br>';
            });

            toastr.error(error_messages, "Hubo un error")
        });
    }

});