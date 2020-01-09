<?php

namespace app\components;

use yii\base\BootstrapInterface;

// https://github.com/samdark/yii2-cookbook/blob/master/book/i18n-selecting-application-language.md#support-selecting-language-manually
class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];


    public function bootstrap($app)
    {

        /*$preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        $app->language = $preferredLanguage; */
        $preferredLanguage = isset($app->request->cookies['language']) ? (string) $app->request->cookies['language'] : null;
        //$preferredLocale = isset($app->request->cookies['locale']) ? (string) $app->request->cookies['locale'] : null;
        //  $preferredCalendar = isset($app->request->cookies['calendar']) ? (string)$app->request->cookies['calendar'] : null;
        // or in case of database:
        //$preferredLanguage = $app->user->language;

        if (empty($preferredLanguage)) {
            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        }
        $app->language = $preferredLanguage;


        // Set Locale ID and Calendar for Buddhist calendar
        // Important: 
        // If the PHP intl extension is not available, setting this calendar property will have no effect.
        // This setting will chagne from คศ to พศ     
        // 
        // @link 
        // http://www.yiiframework.com/doc-2.0/yii-i18n-formatter.html#$locale-detail
        // http://www.yiiframework.com/doc-2.0/yii-i18n-formatter.html#$calendar-detail  
        //$app->formatter->locale = $preferredLocale; */
        //  $app->formatter->calendar = (int)$preferredCalendar;   // calendar must be integer. Cookie always stores as string. So you must convert the cookie value to integer.  
    }
}
