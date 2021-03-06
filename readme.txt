=== WP Booster: True Color Blocks ===
Contributors: seojacky
Tags: pagespeed, lighthouse, perfomance, optimaze, optimization, lazy load
Requires at least: 5.0
Tested up to: 5.5
Requires PHP: 5.6.20
Stable tag: 1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
WP Booster: True Color Blocks - Gorgeous colored blocks for your posts. Does not degrade PageSpeed scores.
WP Booster: True Color Blocks - Великолепные цветные блоки для ваших сообщений. Не снижает оценки PageSpeed. Имеет семантически нейтральную вёрстку.

== Frequently Asked Questions ==
= Где находится кнопка со стилями? = 
Стили к блокам добавляются с помощью кнопки Formats (Форматы). Смотрите скриншот https://i.imgur.com/VIxI4eK.jpg
= Почему не появилась кнопка со стилями? = 
Скорее всего у Вас установлен плагин типа TinyMCE Advanced, который добавляет кнопки на панель визуального редактора. Проверьте настройки такого плагина и, если необходимо, добавьте кнопку Formats (Форматы) на панель.
= Как заменить иконку в блоке? = 
Пока единственный способ это корректировка CSS стилей. Добавьте в свой файл стилей (например для блока "Внимание") что-то типа:
 <code>
wpbcb-block--warning:before {    
    content: "";
    background: url(https://i.imgur.com/MJekAr4.gif) no-repeat center 50%;
    background-size: cover;
}
</code>


== Changelog ==
= 1.8 =
* Исправил стили плагина
* Обновил FAQ

= 1.7 =
* Исправил баги

= 1.6 =
* Rename plugin in "WP Booster: True Color Blocks"

= 1.5 =
* Исправил баги

= 1.4 =
* Добавил отложенную загрузку стилей плагина (PageSpeed)

= 1.3 =
* Обновил код, переписал функции

