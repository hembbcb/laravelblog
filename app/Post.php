<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;

class Post extends Model
{

            use SoftDeletes;
            protected $dates = ['published_at'];
            protected $fillable =[ 'view_count','image','author_id','title', 'category_id', 'slug', 'body', 'excerpt', 'published_at'];

        public function category(){

            return $this->belongsTo(Category::class);
        }


        public function author()
        {
            return $this->belongsTo(User::class);
        }


        public function dateFormatted($showTimes = false)
        {
            $format = "d/m/Y";
            if ($showTimes) $format = $format . " H:i:s";
            return $this->created_at->format($format);

        }

        public function PublicationLabel()
        {

        if ( ! $this->published_at ) {

            return '<span class="label label-warning">Draft</span>';
        } 

        elseif ($this->published_at && $this->published_at->isFuture() )
        {
            return '<span class="label label-info"> Schedule</span>';
        }
        elseif($this-> published_at && $this->deleted_at) {

            return '<span class="label label-info">Deleted</span>';
        }
        else {

            return '<span class="label label-success">Published</span>';
        }

        }


        public function getBodyHtmlAttribute($value){

            return $this->body ? Markdown::convertToHtml(e($this->body)): NULL;
        }


        public function getExcerptHtmlAttribute($value){

            return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)):NULL;
        }


        public function getImageUrlAttribute($value){

            $imageUrl = "";

            if ( ! is_null($this->image))

        {

            $imagePath = public_path(). '/img/'.$this->image;
            if (file_exists($imagePath)) $imageUrl = asset('img/'. $this->image);
        }

        return $imageUrl;
        }

        public function getDateAttribute($value)

        {
            return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
        }


        public function scopeLatestFirst()

        {
            return $this->orderBy('created_at', 'desc');
        }


        public function scopePopular()

        {
            return $this->orderBy('view_count', 'desc');
        }


        public function scopePublished($query)

        {
            return $query->where("published_at", "<=", Carbon::now());
        }

        public function scopeScheduled($query)

        {
            return $query->where("published_at", ">", Carbon::now());
        }

        public function scopeDraft($query)

        {
            return $query->whereNull("published_at");
        }


        public function setPublishedAtAttribute($value)
        {
            $this->attributes['published_at'] = $value ?: NULL;
        }

        public function scopeFilter($query, $term)

        {
            if ($term){

                $query->where(function($q) use ($term){


                    $q->whereHas('author', function($qa) use ($term){

                        $qa->Where('name', 'LIKE', "%{$term}%");
                    });


                    $q->orWhereHas('category', function($qc) use ($term){

                        $qc->orWhere('title', 'LIKE', "%{$term}%");
                    });
                    
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");


                });

            }
        }

        public function tags(){

            return $this->belongsToMany(Tag::class);
        }

        public function getTagsHtmlAttribute()
        {
            $anchors =[];
            
            foreach($this->tags as $tag){
                                            
        $anchors[]= '<a href ="' . route('tag', $tag->name) .'">' . $tag ->name .'</a>';
            
            
            }

            return implode (",", $anchors);
        }


        public function createTags($tagString)

        {
            $tags = explode(",", $tagString);
            $tagIds = [];

        foreach ($tags as $tag)
        {

            $newTag = new Tag(); 
            $newTag = Tag::firstOrcreate( ['name' => ucwords(trim($tag))]);
            $newTag->save();

            $tagIds[] = $newTag->id;

        }

        $this->tags()->detach();
        $this->tags()->attach($tagIds);

        }

        public function getTagsListAttribute()
            {

            return $this->tags->pluck('name');
            }


}
