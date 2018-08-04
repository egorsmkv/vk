<?php
/**
 *
 * @package VK.com authorization
 * @copyright LavIgor (https://github.com/LavIgor)
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace lavigor\vk\event;

/**
 * Event listener
 */

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
    /** @var \phpbb\user $user */
    protected $user;

    public function __construct(\phpbb\user $user)
    {
        $this->user = $user;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'core.user_setup' => 'load_language_for_auth',
        );
    }

    /**
     * @param object $event The event object
     * @access public
     */
    public function load_language_for_auth($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'lavigor/vk',
            'lang_set' => 'vk_common',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }
}
