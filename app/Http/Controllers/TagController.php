<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\subTag;
use Illuminate\Database\Eloquent\Model;

class TagController extends Controller
{
    public static function selectTags($name)
    {
    	$text = '<select  name="'.$name.'" class="js-example-basic-single" multiple>';
    	$table = Tag::all();
    	foreach($table as $key => $value)
    	{
    		$text .= '<optgroup label="'.$value->name.'">';
            foreach(subTag::all()->where('tag',$value->id) as $key => $val)
            {
            	$text .= '<option value="'.$val->id.'">'.$val->name.'</option>';
            }
            $text .= '</optgroup>';
    	}    	
    	$text .= '</select>';
    	return $text;
    }

    public static function viewTags()
    {
    	$text = '';
    	$table = Tag::all()
               ->take(6);
    	$i = 0;
    	foreach($table as $key => $value)
    	{
    		$text .= '<a href="#category" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
				    '.$value->name.'
				    <span class="">'.$i++.'</span>
				  </a>';
    		// if($i == 6)
    		// {    			
				  // break;
    		// }
    	}
    	return $text;
    }
}
