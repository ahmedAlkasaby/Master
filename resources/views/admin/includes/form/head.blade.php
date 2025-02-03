{{ Form::open(['route' => $route_name, 'method' => $method, 'enctype' => "multipart/form-data", 'class' => $class]) }}

<div class="app-ecommerce-impact">
    <div class="col-md mb-4 mb-md-0">
        @if($modal!=true)
        <div class="card">
            @endif
            <div class="card-body">
                @if($name==true)
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @include('admin.includes.form.text', [
                        'label' => __('site.name en'),
                        "id"=>$name_en_id??null,
                        'fieldName' => 'name_en',
                        'fieldValue' => $name_en??null,
                        'class' => 'form-control',
                        'place' => __('site.Enter name')
                        ])
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('admin.includes.form.text', [
                        'label' => __('site.name ar'),
                        "id"=>$name_ar_id??null,
                        'fieldName' => 'name_ar',
                        'fieldValue' => $name_ar??null,
                        'class' => 'form-control',
                        'place' => __('site.Enter name')
                        ])
                    </div>
                </div>
                @endif

                @if($Description==true)

                <div class="mb-3">
                    @include('admin.includes.form.textarea', [
                    'label' => __('site.Description en'),
                    "id" => $description_en_id ?? 'edit-form-desc-en',

                    'fieldName' => 'description_en',
                    'fieldValue' => $description_en??null,
                    'place' => __('site.Add a Description'),
                    'rows' => 4,
                    'id' => 'description_en'
                    ])
                </div>

                <div class="mb-3">
                    @include('admin.includes.form.textarea', [
                    'label' => __('site.Description ar'),
                    'fieldName' => 'description_ar',
                    "id" => $description_ar_id ?? 'edit-form-desc-ar',

                    'fieldValue' => $description_ar??null,
                    'place' => __('site.Add a Description'),
                    'rows' => 4,
                    'id' => 'description_ar'
                    ])
                </div>
                @endif
