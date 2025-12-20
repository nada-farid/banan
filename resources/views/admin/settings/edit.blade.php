@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
            </div>
            <div class="language-switcher">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-primary' }}" 
                            onclick="switchLanguage('en')">English</button>
                    <button type="button" class="btn btn-sm {{ app()->getLocale() == 'ar' ? 'btn-primary' : 'btn-outline-primary' }}" 
                            onclick="switchLanguage('ar')">العربية</button>
                </div>
            </div>
        </div>

        <div class="card-body">

            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type', 'setting_1') == 'setting_1') active @endif" href="#setting_1" role="tab"
                        data-toggle="tab">
                        {{ trans('cruds.setting.general') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_2') active @endif" href="#setting_2" role="tab"
                        data-toggle="tab">
                        {{ trans('cruds.setting.social_media') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_3') active @endif" href="#setting_3" role="tab"
                        data-toggle="tab">
                        {{ trans('cruds.setting.seo') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_4') active @endif" href="#setting_4" role="tab"
                        data-toggle="tab">
                        {{ trans('cruds.setting.statistics') }}
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane @if (request('setting_type', 'setting_1') == 'setting_1') active @endif" role="tabpanel" id="setting_1">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_1">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="organization_name">اسم المؤسسة</label>
                                <input class="form-control {{ $errors->has('organization_name') ? 'is-invalid' : '' }}"
                                    type="text" name="organization_name" id="organization_name"
                                    value="{{ old('organization_name', get_setting('organization_name')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="logo">الشعار</label>
                                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                    id="logo-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="logo_footer">شعار الفوتر</label>
                                <div class="needsclick dropzone {{ $errors->has('logo_footer') ? 'is-invalid' : '' }}"
                                    id="logo_footer-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">رقم الهاتف</label>
                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                    name="phone" id="phone" value="{{ old('phone', get_setting('phone')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">رقم الجوال</label>
                                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text"
                                    name="mobile" id="mobile" value="{{ old('mobile', get_setting('mobile')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">البريد الإلكتروني</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email', get_setting('email')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">العنوان</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    type="text" name="address" id="address"
                                    value="{{ old('address', get_setting('address')) }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="about_text">نبذة تعريفية</label>
                                <textarea class="form-control {{ $errors->has('about_text') ? 'is-invalid' : '' }} ckeditor" name="about_text"
                                    id="about_text" rows="4">{{ old('about_text', get_setting('about_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="registration_number">رقم التسجيل</label>
                                <input class="form-control {{ $errors->has('registration_number') ? 'is-invalid' : '' }}"
                                    type="text" name="registration_number" id="registration_number"
                                    value="{{ old('registration_number', get_setting('registration_number')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="registration_date">تاريخ التسجيل</label>
                                <input class="form-control {{ $errors->has('registration_date') ? 'is-invalid' : '' }}"
                                    type="text" name="registration_date" id="registration_date"
                                    value="{{ old('registration_date', get_setting('registration_date')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bank_account_1">رقم الحساب البنكي الأول</label>
                                <input class="form-control {{ $errors->has('bank_account_1') ? 'is-invalid' : '' }}"
                                    type="text" name="bank_account_1" id="bank_account_1"
                                    value="{{ old('bank_account_1', get_setting('bank_account_1')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bank_account_2">رقم الحساب البنكي الثاني</label>
                                <input class="form-control {{ $errors->has('bank_account_2') ? 'is-invalid' : '' }}"
                                    type="text" name="bank_account_2" id="bank_account_2"
                                    value="{{ old('bank_account_2', get_setting('bank_account_2')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="vision_text">الرؤية</label>
                                <textarea class="form-control {{ $errors->has('vision_text') ? 'is-invalid' : '' }}" name="vision_text"
                                    id="vision_text" rows="3">{{ old('vision_text', get_setting('vision_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mission_text">الرسالة</label>
                                <textarea class="form-control {{ $errors->has('mission_text') ? 'is-invalid' : '' }}" name="mission_text"
                                    id="mission_text" rows="3">{{ old('mission_text', get_setting('mission_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="values_text">القيم</label>
                                <textarea class="form-control ckeditor {{ $errors->has('values_text') ? 'is-invalid' : '' }}" name="values_text"
                                    id="values_text" rows="3">{{ old('values_text', get_setting('values_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="chairman_name">اسم رئيس مجلس الإدارة</label>
                                <input class="form-control {{ $errors->has('chairman_name') ? 'is-invalid' : '' }}"
                                    type="text" name="chairman_name" id="chairman_name"
                                    value="{{ old('chairman_name', get_setting('chairman_name')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="chairman_image">صورة رئيس مجلس الإدارة</label>
                                <div class="needsclick dropzone {{ $errors->has('chairman_image') ? 'is-invalid' : '' }}"
                                    id="chairman_image-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="chairman_message">كلمة رئيس مجلس الإدارة</label>
                                <textarea class="form-control {{ $errors->has('chairman_message') ? 'is-invalid' : '' }} ckeditor" name="chairman_message"
                                    id="chairman_message" rows="5">{{ old('chairman_message', get_setting('chairman_message')) }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="organizational_structure_image">صورة الهيكل التنظيمي</label>
                                <div class="needsclick dropzone {{ $errors->has('organizational_structure_image') ? 'is-invalid' : '' }}"
                                    id="organizational_structure_image-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="license_certificate_image">صورة شهادة الترخيص</label>
                                <div class="needsclick dropzone {{ $errors->has('license_certificate_image') ? 'is-invalid' : '' }}"
                                    id="license_certificate_image-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="executive_committee_text">اللجنة التنفيذية</label>
                                <textarea class="form-control {{ $errors->has('executive_committee_text') ? 'is-invalid' : '' }} ckeditor" name="executive_committee_text"
                                    id="executive_committee_text" rows="5">{{ old('executive_committee_text', get_setting('executive_committee_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="financial_sustainability_committee_text">لجنة الاستدامة المالية</label>
                                <textarea class="form-control {{ $errors->has('financial_sustainability_committee_text') ? 'is-invalid' : '' }} ckeditor" name="financial_sustainability_committee_text"
                                    id="financial_sustainability_committee_text" rows="5">{{ old('financial_sustainability_committee_text', get_setting('financial_sustainability_committee_text')) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane @if (request('setting_type') == 'setting_2') active @endif" role="tabpanel" id="setting_2">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_2">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="facebook_url">رابط فيسبوك</label>
                                <input class="form-control {{ $errors->has('facebook_url') ? 'is-invalid' : '' }}"
                                    type="url" name="facebook_url" id="facebook_url"
                                    value="{{ old('facebook_url', get_setting('facebook_url')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="twitter_url">رابط تويتر</label>
                                <input class="form-control {{ $errors->has('twitter_url') ? 'is-invalid' : '' }}"
                                    type="text" name="twitter_url" id="twitter_url"
                                    value="{{ old('twitter_url', get_setting('twitter_url')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="instagram_url">رابط إنستغرام</label>
                                <input class="form-control {{ $errors->has('instagram_url') ? 'is-invalid' : '' }}"
                                    type="url" name="instagram_url" id="instagram_url"
                                    value="{{ old('instagram_url', get_setting('instagram_url')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="youtube_url">رابط يوتيوب</label>
                                <input class="form-control {{ $errors->has('youtube_url') ? 'is-invalid' : '' }}"
                                    type="url" name="youtube_url" id="youtube_url"
                                    value="{{ old('youtube_url', get_setting('youtube_url')) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane @if (request('setting_type') == 'setting_3') active @endif" role="tabpanel" id="setting_3">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_3">
                        <div class="form-group">
                            <label for="meta_title">{{ trans('cruds.setting.fields.meta_title') }}</label>
                            <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title"
                                value="{{ old('meta_title', get_setting('meta_title')) }}">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ trans('cruds.setting.fields.meta_description') }}</label>
                            <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" name="meta_description" id="meta_description">{{ old('meta_description', get_setting('meta_description')) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">{{ trans('cruds.setting.fields.meta_keywords') }}</label>
                            <input type="text" class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" name="meta_keywords[]" id="meta_keywords" placeholder="Keywords ..."
                                data-role="tagsinput" value="{{ old('meta_keywords', get_setting('meta_keywords')) }}">
                        </div>
                        <div class="form-group">
                            <label for="metaimage">{{ trans('cruds.setting.fields.metaimage') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('metaimage') ? 'is-invalid' : '' }}" id="metaimage-dropzone">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane @if (request('setting_type') == 'setting_4') active @endif" role="tabpanel" id="setting_4">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf

                        <input type="hidden" name="setting_type" value="setting_4">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="clients_count">عدد العملاء</label>
                                <input class="form-control {{ $errors->has('clients_count') ? 'is-invalid' : '' }}"
                                    type="number" name="clients_count" id="clients_count"
                                    value="{{ old('clients_count', get_setting('clients_count')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lessons_count">عدد الدروس</label>
                                <input class="form-control {{ $errors->has('lessons_count') ? 'is-invalid' : '' }}"
                                    type="number" name="lessons_count" id="lessons_count"
                                    value="{{ old('lessons_count', get_setting('lessons_count')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="teachers_count">المعلمين والمتطوعين</label>
                                <input class="form-control {{ $errors->has('teachers_count') ? 'is-invalid' : '' }}"
                                    type="number" name="teachers_count" id="teachers_count"
                                    value="{{ old('teachers_count', get_setting('teachers_count')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="certificates_count">الشهادات</label>
                                <input class="form-control {{ $errors->has('certificates_count') ? 'is-invalid' : '' }}"
                                    type="number" name="certificates_count" id="certificates_count"
                                    value="{{ old('certificates_count', get_setting('certificates_count')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="initiatives_count">المبادرات</label>
                                <input class="form-control {{ $errors->has('initiatives_count') ? 'is-invalid' : '' }}"
                                    type="number" name="initiatives_count" id="initiatives_count"
                                    value="{{ old('initiatives_count', get_setting('initiatives_count')) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="courses_count">دورات تطويرية</label>
                                <input class="form-control {{ $errors->has('courses_count') ? 'is-invalid' : '' }}"
                                    type="number" name="courses_count" id="courses_count"
                                    value="{{ old('courses_count', get_setting('courses_count')) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                {{-- <div class="tab-pane @if (request('setting_type') == 'setting_5') active @endif" role="tabpanel" id="setting_5">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_5">
                        <div class="form-group">
                            <label>Font Link</label>
                            <input class="form-control" type="text" name="font_link[]" placeholder="Font Links ..."
                            data-role="tagsinput" value="{{ get_setting('font_link') }}">
                        </div> 
                        <div class="form-group">
                            <label>Font Name</label>
                            <input class="form-control" type="text" name="font_name[]" placeholder="Fonts ..."
                            data-role="tagsinput" value="{{ get_setting('font_name') }}">
                        </div> 
                        <div class="form-group">
                            <label>Font Size</label>
                            <input class="form-control" type="text"
                                name="font_size" value="{{ get_setting('font_size') }}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>SideMenu BackGround Color</label>
                                <input class="form-control" type="color"
                                name="sidemenu_background" value="{{ get_setting('sidemenu_background') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>SideMenu Font Color</label>
                                <input class="form-control" type="color"
                                name="sidemenu_font_color" value="{{ get_setting('sidemenu_font_color') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>SideMenu Icon Color</label>
                                <input class="form-control" type="color"
                                name="sidemenu_icon_color" value="{{ get_setting('sidemenu_icon_color') }}">
                            </div> 
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="logo"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('logo'))
                    var external_link = "{!! asset(get_setting('logo')) !!}"
                    var mockFile = {
                        name: "logo",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="logo" value="' + mockFile.file_name +
                        '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.logoFooterDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="logo_footer"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="logo_footer" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="logo_footer"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('logo_footer'))
                    var external_link = "{!! asset(get_setting('logo_footer')) !!}"
                    var mockFile = {
                        name: "logo_footer",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="logo_footer" value="' + mockFile.file_name +
                        '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.organizationalStructureImageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="organizational_structure_image"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="organizational_structure_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="organizational_structure_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('organizational_structure_image'))
                    var external_link = "{!! asset(get_setting('organizational_structure_image')) !!}"
                    var mockFile = {
                        name: "organizational_structure_image",
                        size: 12345
                    };
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="organizational_structure_image" value="' + mockFile.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.licenseCertificateImageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="license_certificate_image"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="license_certificate_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="license_certificate_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('license_certificate_image'))
                    var external_link = "{!! asset(get_setting('license_certificate_image')) !!}"
                    var mockFile = {
                        name: "license_certificate_image",
                        size: 12345
                    };
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="license_certificate_image" value="' + mockFile.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.chairmanImageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="chairman_image"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="chairman_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="chairman_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('chairman_image'))
                    var external_link = "{!! asset(get_setting('chairman_image')) !!}"
                    var mockFile = {
                        name: "chairman_image",
                        size: 12345
                    };
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="chairman_image" value="' + mockFile.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.metaimageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                 
            },
            success: function(file, response) {
                $('#setting_3 form').find('input[name="metaimage"]').remove()
                $('#setting_3 form').append('<input type="hidden" name="metaimage" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_3 form').find('input[name="metaimage"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('metaimage'))
                    var external_link = "{!! asset(get_setting('metaimage')) !!}"
                    var mockFile = {
                        name: "Meta Image",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_3 form').append('<input type="hidden" name="metaimage" value="' + mockFile
                        .file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.settings.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', 0);
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
@endsection
