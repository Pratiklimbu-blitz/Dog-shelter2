<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AppHelper
{
    public static function renameImageFileUpload($file): string
    {
        $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        return Str::of($imageName)->slug('_').'_'.date('YmdHis').'.'.$file->extension();
    }

    /**
     * $value is the value which needs to be slugify
     * $model is the model where uniqueness need to be checked
     * $current_id is the id in case of update
     * $dependent column is the column whose value use used to slugify
     * @param $value
     * @param $model
     * @param $current_id
     * @param $dependent_column
     */
    public static function uniqueSlugify($value, $model, $current_id, $dependent_column, $dependent_array = [])
    {
        $slug = Str::of($value)->slug('-');
        $query = self::prepareQueryForUniqueSlugCheck($model, $slug, $current_id);
        while( $query->exists() ) {
            $slug = self::incrementSlug($slug, $slug, $model, $dependent_column, $dependent_array);
            $query = self::prepareQueryForUniqueSlugCheck($model, $slug, $current_id);
        }
        return $slug;
    }
    public static function incrementSlug($title, $slug, $model, $dependent_column, $dependent_array){

        // get the slug of the latest created post
        $query =  $model::where($dependent_column,$title);

        foreach($dependent_array as $k => $v){
            $query->where($k,$v);
        }
        $max = $query->latest('id')->value('slug');
        if (isset($max[-1]) && is_numeric($max[-1])) {
            $new_slug =  preg_replace_callback('/(\d+)$/', function ($matches) {
                return $matches[1] + 1;
            }, $max);
        }else{
            //will send two only if last digit of last slug is not number
            $new_slug =  "{$slug}-2";
        }
        return $new_slug;
    }


    public static function prepareQueryForUniqueSlugCheck($model, $slug, $current_id)
    {
        $query = $model::where('slug',$slug);
        if(!empty($current_id)){
            $query->where('id','!=',$current_id);
        }
        return $query;
    }
    public static function datetime_on_user_timezone($date)
    {
        $auth_user = Auth::user();
        if($auth_user && !empty($auth_user->timezone)){
            return $date->setTimezone($auth_user->timezone);
        }
        return $date;
    }

   public static function danger_pill(string $pill): string{
        return  "<span class='badge bg-danger '>{$pill}</span>";
    }


  public static  function success_pill(string $pill): string{
        return  "<span class='badge bg-success'>{$pill}</span>";
    }

   public static  function info_pill(string $pill): string{
        return  "<span class='badge bg-info'>{$pill}</span>";
    }

}
