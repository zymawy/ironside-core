@extends('ironside::layouts.dashboard.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary">
				<div class="card-header bg-primary with-border">
					<h3 class="card-title text-white">
						<span><i class="fa fa-table"></i></span>
						<span>List All Settings</span>
					</h3>
				</div>

				<div class="box-body">

                    <div class="alert alert-warning">
                        <p>TODO</p>
                        <p>Idea? add app_url, google analytics and other 'settings' related info here</p>
                    </div>

					@include('ironside::dashboard.partials.info')

					@include('ironside::dashboard.partials.toolbar')

					<table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Title</th>
							<th class="desktop">Description</th>
							<th>Created</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($items as $item)
							<tr>
								<td>{{ $item->name }}</td>
								<td>{!! $item->description !!}</td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>{!! action_row($selectedNavigation->url, $item->id, $item->name, ['show', 'edit', 'delete']) !!}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection