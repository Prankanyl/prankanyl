<?php

namespace App\Observers;

use App\Models\Setting;

class SettingObserver
{
    /**
     * @param $setting
     */
    public function setActiveSetting($setting)
    {
        if($setting->active){
            $settings = Setting::get();
            foreach ($settings as $item){
                $item->active = 0;
                $item->save();
            }
        }
    }
    /**
     * Handle the Setting "creating" event.
     *
     * @param Setting $setting
     * @return void
     */
    public function creating(Setting $setting)
    {
        $this->setActiveSetting($setting);
    }

    /**
     * Handle the Setting "updating" event.
     *
     * @param Setting $setting
     * @return void
     */
    public function updating(Setting $setting)
    {
        $this->setActiveSetting($setting);
    }

    /**
     * Handle the Setting "deleting" event.
     *
     * @param Setting $setting
     * @return void
     */
    public function deleting(Setting $setting)
    {
        if($setting->active){
            $active_setting = Setting::firstOrFail();
            $active_setting->active = 1;
            $active_setting->save();
        }
    }
}
