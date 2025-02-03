<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-4">
            {{-- <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            <div class="modal-body border-top">
                <div class="text-center mb-4">
                    <h3 class="role-title mb-2">@lang('site.add_role')</h3>
                </div>
                <!-- Add role form -->
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <div class="col-12 mb-4">
                        <label class="form-label">@lang('site.name')</label>
                        <input type="text" name="name" class="form-control" tabindex="-1" value="{{ old('name') }}" required />
                    </div>

                    <div class="col-12">
                        <h5>@lang('site.permissions')</h5>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="text-nowrap fw-medium">{{ $permission }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if ( in_array($permission.'-read', $permissionsInDb))

                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="userManagementRead" value={{"$permission-read"}}
                                                        name="permissions[]" {{ old('permissions') &&
                                                        in_array($permission.'-read', old('permissions')) ? 'checked'
                                                        : '' }} />
                                                    <label class="form-check-label" for="userManagementRead">
                                                        @lang('site.read')
                                                    </label>
                                                </div>
                                                @endif
                                                @if ( in_array($permission.'-create', $permissionsInDb))
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="userManagementWrite" value="{{ $permission }}-create"
                                                        name="permissions[]" {{ old('permissions') &&
                                                        in_array($permission.'-create', old('permissions')) ? 'checked'
                                                        : '' }} />
                                                    <label class="form-check-label" for="userManagementWrite">
                                                        @lang('site.create')
                                                    </label>
                                                </div>
                                                @endif
                                                @if ( in_array($permission.'-update', $permissionsInDb))
                                                <div class="form-check me-3 me-lg-5">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="userManagementCreate" value="{{ $permission }}-update"
                                                            name="permissions[]" {{ old('permissions') &&
                                                            in_array($permission.'-update', old('permissions'))
                                                            ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="userManagementCreate">
                                                            @lang('site.update')
                                                        </label>
                                                    </div>
                                                </div>
                                                @endif

                                                @if ( in_array($permission.'-delete', $permissionsInDb))
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="userManagementCreate" value="{{ $permission }}-delete"
                                                        name="permissions[]" {{ old('permissions') &&
                                                        in_array($permission.'-delete', old('permissions')) ? 'checked'
                                                        : '' }} />
                                                    <label class="form-check-label" for="userManagementCreate">
                                                        @lang('site.delete')
                                                    </label>
                                                </div>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('site.add')</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                            @lang('site.discard')
                        </button>
                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->
