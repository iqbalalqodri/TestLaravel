
@extends('MasterMain')

@section('title', 'Data employees')

@section('link')

  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">

@endsection

  @section('Konten')


      <!-- HTML5 export buttons table -->
      <section id="html5">
        <div class="row">
          @if (session('status'))
                    <div class="alert alert-success col-12">
                      {{ session('status') }}
                   </div>
                   @endif
                   @if (session('status_hapus'))
                   <div class="alert alert-danger col-12">
                     {{ session('status_hapus') }}
                  </div>
                @endif
                @if (session('status_edit'))
                   <div class="alert alert-info col-12">
                     {{ session('status_edit') }}
                  </div>
                @endif
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data employees</h4>
                <br>
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#bootstrap"><i class="fa fa-plus"></i> employees</a>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  
                    <table class="table table-striped table-bordered dataex-html5-export">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Companie</th>
                          <th>Email</th>
                          <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse($employees as $data)
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nama_companies}}</td>
                                    <td>{{$data->email}}</td>
                                    <td><a class="btn btn-info" id="tampil-datae" 
                                      data-id_employees="{{ $data->id_employees }}"
                                      data-nama="{{ $data->nama }}"
                                      data-company_id="{{ $data->company_id }}"
                                      data-email="{{ $data->email }}"
                                       data-toggle="modal" data-target="#modal-lg1"><i class="fa fa-pencil"></i></a> ||
                                    <form action="{{ url('employees/'.$data->id_employees) }}" method="POST"  class="d-inline" onsubmit="return confirm('yakin ingin hapus data ?')">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                                  </form>
      
 
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                </tr>
                            @endforelse
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--/ HTML5 export buttons table -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
          <!-- Modal -->
          <div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel35">Add employees</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <strong>Error!</strong> 
                  <ul>
                        @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                       @endforeach
                  </ul>
                </div>
              @endif
                <form action="{{url('employees')}}"  method="POST" >
                  @csrf
                  <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Entri Nama" >
                    </fieldset>
                    <br>
                    <fieldset class="form-group floating-label-form-group">
                      <label for="company_id">companies</label>
                      <select name="company_id" id="company_id" class="form-control select2" >
                        <option value="">Pilih companies</option>
                        @foreach ($companies as $data)
                            <option value="{{$data->id}}">{{$data->nama_companies}}</option>
                        @endforeach
                      </select>
                      
                    </fieldset>
                    <br>
                    <fieldset class="form-group floating-label-form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Entri Email" >
                      
                    </fieldset>
                    <br>
                    
                                      
                    
                  </div>
                  <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                    value="close">
                    <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
          <!-- Modal -->
          <div class="modal fade text-left" id="modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel35">Edit employees</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <strong>Error!</strong> 
                  <ul>
                        @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                       @endforeach
                  </ul>
                </div>
              @endif
                <form action="{{url('/employees')}}"  method="POST">
                  @method('patch')
                  @csrf
                  <div id="modal-edit" class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                      <label for="nama">Nama</label>
                      <input type="hidden" name="id_employees" id="id_employees">
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Entri Nama" >
                    </fieldset>
                    <br>
                    <fieldset class="form-group floating-label-form-group">
                      <label for="company_id">companies</label>
                      <select name="company_id" id="company_id" class="form-control select2" >
                        <option value="">Pilih companies</option>
                        @foreach ($companies as $data)
                            <option value="{{$data->id}}">{{$data->nama_companies}}</option>
                        @endforeach
                      </select>
                      
                    </fieldset>
                    <br>
                    <fieldset class="form-group floating-label-form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Entri Email" >
                      
                    </fieldset>
                    <br> 
                    
                  </div>
                  <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                    value="close">
                    <input type="submit" class="btn btn-outline-primary btn-lg" value="Save">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('script')


<script>
  $(document).on("click","#tampil-datae", function(){
   var id_employees = $(this).data('id_employees');  
   var nama = $(this).data('nama');  
   var company_id = $(this).data('company_id');  
   var email = $(this).data('email');  

   $("#modal-edit #id_employees").val(id_employees);
   $("#modal-edit #nama").val(nama);
   $("#modal-edit #company_id").val(company_id);
   $("#modal-edit #email").val(email);
 
   })
  </script>



{{-- datatables --}}
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

@endsection