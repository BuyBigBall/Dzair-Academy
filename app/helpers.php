<?php

use App\Models\Translate;
use App\Models\settings;

use Illuminate\Support\Str;
use File as fle;

if( !defined('VIDEO_EXTENSIONS')) define('VIDEO_EXTENSIONS', [
    'mp4','mpg','avi','rm','rmv'
]);
if( !defined('IMAGE_EXTENSIONS')) define('IMAGE_EXTENSIONS', [
    'png','jpg','bmp','gif'
]);
if( !defined('DOCUMENTS_EXTENSIONS')) define('DOCUMENTS_EXTENSIONS', [
    'docx','doc','xls','xlsx','txt','ppt','pptx','pdf'
]);
if( !defined('ARCHIVE_EXTENSIONS')) define('ARCHIVE_EXTENSIONS', [
    'zip','rar','7z','alz'
]);

if( !defined('MAX_COURSE_UPLOAD_SIZE')) define('MAX_COURSE_UPLOAD_SIZE', 1024);
//We use this to convert date to new format

function seo_friendly_url($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return strtolower(trim($string, '-'));
}

function agotime($date)
{
    if(!! empty($date)) return "";
    $diff = date_diff( new \DateTime( "now" ), new \DateTime( date( 'Y-n-d H:i:s', strtotime($date))) );
    $ago_time = (($diff->y>=1) ? (($diff->y+1) . __(' years ago') ) : 
                (($diff->m>=1) ? (($diff->m+1) . __(' months ago') ) : 
                (($diff->d>=1) ? (($diff->d+1) . __(' days ago') ) : 
                (($diff->h>=1) ? (($diff->h+1) . __(' hours ago') ) : 
                (($diff->i>=1) ? (($diff->i+1) . __(' minutes ago') ) : 
                date( 'l d M Y H:i:s P (T)', strtotime($date) )   )))));
    return $ago_time;
}


function userphoto($path)
{
    //if(!empty($path))     dd(__DIR__ . '/../public/uploads/' . ($path));
    if( !!empty($path) || !file_exists(__DIR__ . '/../public/uploads/' . ($path)))
    {
        return '/assets/img/user.png';
    }
    return asset('uploads/'. $path);
}
function GetFile_Type($extension)
{
    if( in_array( strtolower($extension), VIDEO_EXTENSIONS) ) return 2;
    if( in_array( strtolower($extension), IMAGE_EXTENSIONS) ) return 2;
    if( in_array( strtolower($extension), DOCUMENTS_EXTENSIONS) ) return 1;
    if( in_array( strtolower($extension), ARCHIVE_EXTENSIONS) ) return 3;
    return 0;
}
function ToDate($date)
{
    return $date->format('Y-m-d');
};


function mat_lang($mat)
{
    $lang = App::getLocale();
    env('DEFAULT_LANGUAGE', $lang);
    
    foreach($mat->lang as $matlang)
    {
        if($matlang->language==$lang && !empty($matlang))  
        {
            //dd($matlang);
            return $matlang;
        }
    }
    return null;
}

function ln($obj)
{
    $lang = App::getLocale();
    env('DEFAULT_LANGUAGE', $lang);
    if($obj!=null)
    {
        if($lang=='en')    return $obj->en;
        if($lang=='fr')    return $obj->fr;
        if($lang=='ar')    return $obj->ar;
    }
    return null;
}

