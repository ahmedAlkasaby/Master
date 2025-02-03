<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $id }}" aria-hidden="true">
    {!! Form::open(['route' => [$main_name . '.destroy', $name => $id], 'method' => 'delete']) !!}


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $id }}">@lang('site.are_you_sure_from_delete')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    {!! Form::button(__('site.close'), ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal', 'type' => 'button']) !!}
                    {!! Form::button(__('site.delete'), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </form>
</div>
