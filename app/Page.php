<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    public function content()
    {
        return $this->hasMany('App\PageContent');
    }

    public function author()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function getSettingsName(): string
    {
        return $this->slug . '_page_settings';
    }

    public function settings($formatted = true): array
    {
        $settings = get_option($this->getSettingsName());
        $settingsFormatted = [];

        if ($settings) {
            $settings = (array) json_decode($settings);
            if (!$formatted) {
                return $settings;
            }

            // Process settings data into a structured format.
            foreach ($settings as $key => $value) {
                $settingItem = new \stdClass();
                $settingItem->key = $key;
                $settingItem->label = __(ucfirst(str_replace("_", " ", $key)));
                $settingItem->value = $value;

                $settingsFormatted[] = $settingItem;
            }

        }

        return $settingsFormatted ?? [];
    }

    public function updateSettings(): void
    {
        $requestSettings = request()->input($this->getSettingsName());
        $settings = $this->settings(false);
        $sections = $settings['sections'] ?? [];

        $formattedSections = [];
        foreach ($sections as $section) {
            $section->enabled = isset($requestSettings[$section->key]['enabled']) ? 1 : 0;
            $section->order = $requestSettings[$section->key]['order'] ?? $section->order;
            $section->background = $requestSettings[$section->key]['background'] ?? $section->background;

            $formattedSections[] = $section;
        }

        // Update the settings sections.
        $settings['sections'] = $formattedSections;

        set_option($this->getSettingsName(), json_encode($settings));
    }

    public function sections(): array
    {
        $settings = $this->settings(false);
        $sectionsObject = $settings['sections'] ?? [];

        // Convert the object to an array
        $sectionsArray = json_decode(json_encode($sectionsObject), true);

        // Sort the array by the 'order' property
        usort($sectionsArray, function ($a, $b) {
            return $a['order'] - $b['order'];
        });

        return $sectionsArray;
    }
}