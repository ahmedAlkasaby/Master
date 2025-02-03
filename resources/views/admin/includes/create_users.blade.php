<div class="col-12 col-md-6">
    @include('admin.includes.form.text', [
    'label' => __('site.admin name'),
    'id' => 'modalAddUserFirstName',
    'fieldName' => 'name',
    'fieldValue' => null,
    'place' => __('site.admin name'), // تمرير placeholder بشكل صحيح
    'required' => true
    ])

</div>
<div class="col-12 col-md-6">

    @include('admin.includes.form.select', [
    'label' => __('site.admin lang'),
    'id' => 'modalAddUserLang',
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
<div class="col-12">
    @include('admin.includes.form.text', [
    'label' => __('site.admin phone'),
    'fieldName' => 'phone',
    'fieldValue' => null,
    'place' => __('site.admin phone'),
    'required' => true
    ])
</div>
<div class="col-sm-6">
    <label for="select2Icons" class="form-label">@lang('site.city_region')</label>
    <div class="position-relative">
        <select name="region_id" class="form-select select2" tabindex="-1" aria-hidden="true">
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
<div class="col-sm-6">
    @include('admin.includes.form.select', [
    'label' => __('site.gender'),
    'id' => 'gender',
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
