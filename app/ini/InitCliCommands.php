<?php

namespace app\ini;
use themes\vuetifyCore\cli\CreateVuetifyThemeCommand;
use webfiori\framework\cli\CLI;
class InitCliCommands {
    /**
     * Register user defined CLI commands.
     * 
     * @since 1.0
     */
    public static function init() {
        CLI::register(new CreateVuetifyThemeCommand());
    }
}
