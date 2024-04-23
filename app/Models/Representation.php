<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Carbon;

class Representation extends Model implements Feedable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'show_id',
        'when',
        'location_id',
    ];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'representations';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Get the actual location of the representation
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    /**
     * Get the show of the representation
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function representationReservations()
    {
        return $this->hasMany(RepresentationReservation::class);
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->show->title)
            ->summary($this->show->description)
            ->updated(Carbon::now())
            //->updated($this->updated_at)  rajouter timestamp true pour reservation
            // ->link(env(APP_URL).'/representation/'.$this->id)
            ->link(route('representation.show',$this->id))           
            ->authorName("Bob Sull")
            ->authorEmail("bob@sull.com");
    }

    // app/NewsItem.php

    public static function getFeedItems()
    {
        // return Representation::all();
        // return Representation::whereMonth('when', Carbon::now()->month)->get();
        return Representation::whereYear('when',date('Y'))->whereMonth('when', date('n'))->get();
        
    }

}
