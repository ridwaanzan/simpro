@extends('layouts.laymin')

@section('content')

<div class="panel panel-danger">
	<div class="panel-heading">
		<b>Master Data Project</b>
	</div>
	<div class="panel-body">
		<table class="table table-bordered table-hover table-responsive">
			<thead>
				<tr>
					<td>#</td>
					<td>Nama Project</td>
					<td>Jumlah Modul</td>
					<td>Status Pengerjaan</td>
					<td>Status</td>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<div class="panel-footer">
		<button class="btn btn-danger" id="btnAdd">Add New Project</button>
	</div>
</div>

<div class="modal fade" role="dialog" id="modalMasterProject">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="moda-header"></div>
			<div class="moda-body"></div>
			<div class="moda-footer"></div>
		</div>
	</div>
</div>

@endsection()

@section('scripting')

<script type="text/javascript">
	$.noConflict();

	jQuery(document).ready(function($) {
		$.ajaxSetup({
			'X-CSRF-TOKEN' : $('meta[name=csrf_token]').attr('content');
		});

		var table, save_method;

		$(function() {
			table = $('.table').Datatable({
				"processing" 	: true,
				"serverside" 	: true,
				"ajax" 			: "{{ route('m_project.data') }}"
			});
		});

		$('body').on('click', '#btnAdd', function() {
			$('#modalMasterProject').modal('show');
		})
	});
</script>