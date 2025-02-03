<div class="card-header d-flex flex-wrap py-0 flex-column flex-sm-row justify-content-between mt-4 mb-4">
    <div class="me-5 ms-n2 pe-5">
        <div class="dataTables_filter">
            {{-- @dd(request()->query()) --}}
            <form action="{{ route($model.'.index', array_merge(request()->query(), ['search' => request('search')])) }}" method="get" class="d-flex align-admins-center">
                <input type="search" name="search" class="form-control me-2" placeholder="@lang('site.filter')"
                    aria-controls="DataTables_Table_0" value="{{ request('search') }}" style="flex: 1;">
                @foreach(request()->query() as $key => $value)
                    @if ($key !== 'search') <!-- استبعاد حقل البحث من التكرار -->
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <button class="btn btn-primary" style="flex-shrink: 0;" type="submit">
                    <span>
                        <i class="ti ti-filter me-0 me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">@lang('site.filter')</span>
                    </span>
                </button>
            </form>

        </div>
    </div>
    <div class="d-flex align-items-center">
        @if ($filter==true)
        <button data-bs-toggle="modal" data-bs-target="#{{ $model }}Filter"
            class="btn btn-light btn-label-primary me-2 waves-effect waves-light" type="button">
            <span><i class="fa-solid fa-filter"></i> <span
                    class="d-none d-sm-inline-block">@lang('site.filters')</span></span>
        </button>
        @endif
        @if(Route::is('cases.index'))
        <div class="btn-group">
            <a href="{{ route('cases.index', array_merge(request()->query(), ['export' => 1])) }}" class="btn btn-secondary buttons-collection dropdown-toggle btn-label-secondary me-4 waves-effect waves-light">
                <span><i class="ti ti-upload me-1 ti-xs"></i>@lang("site.export")</span>
            </a>
        </div>
        <div class="btn-group">
            <button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-secondary me-4 waves-effect waves-light" type="button" data-bs-toggle="modal" data-bs-target="#importModal">
                <span><i class="ti ti-upload me-1 ti-xs"></i>@lang("site.import")</span>
            </button>
        </div>
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">@lang("site.import excel")</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="importForm" action="{{ route('cases.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">@lang("site.import excel")</label>
                                <input type="file" id="fileInput" name="file" class="form-control" required accept=".xlsx,.csv">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang("site.close")</button>
                        <button type="submit" class="btn btn-primary" form="importForm">@lang("site.import")</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (auth()->user()->hasPermission($model.'-create'))
        @if (request()->routeIs('cases.index'))
        <a href="{{ route('cases.create') }}">
            <button class="btn btn-primary create-new waves-effect waves-light" type="button">
                <span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">@lang("site.add $entity")</span></span>
            </button>
        </a>
        @else

        <button class="btn btn-secondary add-new btn-primary ms-2 waves-effect waves-light" data-bs-toggle="modal"
            data-bs-target="#{{ $model }}Form">
            <span>
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">@lang("site.add $entity")</span>
            </span>
        </button>
        @endif

        @else
        <button disabled class="btn btn-secondary add-new btn-primary ms-2 waves-effect waves-light">
            <span>
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">@lang('site.new')</span>
            </span>
        </button>
        @endif
    </div>
</div>
