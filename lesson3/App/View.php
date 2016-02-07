<?php

namespace App;


class View
    implements \Countable
{
    use TMagic;

    /**
     * Метод присваивает значения указанным свойствам и подключает шаблон
     *
     * @param $template string Путь к шаблону
     * @return string Шаблон
     */
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Метод выводит на экран заданный шаблон
     *
     * @param $template string Путь к шаблону
     */
    public function display($template)
    {
        echo $this->render($template);
    }
    /**
     * Count elements of an object
     * @return int The custom count as an integer.
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->data);
    }
}