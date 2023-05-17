<?php
use App\Models\Setting;
use App\Models\FrontSetting;
use App\Models\Page;



function notificationMsg($type, $message)
{
    // get notification message
    \Session::put($type, $message);
}

/**
 * Write Your Code..
 *
 * @return string
*/
// function getFrontSettingValue($key)
// {
//     return Setting::where('slug', $key)->value('value');
// }
/**
 * Write Your Code..
 *
 * @return string
*/
// function getCurrentYear()
// {
//     $copyRights = getFrontSettingValue('Footer-description');

//     return str_replace('{ current_year }', date("Y"), $copyRights);
// }

/**
 * Write Your Code..
 *
 * @return string
*/
// function getPages($key)
// {
//     return Page::where('slug', $key)->value('title');
// }

/**
 * Write Your Code..
 *
 * @return string
*/
// function getStates()
// {
//     return array(
//         'al'=>'Alabama',
//         'ak'=>'Alaska',
//         'as'=>'American Samoa',
//         'az'=>'Arizona',
//         'ar'=>'Arkansas',
//         'ca'=>'California',
//         'co'=>'Colorado',
//         'ct'=>'Connecticut',
//         'de'=>'Delaware',
//         'dc'=>'District of Columbia',
//         'fm'=>'Federated States of Micronesia',
//         'fl'=>'Florida',
//         'ga'=>'Georgia',
//         'gu'=>'Guam Gu',
//         'hi'=>'Hawaii',
//         'id'=>'Idaho',
//         'il'=>'Illinois',
//         'in'=>'Indiana',
//         'ia'=>'Iowa',
//         'ks'=>'Kansas',
//         'ky'=>'Kentucky',
//         'la'=>'Louisiana',
//         'me'=>'Maine',
//         'mh'=>'Marshall Islands',
//         'md'=>'Maryland',
//         'ma'=>'Massachusetts',
//         'mi'=>'Michigan',
//         'mn'=>'Minnesota',
//         'ms'=>'Mississippi',
//         'mo'=>'Missouri',
//         'mt'=>'Montana',
//         'ne'=>'Nebraska',
//         'nv'=>'Nevada',
//         'nh'=>'New Hampshire',
//         'nj'=>'New Jersey',
//         'nm'=>'New Mexico',
//         'ny'=>'New York',
//         'nc'=>'North Carolina',
//         'nd'=>'North Dakota',
//         'mp'=>'Northern Mariana Islands',
//         'oh'=>'Ohio',
//         'ok'=>'Oklahoma',
//         'or'=>'Oregon',
//         'pw'=>'Palau',
//         'pa'=>'Pennsylvania',
//         'pr'=>'Puerto Rico',
//         'ri'=>'Rhode Island',
//         'sc'=>'South Carolina',
//         'sd'=>'South Dakota',
//         'tn'=>'Tennessee',
//         'tx'=>'Texas',
//         'ut'=>'Utah',
//         'vt'=>'Vermont',
//         'vi'=>'Virgin Islands',
//         'va'=>'Virginia',
//         'wa'=>'Washington',
//         'wv'=>'West Virginia',
//         'wi'=>'Wisconsin',
//         'wy'=>'Wyoming',
//     );

// }

/**
 * Write Your Code..
 *
 * @return string
*/
function getFileExtension($name)
{
    return pathinfo($name, PATHINFO_EXTENSION);
}

/**
 * Write Your Code..
 *
 * @return string
*/
    function getAreaLive()
    {
        return array(
            'miami'=>'Miami Dade & Broward County',
            'palm-beach'=>'Palm Beach County',
            'tampa'=>'Hillsborough County (Tampa)',
            'orlando'=>'Orange County (Orlando)',
        );
    }

    function frontSetting($slug)
    {
        $settingData = FrontSetting::where('slug',$slug)->first();   

        return $settingData['value'];
    }
?>