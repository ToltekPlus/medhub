<?php

namespace Core;

interface ControllerInterface {
    public function show();
    public function getById();
    public function update();
    public function deleteById();
}