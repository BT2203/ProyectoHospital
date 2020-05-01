<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Hospital</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form action="#" method="post" id="formularioregistro">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre del Hospital:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre Hospital" id="nombre">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Dirección:</label>
                        <input type="number" class="form-control" name="direccion" placeholder="Dirección" id="direccion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Telefono:</label>
                        <input type="number" class="form-control" name="telefono" placeholder="Telefono" id="telefono">
                    </div>
                </div>
                
                    {{-- <button type="submit" class="btn btn-success">Registrar Hospital</button> --}}
              
                    {{-- <a href=" {{route('hospital.index')}}" class="btn btn-link">Volver</a> --}}
                    {{-- <a href="#" class="btn btn-primary" id="registro">Registrar Hospital</a> --}}

            </form>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="registro">Registrar Hospital</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

        {{-- <script>
            $('#registro').click(function(){
              var datos = $('#formularioregistro').serialize();
              var ruta = 'guardar';
    
              $.ajax({
                  data: datos,
                  url: ruta,
                  type:'POST',
                  dataType: 'json',
                  success: function(){
                      alert('Hospital Registrado.');
                      $('#nombre').val('');
                      $('#direccion').val('');
                      $('#telefono').val('');
                  }
              });
            });
        </script> --}}


@endsection