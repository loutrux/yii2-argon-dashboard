<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace loutrux\argon\helpers;

/**
 * Html provides a set of static methods for generating commonly used HTML tags.
 *
 * Nearly all of the methods in this class allow setting additional html attributes for the html
 * tags they generate. You can specify, for example, `class`, `style` or `id` for an html element
 * using the `$options` parameter. See the documentation of the [[tag()]] method for more details.
 *
 * For more details and usage information on Html, see the [guide article on html helpers](guide:helper-html).
 *
 * @author Vincent Galante <galante.vincent@gmail.com>
 * @since 2.0
 */
class Html extends \yii\helpers\BaseHtml
{
    public static function a_PjaxLoader($text, $url = null, $options = [])
    {
        if ($url !== null) {
            $options['href'] = \yii\helpers\Url::to($url);
        }
        self::addOption($options,['onclick' => '$(this).closest("[data-pjax-container]").html($("#loading-content").html());']);
        return static::tag('a', $text, $options);
    }

    public static function addOption(&$options, $option)
    {
        $key = key($option);
        $value = current($option);

        if (isset($options[$key])) {
            if (is_array($options[$key])) {
                $options[$key] = self::mergeCssClasses($options[$key], (array) $value);
            } else {
                $classes = preg_split('/\s+/', $options[$key], -1, PREG_SPLIT_NO_EMPTY);
                $options[$key] = implode(' ', self::mergeCssClasses($classes, (array) $value));
            }
        } else {
            $options[$key] = $value;
        }
    }

    public static function submitButton_PjaxLoader($content = 'Submit', $options = [])
    {
        $options['type'] = 'submit';
        self::addOption($options,['onclick' => 'window.scrollTo(0, 0);']);
       // self::addOption($options,['onclick' => '$(this).closest("form").submit(); $(this).closest("[data-pjax-container]").html($("#loading-content").html());']);
       return static::button($content, $options);
    }
}
