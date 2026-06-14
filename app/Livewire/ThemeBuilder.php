<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThemeBuilder extends Component
{
    public array $settings = [];

    public function mount()
    {
        $user = Auth::user();
        if ($user && $user->theme_settings) {
            $this->settings = $user->theme_settings;
        } else {
            // Default preset if not set
            $this->settings = $this->getDefaultSettings();
        }
    }

    public function saveSettings(array $newSettings)
    {
        $user = Auth::user();
        if ($user) {
            $user->theme_settings = $newSettings;
            $user->save();
        }

        $this->settings = $newSettings;
    }

    private function getDefaultSettings(): array
    {
        return [
            // Colors
            'color_primary' => '#6366f1',
            'color_secondary' => '#a1a1aa',
            'color_accent' => '#a855f7',
            'color_bg' => '#09090b',
            'color_sidebar' => '#18181b',
            'color_header' => '#18181b',
            'color_card' => '#18181b',
            'color_border' => '#27272a',
            'color_text' => '#fafafa',
            'color_heading' => '#ffffff',
            'color_link' => '#818cf8',
            'color_button' => '#4f46e5',
            'color_button_text' => '#ffffff',
            'color_hover' => '#4338ca',
            'color_active' => '#3730a3',
            'color_success' => '#10b981',
            'color_warning' => '#f59e0b',
            'color_error' => '#f43f5e',

            // Typography
            'font_family' => 'Inter, sans-serif',
            'font_size_base' => '14px',
            'font_size_heading' => '24px',
            'font_weight_base' => '400',
            'letter_spacing' => '0px',
            'line_height' => '1.5',

            // Layout Options
            'sidebar_style' => 'expanded', // expanded, compact, collapsed, hover, icon, floating
            'header_style' => 'fixed', // fixed, sticky, static
            'content_layout' => 'fluid', // boxed, fluid, full
            'card_style' => 'rounded', // rounded, medium, sharp
            'spacing' => 'comfortable', // compact, comfortable, spacious

            // Cursor
            'cursor_style' => 'default', // default, pointer, crosshair, custom, theme

            // Components
            'border_radius' => '8px',
            'shadow_style' => 'default',
        ];
    }

    public function render()
    {
        return view('livewire.theme-builder');
    }
}
