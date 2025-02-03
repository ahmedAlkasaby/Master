<div class="modal fade" id="itemModal{{ $var->id }}" tabindex="-1" aria-labelledby="itemModalLabel{{ $var->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="itemModalLabel{{ $var->id }}">@lang('site.items')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Titles for the list -->
                <div class="d-flex justify-content-between mb-3 fw-bold">
                    <span>@lang('site.name')</span>
                    <span>@lang('site.price')</span>
                    <span>@lang('site.amount')</span>
                </div>
                <ul class="list-group">
                    @foreach ($var->items as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item->namelang() }}</span>
                            <span class="badge bg-primary">{{ Route::is('purchases.index') ? $item->pivot->unit_price : $item->price ?? __('site.null') }}</span>
                            <span class="badge bg-primary rounded-pill">{{ $item->pivot->amount }} </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('site.close')</button>
            </div>
        </div>
    </div>
</div>
