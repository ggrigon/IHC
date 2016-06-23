<script>
  var lista;

  var myApp = angular.module('myApp',[]);

  myApp.controller('TabelaEventos', ['$scope', '$http', function($scope, $http) {

    $http.get('/getEventos').success(function(data) {
        $scope.eventos = data;
    });

  }]);

  myApp.controller('TabelaCertificados', ['$scope', '$http', function($scope, $http){

    $http.get('/getCertificados').success(function(data) {
        $scope.certificados = data;
        lista = data;
    });

    $scope.setSelected = function() {
        $scope.selected = this.certificado;
        $('#certId').val($scope.selected['cod_certificado']);
        $('#certId').attr('teste', $scope.selected['cod_certificado']);
        $('#certificadosModal').modal('hide');
    };

  }]);


  myApp.controller('CadEvento', ['$scope', '$http', function($scope, $http) {

    $scope.submitCadEvento = function() {

      if ($scope.desc_evento == null || $scope.desc_evento == "") {
        alert("ATENCAO! O campo descricao está vazio");
        return 0;
      }

      if ($scope.data_ini == null || $scope.data_ini == "") {
        alert("ATENCAO! O campo data inicial está vazio");
        return 0;
      }

      if ($scope.data_fim == null || $scope.data_fim == "") {
        alert("ATENCAO! O campo data final está vazio");
        return 0;
      }

      if ($scope.data_fim < $scope.data_ini) {
        alert("ERRO! A data final e inferior a data inicial do evento");
        return 0;
      }

      if ($scope.valor == null || $scope.valor == "") {
        alert("ATENCAO! O campo valor está vazio, se o evento nao possui valor cadastre 0");
        return 0;
      }

      if ($scope.cidade == null || $scope.cidade == "") {
        alert("ATENCAO! O campo cidade está vazio");
        return 0;
      }

      if ($scope.desc_local == null || $scope.desc_local == "") {
        alert("ATENCAO! O campo local está vazio");
        return 0;
      }

      $scope.cod_certificado = $('#certId').attr('teste');

      var dataForm = {
        "cod_certificado": $scope.cod_certificado,
        "desc_evento": $scope.desc_evento,
        "data_ini": $scope.data_ini,
        "data_fim": $scope.data_fim,
        "valor": $scope.valor,
        "cidade": $scope.cidade,
        "desc_local": $scope.desc_local
      }

      console.log("cadastrando evento...");


      $http.post('/setEvento', dataForm).success(function(data){
        alert("Evento cadastrado com sucesso!");
        console.log(data);
      });

      

    }

    //CANCELA CERTIFIADO
    $scope.cancelaCert = function() {
        $('#certId').val("");
        $('#certId').attr("");
    };


  }]);
</script>

<div class="row">
    <div class="col-md-6">
      <h1>Eventos</h1>
    </div>

    <div class="col-md-3">

      <!-- BOTAO CADASTRAR EVENTO -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadEvento">Cadastrar Evento</button>

      <!-- MODAL DO CADASTRO DE EVENTO -->
      <div class="modal fade" id="cadEvento" tabindex="-1" role="dialog" aria-labelledby="cadEventoLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <form ng-submit="submitCadEvento()" ng-controller="CadEvento">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="cadEventoLabel">Cadastro de Eventos</h4>
              </div>

              <div class="modal-body">

                <div class="row">
                  <div class="col-md-4">
                    <label>Cod. Certificado:</label>
                    <div class="input-group">
                      <div class="input-group-addon"><a class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#certificadosModal"></a></div>
                      <input type="text" id="certId" teste="" name="cod_certificado" ng-model="cod_certificado" class="form-control" disabled>
                      <div class="input-group-addon"><a class="fa fa-ban" aria-hidden="true" ng-click="cancelaCert()"></a></div>
                    </div>                    
                  </div>

                  <div class="col-md-8">
                    <label>Descricao Evento:</label>
                    <input type="text" name="desc_evento" ng-model="desc_evento" class="form-control">
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-md-4">
                    <label>Data Inicial</label><br/>
                    <input type="date" name="data_ini" ng-model="data_ini" class="form-control">
                  </div>

                  <div class="col-md-4">
                    <label>Data Final</label><br/>
                    <input type="date" name="data_fim" ng-model="data_fim" class="form-control">
                  </div>

                  <div class="col-md-3">
                    <label>Valor</label><br/>
                    <input type="number" name="valor" ng-model="valor" class="form-control">
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-md-3">
                    <label>Cidade</label><br/>
                    <input type="text" name="cidade" ng-model="cidade" class="form-control">
                  </div>

                  <div class="col-md-9">
                    <label>Local</label><br/>
                    <input type="text" name="desc_local" ng-model="desc_local" class="form-control">
                  </div>
                </div>


              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" ng-click="Submit">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- MODAL DOS CERTIFICADOS -->

      <div class="modal fade" id="certificadosModal" tabindex="-1" role="dialog" aria-labelledby="certificadosModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="certificadosModalLabel">Busca de certificados</h4>
            </div>
            <div class="modal-body">

              <div class="row">
                <div class="col-md-12">
                  <form class="form-inline">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" ng-model="pesquisaCertificado" class="form-control" placeholder="pesquise o certificado">
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <br>

              <div ng-controller="TabelaCertificados" ng-click="setSelected()">
                <table class="table table-bordered">
                  <tr>
                    <th>Cod</th>
                    <th>Inst. emissora</th>
                    <th>descricao</th>
                  </tr>
                  <tr ng-repeat="certificado in certificados | filter: pesquisaCertificado" ng-click="setSelected();">
                    <td>{{ certificado.cod_certificado }}</td>
                    <td>{{ certificado.inst_emissora }}</td>
                    <td>{{ certificado.descricao }}</td>
                  </tr>
                </table>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>

    <!--BARRA DE PESQUISA-->
    <div class="col-md-3">
      <form class="form-inline">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><a class="fa fa-search"></a></div>
            <input type="text" ng-model="pesquisaEvento" class="form-control">
          </div>
        </div>
      </form>
    </div>

</div>


<!-- TABELA DE EVENTOS -->
<div class="row">
  <div ng-controller="TabelaEventos" class="col-md-12">

    <table class="table">
      <tr>
        <th>Cod. evento</th>
        <th>Cod. certificado</th>
        <th>Descrição</th>
        <th>Data inicial</th>
        <th>Data Final</th>
        <th>Valor</th>
        <th>Cidade</th>
        <th>Local</th>
        <th>Informações</th>
      </tr>
      <tr ng-repeat="evento in eventos | filter: pesquisaEvento">
        <td>{{evento.cod_evento}}</td>
        <td>{{evento.cod_certificado}}</td>
        <td>{{evento.desc_evento}}</td>
        <td>{{evento.data_ini}}</td>
        <td>{{evento.data_fim}}</td>
        <td>{{evento.valor}}</td>
        <td>{{evento.cidade}}</td>
        <td>{{evento.desc_local}}</td>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{evento.cod_evento}}Modal">+</button></td>

        <div class="modal fade" id="{{evento.cod_evento}}Modal" tabindex="-1" role="dialog" aria-labelledby="{{evento.cod_evento}}ModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="{{evento.cod_evento}}ModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                TESTE
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


      </tr>
    </table>


  </div>
</div>
