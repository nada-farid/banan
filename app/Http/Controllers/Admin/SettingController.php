<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('logo', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        return redirect()->route('admin.settings.index');
    }

    /**
     * Helper function to encode value as JSON (matching SettingSeeder behavior)
     */
    private function encodeSettingValue($value)
    {
        return json_encode($value ?? '', JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Ensure settings directory exists
     */
    private function ensureSettingsDirectory()
    {
        $settingsPath = public_path('settings');
        if (!File::exists($settingsPath)) {
            File::makeDirectory($settingsPath, 0755, true);
        }
    }
   
    public function update(Request $request)
    {
        // Ensure settings directory exists
        $this->ensureSettingsDirectory();
        
        if ($request->setting_type == 'setting_1') {
            // General Settings - حسب SettingSeeder
            Setting::updateOrCreate(['key' => 'organization_name'], ['value' => $this->encodeSettingValue($request->organization_name)]);
            Setting::updateOrCreate(['key' => 'phone'], ['value' => $this->encodeSettingValue($request->phone)]);
            Setting::updateOrCreate(['key' => 'mobile'], ['value' => $this->encodeSettingValue($request->mobile)]);
            Setting::updateOrCreate(['key' => 'email'], ['value' => $this->encodeSettingValue($request->email)]);
            Setting::updateOrCreate(['key' => 'address'], ['value' => $this->encodeSettingValue($request->address)]);
            Setting::updateOrCreate(['key' => 'about_text'], ['value' => $this->encodeSettingValue($request->about_text)]);
            Setting::updateOrCreate(['key' => 'vision_text'], ['value' => $this->encodeSettingValue($request->vision_text)]);
            Setting::updateOrCreate(['key' => 'mission_text'], ['value' => $this->encodeSettingValue($request->mission_text)]);
            Setting::updateOrCreate(['key' => 'values_text'], ['value' => $this->encodeSettingValue($request->values_text)]);
            Setting::updateOrCreate(['key' => 'registration_number'], ['value' => $this->encodeSettingValue($request->registration_number)]);
            Setting::updateOrCreate(['key' => 'registration_date'], ['value' => $this->encodeSettingValue($request->registration_date)]);
            Setting::updateOrCreate(['key' => 'chairman_message'], ['value' => $this->encodeSettingValue($request->chairman_message)]);
            Setting::updateOrCreate(['key' => 'chairman_name'], ['value' => $this->encodeSettingValue($request->chairman_name)]);
            Setting::updateOrCreate(['key' => 'bank_account_1'], ['value' => $this->encodeSettingValue($request->bank_account_1)]);
            Setting::updateOrCreate(['key' => 'bank_account_2'], ['value' => $this->encodeSettingValue($request->bank_account_2)]);
            Setting::updateOrCreate(['key' => 'executive_committee_text'], ['value' => $this->encodeSettingValue($request->executive_committee_text)]);
            Setting::updateOrCreate(['key' => 'financial_sustainability_committee_text'], ['value' => $this->encodeSettingValue($request->financial_sustainability_committee_text)]);
            
            // Logo handling
            if ($request->has('logo')) {
                if ($request->input('logo') != "undefined") {
                    $filePath = storage_path('tmp/uploads/' . basename($request->input('logo')));
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                    $file_name = time() . '_logo_settings.' . $extension;
                    File::move($filePath, public_path('settings/' . $file_name));
                    Setting::updateOrCreate(['key' => 'logo'], ['value' => $this->encodeSettingValue('settings/' . $file_name)]);
                }
            }
            
            if ($request->has('logo_footer')) {
                if ($request->input('logo_footer') != "undefined") {
                    $filePath = storage_path('tmp/uploads/' . basename($request->input('logo_footer')));
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                    $file_name = time() . '_logo_footer_settings.' . $extension;
                    File::move($filePath, public_path('settings/' . $file_name));
                    Setting::updateOrCreate(['key' => 'logo_footer'], ['value' => $this->encodeSettingValue('settings/' . $file_name)]);
                }
            }
            
            // Chairman Image
            if ($request->has('chairman_image')) {
                if ($request->input('chairman_image') != "undefined") {
                    $filePath = storage_path('tmp/uploads/' . basename($request->input('chairman_image')));
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                    $file_name = time() . '_chairman_image.' . $extension;
                    File::move($filePath, public_path('settings/' . $file_name));
                    Setting::updateOrCreate(['key' => 'chairman_image'], ['value' => $this->encodeSettingValue('settings/' . $file_name)]);
                }
            }
            
            // Organizational Structure Image
            if ($request->has('organizational_structure_image')) {
                if ($request->input('organizational_structure_image') != "undefined") {
                    $filePath = storage_path('tmp/uploads/' . basename($request->input('organizational_structure_image')));
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                    $file_name = time() . '_organizational_structure.' . $extension;
                    File::move($filePath, public_path('settings/' . $file_name));
                    Setting::updateOrCreate(['key' => 'organizational_structure_image'], ['value' => $this->encodeSettingValue('settings/' . $file_name)]);
                }
            }
            
            // License Certificate Image
            if ($request->has('license_certificate_image')) {
                if ($request->input('license_certificate_image') != "undefined") {
                    $filePath = storage_path('tmp/uploads/' . basename($request->input('license_certificate_image')));
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                    $file_name = time() . '_license_certificate.' . $extension;
                    File::move($filePath, public_path('settings/' . $file_name));
                    Setting::updateOrCreate(['key' => 'license_certificate_image'], ['value' => $this->encodeSettingValue('settings/' . $file_name)]);
                }
            }

        } elseif ($request->setting_type == 'setting_2') {
            // Social Media - حسب SettingSeeder
            Setting::updateOrCreate(['key' => 'facebook_url'], ['value' => $this->encodeSettingValue($request->facebook_url)]);
            Setting::updateOrCreate(['key' => 'twitter_url'], ['value' => $this->encodeSettingValue($request->twitter_url)]);
            Setting::updateOrCreate(['key' => 'instagram_url'], ['value' => $this->encodeSettingValue($request->instagram_url)]);
            Setting::updateOrCreate(['key' => 'youtube_url'], ['value' => $this->encodeSettingValue($request->youtube_url)]);
            
        } elseif ($request->setting_type == 'setting_3') {
            // SEO Settings
            Setting::updateOrCreate(['key' => 'meta_title'], ['value' => $this->encodeSettingValue($request->meta_title)]);
            Setting::updateOrCreate(['key' => 'meta_description'], ['value' => $this->encodeSettingValue($request->meta_description)]);
            Setting::updateOrCreate(['key' => 'meta_keywords'], ['value' => $this->encodeSettingValue(implode(',', $request->meta_keywords ?? []))]);
            if ($request->has('metaimage')) {
                if ($request->input('metaimage') != "undefined") {
                    $filePath = storage_path('tmp/uploads/' . basename($request->input('metaimage')));
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                    $file_name = time() . '_metaimage_settings.' . $extension;
                    File::move($filePath, public_path('settings/' . $file_name));
                    Setting::updateOrCreate(['key' => 'metaimage'], ['value' => $this->encodeSettingValue('settings/' . $file_name)]);
                }
            }
        } elseif ($request->setting_type == 'setting_4') {
            // Statistics - حسب الفرونت (index.blade.php)
            Setting::updateOrCreate(['key' => 'clients_count'], ['value' => $this->encodeSettingValue($request->clients_count)]);
            Setting::updateOrCreate(['key' => 'lessons_count'], ['value' => $this->encodeSettingValue($request->lessons_count)]);
            Setting::updateOrCreate(['key' => 'teachers_count'], ['value' => $this->encodeSettingValue($request->teachers_count)]);
            Setting::updateOrCreate(['key' => 'certificates_count'], ['value' => $this->encodeSettingValue($request->certificates_count)]);
            Setting::updateOrCreate(['key' => 'initiatives_count'], ['value' => $this->encodeSettingValue($request->initiatives_count)]);
            Setting::updateOrCreate(['key' => 'courses_count'], ['value' => $this->encodeSettingValue($request->courses_count)]);
        } 

        // Clear cache after update
        Artisan::call('cache:clear');

        Alert::success('تم بنجاح', 'تم تعديل البيانات بنجاح');

        return redirect()->route('admin.settings.index', ['setting_type' => $request->setting_type]);
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        $settings = Setting::find(request('ids'));

        foreach ($settings as $setting) {
            $setting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    /**
     * Update multilingual setting
     */
    private function updateMultilingualSetting($key, $enValue, $arValue)
    {
        $value = json_encode([
            'en' => $enValue,
            'ar' => $arValue
        ]);
        
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
