@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a id="delete" data-id="{{ $id }}" class="  ti ti-trash" href="#">{{ $delete ?? '' }}</a>
{!! Form::open(['method' => 'DELETE','route' => ["$route_name.$table.destroy", $id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'd-none btn btn-danger delete-btn-submit','data-delete-id' => $id]) !!}
@include('admin.layouts.forms.close')
