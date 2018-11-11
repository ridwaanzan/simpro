@extends('layouts.laymin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Data Jurusan
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Jurusan</th>
                        <th>Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary" id="btnAdd">Tambah Jurusan</button>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="titleAdd">
                    </div>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'admin/jurusan', 'method' => 'POST', 'id' => 'formAdd', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                                {!!Form::label('nama', 'Nama', ['class'=>'control-label col-md-4'])!!}
                            <div class="col-md-6">
                                {!!Form::text('nama',null,['id' => 'nama', 'class'=>'form-control'])!!}
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    {!!Form::submit('Simpan', ['class'=>'btn btn-primary', 'id' => 'btnSave'])!!}
                    <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripting')
    <script type="text/javascript">
        $.noConflict();

        jQuery(document).ready(function ($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content');
                }
            });

            var table, save_method;

            $(function() {
                table = $('.table').DataTable({
                    "processing" : true,
                    "serverside" : true,
                    "ajax" : ""
                });
            });

            $('body').on('click', '#btnAdd',function() {
                jQuery.noConflict();
                $('#titleAdd').text('Tambah Data Jurusan');
                $('#form-jurusan').trigger('reset');
                $('#modalAdd').modal('show');
            });

            $('#formAdd').submit(function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                
                $.ajax({
                    type : post,
                    url  : url,
                    data : data,
                    success : function(data) {
                    $('#form-jurusan').trigger('reset');
                    $('#modalAdd').modal('hide');
                    table.ajax.reload();
                    console.log(data);
                    },
                    error : function() {
                        alert("tidak dapat menyimpan data");
                    }
                });
            });
        });
        

    </script>
@endsection