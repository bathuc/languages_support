<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model
{
    public $timestamps = false;

    /*
	 * remove special character from $field.
	 */
    public static function removeTags($field)
    {
        return htmlentities(strip_tags($field), ENT_QUOTES, 'UTF-8');
    }

    /*
     * Prepare data for insert or update
     */
    public static function prepareData($inputs)
    {
        $data = [];
        $fields = Schema::getColumnListing((new static)->getTable());
        foreach ($fields as $field) {
            if($field == 'password') {
                $data[$field] = $inputs[$field];
            }
            elseif(isset($inputs[$field])){
                $data[$field] = self::removeTags($inputs[$field]);
            }
        }
        return $data;
    }

    public static function insertData($inputs)
    {
        $data = self::prepareData($inputs);
        $id = self::insert($data);
        return $id;
    }

    public static function updateById($id, $inputs)
    {
        $data = self::prepareData($inputs);
        $primaryKeyName = (new static)->getKeyName();
        $id = self::where($primaryKeyName,$id)->update($data);
        return $id;
    }

}
