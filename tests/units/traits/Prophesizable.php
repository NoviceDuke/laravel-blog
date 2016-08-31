<?php

namespace Tests\units\traits;

/**
 *  在測試時能將Prophecy or Mock綁定在Laravel的自動注入系統中.
 */
trait Prophesizable
{
    /**
     * 初始化某個Class，並套上預言層(prophesize)並綁定於Laravel Service Container.
     */
    public function initProphesize($class)
    {
        $prophecy = $this->prophesize($class);
        $this->app->instance($class, $prophecy->reveal());

        return $prophecy;
    }
}
