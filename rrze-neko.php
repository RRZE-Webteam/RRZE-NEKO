<?php

/*
Plugin Name:     RRZE NEKO
Plugin URI:      https://github.com/RRZE-Webteam/RRZE-NEKO
Description:     WordPress plugin with the famous NEKO cat >^.^< (based on CMS-Basis)
Version:         0.1.71
Author:          RRZE Webteam
Author URI:      https://blogs.fau.de/webworking/
License:         GNU General Public License v3
License URI:     http://www.gnu.org/licenses/gpl-3.0.html
Domain Path:     /languages
Text Domain:     rrze-neko
*/

namespace NEKO\Basis;

/*
Die Codezeile defined('ABSPATH') || exit;
verhindert den direkten Zugriff auf die PHP-Dateien über URL und stellt sicher,
dass die Plugin-Dateien nur innerhalb der WordPress-Umgebung ausgeführt werden.
Denn wenn bspw. eine Datei I/O-Operationen enthält,
kann sie schließlich kompromittiert werden (durch einen Angreifer),
was zu unerwartetem Verhalten führen kann.
*/

defined('ABSPATH') || exit;

use NEKO\Basis\Main;

// Laden der Konfigurationsdatei
// require_once __DIR__ . '/config/config.php';

// Automatische Laden von Klassen.
//if (file_exists(__DIR__ . '/vendor/autoload.php')) {
//    require_once __DIR__ . '/vendor/autoload.php';
//}

const RRZE_PHP_VERSION = '7.4';
const RRZE_WP_VERSION = '5.3';

// Registriert die Plugin-Funktion, die bei Aktivierung des Plugins ausgeführt werden soll.
register_activation_hook(__FILE__, __NAMESPACE__ . '\activation');
// Registriert die Plugin-Funktion, die ausgeführt werden soll, wenn das Plugin deaktiviert wird.
register_deactivation_hook(__FILE__, __NAMESPACE__ . '\deactivation');
// Wird aufgerufen, sobald alle aktivierten Plugins geladen wurden.
add_action('plugins_loaded', __NAMESPACE__ . '\loaded');

/**
 * Einbindung der Sprachdateien.
 */
function loadTextDomain()
{
    load_plugin_textdomain('neko-basis', false, sprintf('%s/languages/', dirname(plugin_basename(__FILE__))));
}

/**
 * Überprüft die Systemvoraussetzungen.
 */
function systemRequirements()
{
    $error = '';
    if (version_compare(PHP_VERSION, RRZE_PHP_VERSION, '<')) {
        /* Übersetzer: 1: aktuelle PHP-Version, 2: erforderliche PHP-Version */
        $error = sprintf(__('The server is running PHP version %1$s. The Plugin requires at least PHP version %2$s.', 'neko-basis'), PHP_VERSION, RRZE_PHP_VERSION);
    } elseif (version_compare($GLOBALS['wp_version'], RRZE_WP_VERSION, '<')) {
        /* Übersetzer: 1: aktuelle WP-Version, 2: erforderliche WP-Version */
        $error = sprintf(__('The server is running WordPress version %1$s. The Plugin requires at least WordPress version %2$s.', 'neko-basis'), $GLOBALS['wp_version'], RRZE_WP_VERSION);
    } //elseif (!file_exists(__DIR__ . '/vendor/autoload.php')) {
      //  $error = sprintf(__('%s does not exist.', 'neko-basis'), substr(__DIR__, strrpos(__DIR__, '/') + 1) . '/vendor/autoload.php');
    //}
    return $error;
}

/**
 * Wird nach der Aktivierung des Plugins ausgeführt.
 */
function activation()
{
    // Sprachdateien werden eingebunden.
    loadTextDomain();

    // Überprüft die minimal erforderliche PHP- u. WP-Version.
    // Wenn die Überprüfung fehlschlägt, dann wird das Plugin automatisch deaktiviert.
    if ($error = systemRequirements()) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die($error);
    }

    // Ab hier können die Funktionen hinzugefügt werden,
    // die bei der Aktivierung des Plugins aufgerufen werden müssen.
    // Bspw. wp_schedule_event, flush_rewrite_rules, etc.

    add_action('wp_enqueue_scripts','neko_init');

    function neko_init() {
        wp_enqueue_script( 'n20171213.js', plugins_url( 'https://webneko.net/n20171213.js', __FILE__ ));
    }
}

/**
 * Wird durchgeführt, nachdem das Plugin deaktiviert wurde.
 */
function deactivation()
{
    // Hier können die Funktionen hinzugefügt werden, die
    // bei der Deaktivierung des Plugins aufgerufen werden müssen.
    // Bspw. delete_option, wp_clear_scheduled_hook, flush_rewrite_rules, etc.
}

/**
 * Wird durchgeführt, nachdem das WP-Grundsystem hochgefahren
 * und alle Plugins eingebunden wurden.
 */
function loaded()
{
    // Sprachdateien werden eingebunden.
    loadTextDomain();

    // Überprüft die Systemvoraussetzungen.
    if ($error = systemRequirements()) {
        add_action('admin_init', function () use ($error) {
            $pluginData = get_plugin_data(__FILE__);
            $pluginName = $pluginData['Name'];
            $tag = is_plugin_active_for_network(plugin_basename(__FILE__)) ? 'network_admin_notices' : 'admin_notices';
            add_action($tag, function () use ($pluginName, $error) {
                printf(
                    '<div class="notice notice-error"><p>' . __('Plugins: %1$s: %2$s', 'cms-basis') . '</p></div>',
                    esc_html($pluginName),
                    esc_html($error)
                );
            });
        });
        // Das Plugin wird nicht mehr ausgeführt.
        return;
    }

    // Hauptklasse (Main) wird instanziiert.
    $main = new Main(__FILE__);
    $main->onLoaded();
}