function filetypename($filetype)
{
    if($filetype==1)        return 'document';
    else if($filetype==2)   return 'image/video';
    else if($filetype==3)   return 'archive';
    return 'other';
}
function size($size)
{
    if($size>=1024*1024) return round($size/1024/1024,1).'MB';
    else if($size>=1024) return round($size/1024,1).'KB';
    return $size.'B';
}
function lang()
{
    $lang = App::getLocale();
    return $lang;
    //return env('DEFAULT_LANGUAGE', $lang);
}
//We use this to translate text 
function translate($key,  $lang = null, $coll = 'general' ){
    if($lang == null){
        $lang = App::getLocale();
    }

    // if Translate = 0 create new one
    $translation = Translate::where('lang', env('DEFAULT_LANGUAGE', $lang))
                            ->where('key', $key)
                            ->where('collection', $coll)->first();

    if($translation == null){
        
        foreach(getSupportedLocales() as $lang_code){
            $translation = new Translate;
            $translation->lang = $lang_code;
            $translation->key = $key;
            $translation->value = ($lang_code!=$lang) ? null : $key;
            $translation->collection = $coll;
            $translation->save();
        }
    }

    $translation_locale = Translate::where('key', $key)
                                   ->where('lang', $lang)
                                   ->where('collection', $coll)->first();
    if($translation_locale != null && $translation_locale->value != null){
        return $translation_locale->value;
    }
    elseif($translation->value != null){
        return $translation->value;
    }
    else{
        return $key;
    }
};



//We use this to remove files

function removeFile($path)
{
    if (!file_exists($path)) {
        return true;
    }
    return fle::delete($path);
};

// We use this to make files directory

function makeDirectory($path)
{
    if (fle::exists($path)) {
        return true;
    }
    return fle::makeDirectory($path, 0775, true);
};


// We use this to upload images

function FileUpload($file, $location, $old = null , $specificName = null)
{
    $path = makeDirectory($location);
    if (!empty($old)) {
        removeFile($old);
    }
    if (!empty($specificName)) {
        $filename = $specificName . '.' . $file->getClientOriginalExtension();
    } else {
        $filename = Str::random(15) . '_' . time() . '.' . $file->getClientOriginalExtension();
    }
    $file->move($location, $filename);
    return $location . $filename;
};



function getSupportedLocales()
{
    $locales = \Config::get('constants.support_lang');

    return $locales;
}



function setEnv($key,$value)
{
    $path = base_path('.env');

    if(is_bool(env($key)))
    {
        $old = env($key)? 'true' : 'false';
    }
    elseif(env($key)===null){
        $old = 'null';
    }
    else{
        $old = env($key);
    }

    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            "$key=".$old, "$key=".$value, file_get_contents($path)
        ));
    }
}

function get_option($option, $default = null)
{
    $cacheKey = 'get.' . $option;
    $result = \App\Models\Option::where('option', $option)->value('value');
    if ($result) {
        return $result;
    }
    return $default;
}

// recipent :   receiver email array
// subject :    subject string
// content :    content array[token, active, ]
// template :   template keyname
function sendMail(array $request) //[recipent, title, content, template]
{
    $recipent   = $request['recipent'];
    $content    = $request['content'];
    if ( empty($request['subject']))                $request['subject'] = '';
    if ( empty($request['content']))                $content = '';
    if (!empty($request['template'])) {
        $activate_link = '';
        if($request['template']=='welcome')
        {
            $url = route('activate');
            $activate_link = $url . '?token='.$content['token'];
        }
        $template = $request['template'];
    }
    $success_count = 0;
    foreach ($recipent as $to) {
        if(!empty($template)) {
            $user = \App\Models\User::where('email', $to)->first();
            $template = view('emails.' . $request['template'])
                        ->with('email',     $user->email )
                        ->with('name',      $user->name )
                        ->with('subject',   $request['subject'] )
                        ->with('content',   nl2br($content['content']) )
                        ->with('activate',  $activate_link );

            Mail::send('emails.content', ['content' => $template ], 
                function ($mail) use ($user, $request) 
                {
                    $mail->to($user->email, $user->name);
                    $mail->subject($request['subject']);
                    $mail->from( env('MAIL_FROM_ADDRESS') );
                    // if (isset($request['attach']) && $request['attach'] != '') {
                    //     $mail->attach(public_path() . $request['attach']);
                    // }
                });
            $success_count++;
        }
    }

    if (count(Mail::failures()) > 0) {
        return false;
    } else {
        return $success_count;
    }

}
