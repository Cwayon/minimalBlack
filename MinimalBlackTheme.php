<?php

/**
 * Minimal Black Theme.
 * Extends the built-in MinimalTheme.
 */

declare(strict_types=1);

namespace MinimalBlack;

use Fisharebest\Webtrees\Module\MinimalTheme;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\View;

class MinimalBlackTheme extends MinimalTheme implements ModuleCustomInterface
{
    use ModuleCustomTrait;

    /**
     * @return string
     */
    public function title(): string
    {
        return "Minimal Black";
    }

    /**
     * Bootstrap the module
     */
    public function boot(): void
    {
        // Register a namespace for our views.
        View::registerNamespace(
            $this->name(),
            $this->resourcesFolder() . "views/",
        );

        // Replace an existing view with our own version.
        View::registerCustomView("::chart-box", $this->name() . "::chart-box");
    }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . "/resources/";
    }

    /**
     * Add our own stylesheet to the existing stylesheets.
     *
     * @return array<string>
     */
    public function stylesheets(): array
    {
        $stylesheets = parent::stylesheets();

        // Add our custom stylesheet.
        $stylesheets[] = $this->assetUrl("css/theme.css");

        return $stylesheets;
    }
}
