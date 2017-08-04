@extends('layouts.admin')

@section('nama')
	Tabel Campaign
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Campaign</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>Judul</th>
											<th>Target Dana</th>
											<th>Deadline</th>
											<th>User</th>
											<th>Kategori</th>
											<th>Status</th>       
										</tr>
									</thead>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')
<script src="{{asset('admin-theme/assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#campaign').DataTable({
        "processing": true,
        "serverSide": true,
		"responsive": true,
        "ajax": "{{ route('campaign.get') }}",
        "columns": [
			{ data: 'actions', name: 'actions', orderable: false, searchable: false },
            { data: 'judul', name: 'judul' },
            { data: 'target_dana', name: 'target_dana', orderable: false},
            { data: 'deadline', name: 'deadline' },
            { data: 'user', name: 'user.name' },
            { data: 'kategori', name: 'kategori.name' },
            { data: 'status', name: 'status' }
        ]
    });
});
</script>
@endsection