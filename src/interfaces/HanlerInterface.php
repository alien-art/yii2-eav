<?php

namespace mirocow\eav\interfaces;

interface HanlerInterface
{

    public function getValueModel();

    public function load();

    public function save();

    public function getTextValue();

}
