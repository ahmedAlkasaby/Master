<div class="col-12">
    @include('admin.includes.form.text', [
    'label' => __('site.admin name'),
    'id' => $edit?'modaleditUserFirstName':'modalAddUserFirstName',
    'fieldName' => 'name',
    'fieldValue' => null,
    'place' => __('site.admin name'), // تمرير placeholder بشكل صحيح
    'required' => true
    ])
</div>



<div class="col-12">
    <label for="select2Icons" class="form-label">@lang('site.city_region')</label>
    <div class="position-relative">
        @if($edit)
        <select id="modaleditUserRegion" name="region_id" class="form-select select2">
            @else
            <select  name="region_id" class="form-select select2" tabindex="-1" aria-hidden="true">
                @endif
                @foreach ($cities as $city)
                <optgroup label="{{ $city->nameLang() }}">
                    @foreach ($city->regions as $region)
                    <option value="{{ $region->id }}">
                        {{ $region->nameLang() }}
                    </option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
    </div>
</div>
<div class="col-12 col-md-6">

    @include('admin.includes.form.select', [
    'label' => __('site.admin lang'),
    'id' => $edit?'modaleditUserLang':'modalAddUserLang',
    'fieldName' => 'lang',
    'options' => [
    'ar' => __('site.language arabic'),
    'en' => __('site.language english')
    ],
    'fieldValue' => null,
    'class' => 'form-select select2',
    'required' => true
    ])
</div>
<div class="col-sm-6">
    @include('admin.includes.form.select', [
    'label' => __('site.gender'),
    'id' => $edit?'modaleditUserGender':'gender',
    'fieldName' => 'gender',
    'options' => [
    'male' => __('site.male'),
    'female' => __('site.female')
    ],
    'fieldValue' => null,
    'class' => 'form-select select2',
    'required' => true
    ])
</div>

<div class="col-12">
    @include('admin.includes.form.text', [
    'label' => __('site.admin phone'),
    "id"=>$edit ? 'modaleditUserPhone':"modalcreateUserPhone",
    'fieldName' => 'phone',
    'fieldValue' => null,
    'place' => __('site.admin phone'),
    'required' => true
    ])
</div>

@if($password==true)
<div class="col-12">
    @include('admin.includes.form.password')
</div>
<div class="col-12">
    @include('admin.includes.form.password_confirmation')
</div>
@endif

@if($role==true)
<div class="col-12">
    @include('admin.includes.form.select', [
    'label' => __('site.role'),
    'id' => 'modaleditUserCity',
    'fieldName' => 'role_id',
    'options' => $roles->pluck('name', 'id'),
    'fieldValue' => null,
    'class' => 'form-select select2',
    'required' => true
    ])
</div>
@endif
