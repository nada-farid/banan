<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class Program extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'programs';

    protected $appends = [
        'photo',
        'inside_image',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GROUP_SELECT = [
        'children' => 'أطفال',
        'males'    => 'رجال',
        'females'  => 'نساء',
        'mix'      => '(رجال /  نساء)',
    ];

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'description_2',
        'category_id',
        'start_date',
        'end_date',
        'group',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getInsideImageAttribute()
    {
        $file = $this->getMedia('inside_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function programTimelines()
    {
        return $this->hasMany(ProgramTimeline::class, 'program_id');
    }

    public function programTeams()
    {
        return $this->hasMany(ProgramTeam::class, 'program_id');
    }

    public function programGoals()
    {
        return $this->hasMany(ProgramGoal::class, 'program_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
