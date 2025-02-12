<?php

namespace Keytactic\RadioGroup;

use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasExtraAttributes;

class RadioGroup extends Field
{
    protected string $view = 'filament-radio-group::radio-group';

    protected array $descriptions = [];
    protected array $icons = [];
    protected array $iconsColor = [];
    protected array $borderColors = [];
    protected array $iconBackgroundColors = []; // New property for icon background colors
    protected string $iconSize = 'w-6 h-6'; // Default icon size
    protected string $iconBackgroundRadius = 'rounded-lg'; // Default icon background radius
    protected ?array $columns = null;
    protected bool $isInline = false;
    protected array $options = [];
    protected string $iconType = 'o';  // 'o' for outline, 'm' for mini/solid

    public function options(array|callable $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        if (is_callable($this->options)) {
            $this->options = call_user_func($this->options);
        }

        return $this->options;
    }

    public function columns(array|string|int|null $columns = 2): static
    {
        if (is_array($columns)) {
            $this->columns = $columns;
        } elseif (is_string($columns)) {
            $this->columns = [
                'default' => $columns,
            ];
        } elseif (is_int($columns)) {
            $this->columns = [
                'default' => $columns,
            ];
        } else {
            $this->columns = null;
        }

        return $this;
    }

    public function inline(bool $condition = true): static
    {
        $this->isInline = $condition;

        return $this;
    }

    public function descriptions(array $descriptions): static
    {
        $this->descriptions = $descriptions;
        return $this;
    }

    public function icons(array $icons, string $type = 'o'): static
    {
        $this->icons = $icons;
        $this->iconType = $type;
        return $this;
    }

    public function iconsColor(array $colors): static
    {
        $this->iconsColor = $colors;
        return $this;
    }

    public function borderColors(array $colors): static
    {
        $this->borderColors = $colors;
        return $this;
    }

    public function iconSize(string $size): static
    {
        $this->iconSize = $size;
        return $this;
    }

    public function iconBackgroundRadius(string $radius): static
    {
        $this->iconBackgroundRadius = $radius;
        return $this;
    }

    public function iconBackgroundColors(array $colors): static
    {
        $this->iconBackgroundColors = $colors;
        return $this;
    }

    public function getColumns(?string $breakpoint = null): ?int
    {
        if ($this->columns === null) {
            return null;
        }

        if ($breakpoint === null) {
            return $this->columns['default'] ?? null;
        }

        return $this->columns[$breakpoint] ?? null;
    }

    public function isInline(): bool
    {
        return $this->isInline;
    }

    public function getDescription($value): ?string
    {
        return $this->descriptions[$value] ?? null;
    }

    public function getIcon($value): ?string
    {
        if (!isset($this->icons[$value])) {
            return null;
        }

        $icon = $this->icons[$value];
        
        // If the icon already starts with 'heroicon-', return as is
        if (str_starts_with($icon, 'heroicon-')) {
            return $icon;
        }

        // Otherwise, prefix with 'heroicon-' and the icon type
        return "heroicon-{$this->iconType}-{$icon}";
    }

    public function getIconColor($value): string
    {
        return $this->iconsColor[$value] ?? '';
    }

    public function getIconSize(): string
    {
        return $this->iconSize;
    }

    public function getIconBackgroundRadius(): string
    {
        return $this->iconBackgroundRadius;
    }

    public function getIconBackgroundColor($value): string
    {
        return $this->iconBackgroundColors[$value] ?? 'bg-gray-50 dark:bg-gray-800';
    }

    public function isOptionDisabled($value, $label): bool
    {
        return false;
    }

    public function isOptionSelected($value): bool
    {
        $state = $this->getState();

        if (is_array($state)) {
            return in_array($value, $state);
        }

        return $state === $value;
    }

    public function getBorderColor($value, $isSelected): string
    {
        // Default border colors for unselected and selected states
        $unselectedColor = 'border-gray-200 dark:border-gray-700';
        $selectedColor = $this->borderColors[$value] ?? 'border-primary-500 dark:border-primary-400'; // Use custom border color if provided, otherwise default to primary

        return $isSelected ? $selectedColor : $unselectedColor;
    }
}